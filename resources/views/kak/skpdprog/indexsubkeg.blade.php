@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub Kegiatan {{ ucwords(strtolower($kegprog->ket)) }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
  <a href="/skpdprogk?kode_skpd={{ request('kode_skpd') }}&kode={{ $kegprog->progbid->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
    <table class="table table-striped table-sm-9 mt-3" id="tbl">
      <thead class="bg-green">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Sub Kegiatan</th>
          <th scope="col">Kinerja</th>
          <th scope="col">Indikator</th>
          <th scope="col">Satuan</th>
          <th scope="col" colspan="2">NIlai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg as $s)
          <tr @php
            $berubah = 0;
            foreach ($s->kak as $k) {
              $berubah += $k->kebutuhanakt->sum('berubah');
            }
          @endphp class="text-align-center fs-7 @if($berubah > 0) bg-yellow @endif">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $s->ket }}</td>
              <td>{{ $s->kinerja }}</td>
              <td>{{ $s->indikator }}</td>
              <td>{{ $s->satuan->satuan }}</td>
              <td class="p-0 m-0">Rp.</td>
              <td class="text-end">
                @php
                  $total = 0;
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
                  echo str_replace(',', '.', number_format($total));
                @endphp
              </td>
              <td class="text-center"><a href="/skpdprogkak?kode_skpd={{ request('kode_skpd') }}&kode={{ $s->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih Program"><i class="fa fa-eye"></i> Lihat KAK</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection