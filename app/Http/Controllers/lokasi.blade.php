@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usulan SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <form action="/allusulan" class="mb-3">
      <div class="row justify-content-center">
        <div class="col col-8">
          <div class="input-group">
            <input type="hidden" name="tipe" value="{{ request('tipe') }}">
            <select name="periode" id="getperiode" class="form-select">
              <option value="">Pilih Periode</option>
              @foreach ($periode as $p)
                  <option value="{{ $p->periode }}" @if(request('periode') == $p->periode) selected @endif>{{ $p->periode }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
          </div>
        </div>
      </div>
    </form>

    
    @if(request('periode'))
    <form action="/cetaklokasi" class="mb-3" method="post">
      @csrf
      <input type="hidden" name="tipe" value="semua">
      <input type="hidden" name="periode" value="{{ request('periode') }}">
      <button class="btn btn-primary"><i class="fa fa-print"></i> Print Semua Pagu Lokasi</button>
    </form>
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Pagu</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($lokasi as $l)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ ucwords($s->ket) }}</td>
              <td class="text-end">
                @php
                    $total = 0;
                    foreach ($lokasi->kak as $kak) {
                      if($periode->sesi == 'rka'){
                        $total += $k->kebutuhanakt->sum('total_rka');
                      }else if($periode->sesi == 'kuappas'){
                        $total += $k->kebutuhanakt->sum('total_kuappas');
                      }else if($periode->sesi == 'apbd'){
                        $total += $k->kebutuhanakt->sum('total_apbd');
                      }else if($periode->sesi == 'final'){
                        $total += $k->kebutuhanakt->sum('total_final');
                      }
                    }
                @endphp
                {{ str_replace(',', '.', number_format($total)) }}
              </td>
              <td><a href="/laporan_program?tipe={{ request('tipe') }}&kode_skpd={{ $s->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
</div>

@endsection