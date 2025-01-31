@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SKPD yang diampu oleh</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-9">

    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">SKPD Yang Diampu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $s->skpd->name }}</td>
              <td>{{ $s->skpd->total_anggaran_skpd }}</td>
              <td><a href="/skpdprog/{{ $s->kode_skpd }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

@endsection