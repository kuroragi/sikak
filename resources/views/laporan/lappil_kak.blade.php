@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-9">

    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">SKPD</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $s->name }}</td>
              <td class="tbold text-end">{{ number_format($s->total_anggaran_skpd) }}</td>
              <td><a href="/laporan_kak?kode_skpd={{ $s->kode }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Laporan Pra RKA</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

@endsection