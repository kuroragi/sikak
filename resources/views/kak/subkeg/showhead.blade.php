@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub-kegiatan {{ $subkeg->ket }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kerangka Acuan Kerja</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pencetus</th>
          <th scope="col">Bidang</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kak as $kak)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kak->name }}</td>
              <td>{{ $kak->kelompokbelanja->name }}</td>
              <td>@if($kak->pencetuskebe_id != ''){{ $kak->pencetuskebe->name }}@endif</td>
              <td>{{ $kak->subunit->name ?? '' }}</td>
              <td>Rp. {{ number_format($kak->total_anggaran) }}</td>
              <td>
                  <a href="/kak/{{ $kak->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h5>KAK Gaji STTP</h5>

    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kakgaji as $kakg)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kakg->kelompokbelanja->name }}</td>
              <td>Rp. {{ number_format($kakg->total_anggaran) }}</td>
              <td>
                  <a href="/kakgaji/{{ $kakg->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h5>KAK Rutin Kantor Wajib</h5>

    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kakrutin as $kakr)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kakr->kelompokbelanja->name }}</td>
              <td>Rp. {{ number_format($kakr->total_anggaran) }}</td>
              <td>
                  <a href="/kakrutin/{{ $kakr->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>


@endsection