@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usulan SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <form action="/allusulan" class="mb-3">
      <div class="row justify-content-center">
        <div class="col col-8">
          <div class="input-group">
            <input type="hidden" name="tipe" value="{{ request('tipe') }}">
            <select name="periode" id="getperiode" class="form-select">
              <option value="">Pilih Periode</option>
              @foreach ($periode as $p)
                  <option value="{{ $p->periode }}" @if(request('periode') == $p->periode) selected @endif>{{ $p->periode }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
          </div>
        </div>
      </div>
    </form>

    
    @if(request('periode'))
    <form action="/cetakusulan" class="mb-3" method="post">
      @csrf
      <input type="hidden" name="tipe" value="semua">
      <input type="hidden" name="periode" value="{{ request('periode') }}">
      <button class="btn btn-primary"><i class="fa fa-print"></i> Print Semua Laporan</button>
    </form>
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama SKPD</th>
          <th scope="col">Jumlah usulan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $s->name }}</td>
              <td class="text-end">
                {{ $s->usulanssh->count('id') + $s->usulansbu->count('id') }} item
              </td>
              <td><a href="/laporan_program?tipe={{ request('tipe') }}&kode_skpd={{ $s->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
          </tr>
        @endforeach
        <tr>
          <td class="tbold" colspan="2">Tidak Terekap Pengusulnya</td>
          <td class="text-end">{{ $ttssh->count('id') + $ttsbu->count('id') }} item</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    @endif
</div>

@endsection