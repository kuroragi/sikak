@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kegiatan {{ ucwords(strtolower($progbid->ket)) }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
  <a href="/skpdprogp?kode_skpd={{ request('kode_skpd') }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
    <table class="table table-striped table-sm-9 mt-3" id="tbl">
      <thead class="mt-3 bg-orange">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Kegiatan</th>
          <th scope="col" colspan="2">NIlai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($kegprog as $kp)
          <tr @php
            $berubah = 0;
            foreach ($kp->subkeg as $s) {
              foreach ($s->kak as $k) {
                $berubah += $k->kebutuhanakt->sum('berubah');
              }
            }
          @endphp class="text-align-center @if($berubah > 0) bg-yellow @endif">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $kp->ket }}</td>
              <td class="p-0 m-0">Rp.</td>
              <td class="text-end">
                @php
                  $total = 0;
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
                  echo str_replace(',', '.', number_format($total));
                @endphp
              </td>
              <td class="text-center"><a href="/skpdprogs?kode_skpd={{ request('kode_skpd') }}&kode={{ $kp->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih Kegiatan"><i class="fa fa-eye"></i> Lihat Subkegiatan</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection