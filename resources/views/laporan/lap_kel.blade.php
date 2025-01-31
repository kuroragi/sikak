@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Nilai Pagu SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="col col-xl-12">
  <a href="/cetakskpdunit"><button class="btn btn-success">Print</button></a>
</div>

<table class="table table-striped table-sm rotate-table-grid mb-3" id="tbl">
  <thead>
    <tr class="fs-7 text-center">
      <th scope="col">#</th>
      <th scope="col">SKPD</th>
      @foreach ($kelompokbelanja as $kebe)
        <th scope="col">{{ ucwords($kebe->name) }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody id="tbody">
    @foreach ($skpd as $s)
        <tr class="fs-8">
          <td class="text-wrap">{{ $loop->iteration }}</td>
          <td>{{ $s->name }}</td>
          @foreach ($s->skpdunit as $su)
            <td class="text-end">{{ number_format($su->total_anggaran_skpd) }}</td>
          @endforeach
        </tr>
    @endforeach
  </tbody>
</table>


@endsection