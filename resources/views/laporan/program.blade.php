@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Program {{ $skpd->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>


<div class="table-responsive col-lg-12">
  <a href="/laporan_skpd?tipe={{ request('tipe') }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
  <button class="btn btn-block btn-primary" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print Semua Laporan {{ strtoupper(request('tipe')) }} {{ $skpd->singkatan }}</button>  
  
    <table class="table table-striped table-sm-9 mt-3" id="tbl">
      <thead class="bg-info">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Program</th>
          <th scope="col" colspan="2">Nilai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd->biduruses as $b)
          @foreach ($b->progbid as $p)
            <tr class="text-align-center">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $p->ket }}</td>
                <td class="p-0 m-0">Rp.</td>
                <td class="text-end">
                  @php
                    $total = 0;
                    foreach ($p->kegprog as $kp) {
                      foreach ($kp->subkeg as $s) {
                        foreach ($s->kak as $k) {
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
                      }
                    }
                    echo str_replace(',', '.', number_format($total));
                  @endphp
                </td>
                <td class="text-center"><a href="/laporan_kegiatan?tipe={{ request('tipe') }}&kode_skpd={{ request('kode_skpd') }}&kode={{ $p->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih Program"><i class="fa fa-eye"></i> Lihat Kegiatan</button></a></td>
            </tr>
          @endforeach
        @endforeach
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
        <form method="post" action="/cetaklaporan?tipe={{ request('tipe') }}&getlaporan=skpd&kode_skpd={{ request('kode_skpd') }}&periode={{ request('periode') }}" class="mb-5">
          @csrf
          <div class="row">
            <div class="col col-xl-12">
              <div class="mb-3">
                <label for="jenisdata" class="form-label">Jenis Data</label>
                <select name="jenisdata" class="form-select" id="jenisdata">
                  <option value="kak">KAK</option>
                  <option value="rekap">Rekap</option>
                  <option value="rka">Pra RKA</option>
                </select>
              </div>
              <div class="mb-3">
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