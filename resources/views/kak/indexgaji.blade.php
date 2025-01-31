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

<form action="/kebutuhanaktgaji" method="POST">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="group-input">
        <input type="text" name="kode_kak" id="addkode_kak" class="form-control" value="{{ $kak->kode_kak }}" hidden>
        <input type="text" name="ket" id="addket" class="form-control" placeholder="Rincian Pengeluaran">
      </div>
    </div>
    <div class="col-md-5">
      <div class="group-input">
        <input type="text" name="jumlah" id="addjumlah" class="form-control" placeholder="Jumlah">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-block btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Rincian</button>
</form>

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
          <th scope="col">Action</th>
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
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href="{{ $k->id }}"></a><i class="fa fa-edit"></i></button>
                <form action="/kebutuhanaktgaji/{{ $k->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>

    
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/treatmentunits" class="mb-5">
            @csrf
            <div class="row">
                <div class="col col-xl-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Satuan</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}" autofocus required>
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="addslug" value="{{ old('slug') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Satuan</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Create -->

<!-- Modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Rincian Gaji</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/kebutuhanaktgaji" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="ket" class="form-label">Rincian Gaji</label>
                    <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="editket" required>
                    @error('ket')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Total</label>
                    <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="editjumlah" required>
                    @error('jumlah')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah Rincian</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->


@endsection