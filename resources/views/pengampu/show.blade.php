@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SKPD yang diampu oleh {{ $user->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-9">
    
  <div class="row">
    <form action="/pengampu" method="post" class="mb-5">
      @csrf
      <label for="subkeg" class="form-label">Cari Sub-kegiatan</label>
      <input type="text" name="user_id" value="{{ $user->id }}" hidden>
      <div class="input-group">
        <select name="kode_skpd" id="a" class="form-control fs-7">
            @foreach ($skpd as $s)
              <option value="{{ $s->kode }}" class="form-control">{{ $s->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" id="simpan" type="submit" id="button-addon2"><i class="fa fa-plus"></i> Tambah</button>
      </div>
    </form>
  </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session()->has('warning'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">SKPD Yang Diampu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($pengampu as $p)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->skpd->name }}</td>
              <td>
                <form action="/pengampu/{{ $p->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin Hapus SKPD yang diampu?')"><i class="fa fa-trash"></i></button>
                </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

@endsection