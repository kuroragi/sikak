@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-center">Kerangka Acuan Kerja Aktivitas Subkegiatan</h1>
    <div class="row "></div>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="row tbold">
  <div class="col col-md-2_5">Urusan Pemerintah</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->kode }} {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->ket }}</div>
</div>
<div class="row tbold">
  <div class="col col-md-2_5">Bidang Urusan</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->kode }} {{ sprintf('%02d', $kak->subkeg->kegprog->progbid->bidurus->urusan->kode) }} {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->ket }}</div>
</div>
<div class="row tbold mb-3">
  <div class="col col-md-2_5">Organisasi</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->kegprog->progbid->skpd->name }}</div>
</div>

<div class="row tbold">
  <div class="col col-md-2_5">Program</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->kegprog->progbid->ket }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Capaian Program</div>
  <div class="col col-md-9_5">: </div>
</div>
<div class="row">
  <div class="col col-md-2_5">Indikator</div>
  <div class="col col-md-9_5">: {{ $kak->icapaianprog }}</div>
</div>
<div class="row mb-3">
  <div class="col col-md-2_5">Target</div>
  <div class="col col-md-9_5">: {{ $kak->volcapprog }} {{ $kak->satcapprog }}</div>
</div>

<div class="row tbold">
  <div class="col col-md-2_5">Kegiatan</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->kegprog->ket }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Hasil Kegiatan</div>
  <div class="col col-md-9_5">: </div>
</div>
<div class="row">
  <div class="col col-md-2_5">Indikator</div>
  <div class="col col-md-9_5">: {{ $kak->ihaskeg }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Target</div>
  <div class="col col-md-9_5">: {{ $kak->volhaskeg }} {{ $kak->sathaskeg }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Keluaran Kegiatan</div>
  <div class="col col-md-9_5">: </div>
</div>
<div class="row">
  <div class="col col-md-2_5">Indikator</div>
  <div class="col col-md-9_5">: {{ $kak->ikeluarankeg }}</div>
</div>
<div class="row mb-3">
  <div class="col col-md-2_5">Target</div>
  <div class="col col-md-9_5">: {{ $kak->volkelkeg }} {{ $kak->satkelkeg }}</div>
</div>

<div class="row tbold">
  <div class="col col-md-2_5">Subkegiatan</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->ket }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Output Subkegiatan</div>
  <div class="col col-md-9_5">: </div>
</div>
<div class="row">
  <div class="col col-md-2_5">Indikator</div>
  <div class="col col-md-9_5">: {{ $kak->subkeg->indikator }}</div>
</div>
<div class="row mb-3">
  <div class="col col-md-2_5">Target</div>
  <div class="col col-md-9_5">: {{ $kak->tarsubkeg }} {{ $kak->subkeg->satuan->name }}</div>
</div>

<a href="/subkeg/{{ $kak->subkeg->id }}"><button class="btn btn-block btn-info mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>


<hr>

<div class="table-responsive col-lg-12">
    
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr class="">
          <th scope="col">No</th>
          <th scope="col">Rincian Gaji</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tr class="fs-7 tbold">
          <td colspan="2">Total</td>
          <td colspan="2">{{ $kak->total_anggaran }}</td>
        </tr>
        @foreach ($keb as $k)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->ket }}</td>
              <td>{{ $k->jumlah }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>

    
</div>

@endsection