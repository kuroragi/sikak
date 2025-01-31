@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pagu SKPD {{ ucwords($lokasi->ket) }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="row">
  <div class="col col-md-8">
    <iframe src="https://www.google.com/maps/embed?pb={{ $lokasi->embed }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="col col-md-4">
    
    @if ($lokasi->lv == 1)
        <h4>Daftar Kecamatan Kota Bukittinggi</h4>
    @elseif ($lokasi->lv == 2)
        <h4>Daftar Kelurahan untuk Kec. {{ $lokasi->ket }}</h4>
    @endif
    @foreach ($lokasichild as $lc)
        <button class="btn btn-primary w-50 mb-1">{{ $lc->ket }}</button><br>
    @endforeach
  </div>
</div>



<div class="table-responsive col-lg-12">

  <div class="d-inline">

    <a href="/laporan_lokasi?periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></a>

    <button class="btn btn-block btn-primary" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i>  Print Laporan {{ ucwords($lokasi->ket) }}</button>

  </div>

      <table class="table table-striped table-sm-9 mb-3" id="tbl">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kelompok Belanja</th>
            <th scope="col">Pagu</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php
              $totalda = 0;
          @endphp
          @foreach ($skpd as $s)
            <tr>
              <td class="tbold">{{ chr(64+$loop->iteration) }}</td>
              <td class="tbold">{{ $s->kode }} - {{ $s->name }}</td>
              @php
                  $total = 0;

                  foreach ($s->kak as $kak) {
                    if($_periode->sesi == 'rka'){
                      $total += $kak->kebutuhanakt->sum('total_rka');
                    }else if($_periode->sesi == 'kuappas'){
                      $total += $kak->kebutuhanakt->sum('total_kuappas');
                    }else if($_periode->sesi == 'apbd'){
                      $total += $kak->kebutuhanakt->sum('total_apbd');
                    }else if($_periode->sesi == 'final'){
                      $total += $kak->kebutuhanakt->sum('total_final');
                    }
                  }

                  $totalda += $total;
              @endphp
              <td class="text-end">{{ str_replace(',', '.', number_format($total)) }}</td>
            </tr>
            @foreach ($kebe as $kb)
              @php
                  $totallok = 0;
              @endphp
              @foreach ($s->kak->where('kelompokbelanja_id', $kb->id) as $kak)
                @php
                    if($_periode->sesi == 'rka'){
                      $totallok = $kak->kebutuhanakt->sum('total_rka');
                    }else if($_periode->sesi == 'kuappas'){
                      $totallok = $kak->kebutuhanakt->sum('total_kuappas');
                    }else if($_periode->sesi == 'apbd'){
                      $totallok = $kak->kebutuhanakt->sum('total_apbd');
                    }else if($_periode->sesi == 'final'){
                      $totallok = $kak->kebutuhanakt->sum('total_final');
                    }
                @endphp
              @endforeach
              <tr class="text-align-center">
                  <td>{{ $loop->iteration }}.</td>
                  <td>{{ ucwords($kb->ket) }}</td>
                  <td class="text-end">
                    {{ str_replace(',', '.', number_format($totallok)) }}
                  </td>
                  {{-- <td><a href="/laporan_program?tipe={{ request('tipe') }}&kode_skpd={{ $l->id }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td> --}}
              </tr>
            @endforeach
          
          @endforeach

          <tr>
            <td class="tbold" colspan="2">Total</td>
            <td class="tbold text-end">{{ str_replace(',', '.', number_format($totalda)) }}</td>
          </tr>
        </tbody>
      </table>
    
</div>


<div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/cetaklokasi" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                <div class="mb-3">
                  <input type="hidden" name="lokasi" value="{{ request('lokasi') }}">
                  <input type="hidden" name="tipe" value="skpd">
                  <input type="hidden" name="periode" value="{{ request('periode') }}">
                  <label for="jenisprint" class="form-label">Jenis Print Out</label>
                  <select name="jenisprint" class="form-select" id="jenisprint">
                      <option value="pdf">PDF</option>
                      <option value="excel">Excel</option>
                  </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Cetak</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection