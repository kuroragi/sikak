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

<div class="table-responsive col-lg-12">
    <a href="/subkeg/{{ $kak->subkeg->id }}"><button class="btn btn-block btn-info mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>

    <!--button class="btn btn-block btn-primary mb-3" id="addkebbutton" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodala"><a href="{{ $kak->kode_kak }}"></a><i class="fa fa-plus"></i> Tambah Kebutuhan</button-->

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="2" class="align-middle">No</th>
          <th scope="col" colspan="5">Kebutuhan Belanja</th>
          <th scope="col" rowspan="2" class="align-middle">Action</th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="2" class="text-wrap align-middle">Uraian Kebutuhan</th>
          <th scope="col" rowspan="2" class="align-middle">Vol</th>
          <th scope="col" rowspan="2" class="align-middle">Satuan</th>
          <th scope="col" rowspan="2" class="text-wrap text-right">Harga Satuan</th>
          <th scope="col" rowspan="2" class="align-middle">Jumlah</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tr class="fs-">
          <th colspan="5">Total Anggaran</th>
          <th class="text-end">{{ number_format($kak->total_anggaran) }}</th>
        </tr>
        @foreach ($kak->kebutuhanaktrutin as $keb)
          <tr class="fs-7">
            <td>
              {{ $loop->iteration }}
            </td>
            <td>
              @if ($keb->tipe_keb == 'ssh')
                @if($keb->item)
                  {{ substr($keb->item->name, 0, 30) }}...
                @else
                  {{ substr($keb->usulanssh->name, 0, 30) }}...
                @endif
              @elseif ($keb->tipe_keb == 'usulan ssh')
                {{ substr($keb->usulanssh->name, 0, 30) }}...
              @elseif ($keb->tipe_keb == 'sbu')
                @if($keb->sbu)
                  {{ substr($keb->sbu->ket, 0, 30) }}...
                @else
                  {{ substr($keb->usulansbu->ket, 0, 30) }}...
                @endif
              @elseif ($keb->tipe_keb == 'usulan sbu')
                {{ substr($keb->usulansbu->ket, 0, 30) }}...
              @elseif ($keb->tipe_keb == 'other')
                {{ substr($keb->otheruraian, 0, 30) }}...
              @endif
            </td>
            <td class="text-end">
              {{ $keb->jumlah }}
            </td>
            <td class="text-center">
              @if ($keb->tipe_keb == 'ssh')
                @if($keb->item)
                  {{ $keb->item->satuan->name }} 
                @else
                  {{ $keb->usulanssh->satuan->name }}
                @endif
              @elseif ($keb->tipe_keb == 'usulan ssh')
                {{ $keb->usulanssh->satuan->name }}
              @elseif ($keb->tipe_keb == 'sbu')
                @if($keb->sbu)
                  {{ $keb->sbu->satuan->name }}
                @else
                  {{ $keb->usulansbu->satuan->name }}
                @endif
              @elseif ($keb->tipe_keb == 'usulan sbu')
                {{ $keb->usulansbu->satuan->name }}
              @elseif ($keb->tipe_keb == 'other')
                {{ $keb->satuan->name }}
              @endif
            </td>
            <td class="text-end">
              {{ number_format($keb->harga) }}
            </td>
            <td class="text-end">
              {{ number_format($keb->total) }}
            </td>
            <td>
              <!--button class="badge bg-warning border-0" id="editkebbutton" data-bs-toggle="modal" data-bs-target="#editkebmodal"><a1 href="{{ $kak->kode_kak }}"></a1><a2 href="{{ $keb->id }}"></a2>@if($keb->tipe_keb == 'ssh')<a3 href="{{ $keb->item->spek }}"></a3>@else<a3 href=""></a3>@endif<a4 href="{{ $keb->tipe_keb }}"></a4><i class="fa fa-edit"></i></button>
              <form action="/kebutuhanaktrutin/{{ $keb->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin Hapus Kebutuhan?')"><i class="fa fa-circle-xmark"></i></button>
              </form-->
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>

    
</div>

<!-- Modal Add Kebutuhan -->
{{-- modal ssh --}}
<div class="modal fade" id="addkebutuhanmodala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="addkebbuttona" data-bs-toggle="modal" data-bs-target="#a"><a1 href="{{ $kak->kode_kak }}"></a1>SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="addkebbuttonb" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalb"><a1 href="{{ $kak->kode_kak }}"></a1>SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="addkebbuttonc" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalc"><a1 href="{{ $kak->kode_kak }}"></a1>Hibah</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
                <div class="row">
                    <div class="col col-xl-12">
                        <div class="mb-3">
                            <label for="cari" class="form-label">Cari</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="addkcari" list="cari" placeholder="Cari nama kebutuhan" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" id="addkcaribtn" type="button" id="button-addon2"><i class="fa fa-magnifying-glass"></i> Cari</button>
                            </div>
                            <table class="table" id="tblmodal" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Spek</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodymodal"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- form ssh --}}
                <div id="addkebssh" style="display: none;">
                  <form method="post" action="/kebutuhanaktrutin/storessh" class="mb-3">
                  @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Data Kebutuhan</label>
                        <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="addkebkode_kak" value="{{ old('kode_kak') }}" hidden>
                        <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="addkebkode_akt" value="{{ old('kode_akt') }}" hidden>
                        <input type="text" name="item_id" class="form-control" id="additem_id" value="{{ old('item_id') }}" hidden>
                        <input type="text" name="tipe_keb" class="form-control" id="addtipe_keb" hidden>
                        <input type="text" name="jeketibajeno_slug" class="form-control" id="addkjeketibajeno_slug" value="{{ old('jeketibajeno_slug') }}" hidden>
                        <input type="text" name="item_name" class="form-control" id="additem_name" value="{{ old('item_name') }}" readonly>
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="addkharga" value="{{ old('harga') }}" readonly>
                            @error('harga')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="addkjumlah" value="{{ old('jumlah', 1) }}">
                              <span class="input-group-text" id="satsubkeg"></span>
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="addktotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="mb-3">
                      <input class="form-check-input" type="checkbox" value="" id="checkupdateh">
                      <label class="form-check-label text-wrap" for="checkupdateh">
                        Checklist Jika harga pasaran sudah tidak relevan dengan SSH
                      </label>
                    </div>
                    <div class="mb-3" id="fupdateharga" style="display: none">
                      <label for="" class="form-label">Harga terupdate</label>
                      <input type="text" name="update_harga" class="form-control" id="addkebupdate_harga" value="{{ old('update_harga') }}">
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>

                {{-- form usulan ssh --}}
                <div id="addkebusulanssh" style="display: none;">
                  <form method="post" action="/kebutuhanaktrutin/storeusulanssh" class="mb-3">
                  @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Data Usulan SSH</label>
                        <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="addkebukode_kak" value="{{ old('kode_kak') }}" hidden>
                        <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="addkebukode_akt" value="{{ old('kode_akt') }}" hidden>
                        <input type="text" name="tipe_keb" class="form-control" id="addtipe_keb" value="ssh" hidden>
                        <input type="text" name="jeketibajeno_slug" class="form-control" id="addkebujeketibajeno_slug" value="{{ old('jeketibajeno_slug') }}" hidden>
                        <input type="text" name="item_name" class="form-control" id="addkebuitem_name" value="{{ old('item_name') }}">
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="addkebuharga" value="{{ old('harga', 0) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="addkebujumlah" value="{{ old('jumlah', 1) }}">
                              <span class="input-group-text" id="satsubkeg"></span>
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan"  class="form-control @error('satuan') is-invalid @enderror" id="divaddkebusatuan">
                          @foreach ($satuan as $s)
                            <option value="{{ $s->slug }}" class="form-control">{{ $s->name }}</option>
                          @endforeach
                        </select>
                        @error('satuan')
                        
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="addkebutotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- modal sbu --}}
<div class="modal fade" id="addkebutuhanmodalb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan SBU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="addkebbuttona" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodala"><a1 href="{{ $kak->kode_kak }}"></a1>SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="addkebbuttonb" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalb"><a1 href="{{ $kak->kode_kak }}"></a1>SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="addkebbuttonc" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalc"><a1 href="{{ $kak->kode_kak }}"></a1>Hibah</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
                <div class="row">
                    <div class="col col-xl-12">
                        <div class="mb-3">
                            <label for="cari" class="form-label">Cari</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="addksbucari" list="cari" placeholder="Cari nama kebutuhan" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" id="addksbucaribtn" type="button" id="button-addon2"><i class="fa fa-magnifying-glass"></i> Cari</button>
                            </div>
                            <table class="table" id="tblmodalsbu" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Uraian SBU</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodymodalsbu"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- sesi sbu --}}
                <div id="addsbuform" style="display: none;">
                  <select id="addksbudataitem" class="form-control mt-2">
                  </select>
                  <form method="post" action="/kebutuhanaktrutin/storesbu" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Data Kebutuhan SBU</label>
                        <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="addkebsbukode_kak" value="{{ old('kode_kak') }}" hidden>
                        <input type="text" name="kode_akt" class="form-control @error('kode_kak') is-invalid @enderror" id="addkebsbukode_akt" value="{{ old('kode_ak') }}" hidden>
                        <input type="text" name="item_id" class="form-control" id="addsbuitem_id" value="{{ old('item_id') }}" hidden>
                        <input type="text" name="spek" class="form-control" id="addsbuspek" value="" hidden>
                        <input type="text" name="tipe_keb" class="form-control" id="addsbutipe_keb" hidden>
                        <input type="text" name="kode_sbuhead" class="form-control" id="addksbukode_sbuhead" value="{{ old('kode_sbuhead') }}" hidden>
                        <input type="text" name="kali" class="form-control" id="addsbukali" value="{{ old('kali') }}" hidden>
                        <input type="text" name="item_name" class="form-control" id="addksbuitem_name" value="{{ old('item_name') }}" readonly>
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="addsbuharga" value="{{ old('harga') }}" readonly>
                            @error('harga')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah <small>(Gunakan titik (.) jika ada koma)</small></label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="addsbujumlah" value="{{ old('jumlah', 1) }}">
                              <span class="input-group-text" id="satsubkeg"></span>
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="addsbutotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>
                {{-- end sesi sbu --}}

                
                {{-- sesi sbu --}}
                <div id="addusulansbuform"  style="display: none;">
                  <form method="post" action="/kebutuhanaktrutin/storeusulansbu" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Data Usulan SBU</label>
                        <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="addusulsbukode_kak" value="{{ old('kode_kak') }}" hidden>
                        <input type="text" name="kode_akt" class="form-control @error('kode_kak') is-invalid @enderror" id="addusulsbukode_akt" value="{{ old('kode_ak') }}" hidden>
                        <input type="text" name="tipe_keb" class="form-control" id="addusultipe_keb" value="usulansbu" hidden>
                        <input type="text" name="item_name" class="form-control" id="addusulsbuitem_name" value="{{ old('item_name') }}">
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="addusulsbuharga" value="{{ old('harga', 0) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah <small>(Gunakan titik (.) jika ada koma)</small></label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="addusulsbujumlah" value="{{ old('jumlah', 1) }}">
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Satuan</label>
                      <select name="satuan"  class="form-control @error('satuan') is-invalid @enderror" id="addusulsbusatuan">
                        @foreach ($satuan as $s)
                          <option value="{{ $s->slug }}" class="form-control">{{ $s->name }}</option>
                        @endforeach
                      </select>
                      @error('jumlah')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="addusulsbutotal" value="{{ old('total', 0) }}" readonly>
                    </div>
                    <div class="mb-3 text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>
                {{-- end sesi sbu --}}
                
          </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->
{{-- modal LAinnya --}}
<div class="modal fade" id="addkebutuhanmodalc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan Hibah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="addkebbuttona" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodala"><a1 href="{{ $kak->kode_kak }}"></a1>SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark " id="addkebbuttonb" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalb"><a1 href="{{ $kak->kode_kak }}"></a1>SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="addkebbuttonc" data-bs-toggle="modal" data-bs-target="#addkebutuhanmodalc"><a1 href="{{ $kak->kode_kak }}"></a1>Hibah</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
        <form method="post" action="/kebutuhanaktrutin/storeother" class="mb-3">
          @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Uraian</label>
                    <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="addotherkode_kak" value="{{ old('kode_kak') }}" hidden>
                    <input type="text" name="kode_akt" class="form-control @error('kode_kak') is-invalid @enderror" id="addotherkode_akt" value="{{ old('kode_ak') }}" hidden>
                    <input type="text" name="tipe_keb" class="form-control" id="addtipe_keb" value="other" hidden>
                    <input type="text" name="otheruraian" class="form-control" id="addotheruraian" value="{{ old('otheruraian') }}" >
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah <small>(Gunakan titik (.) jika ada koma)</small></label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="addotherjumlah" value="{{ old('jumlah', 1) }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Satuan</label>
                      <select name="satuan" class="form-control">
                        @foreach ($satuan as $s)
                          <option value="{{ $s->slug }}">{{ $s->name }}</option>
                        @endforeach
                      </select>
                      @error('satuan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  </div>
                </div>
                <div class="mb-5">
                    <label for="total" class="form-label">Jumlah Pagu</label>
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="addothertotal" value="{{ old('total') }}">
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Edit Kebutuhan -->
<div class="modal fade" id="editkebmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kebutuhan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/kebutuhanaktrutin" class="mb-3" id="editkebform">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="" class="form-label">Data Kebutuhan</label>
                    <input type="text" name="keb_id" class="form-control" id="editkebkeb_id" value="{{ old('keb_id') }}" hidden>
                    <input type="text" name="item_id" class="form-control" id="editkebitem_id" value="{{ old('item_id') }}" hidden>
                    <input type="text" name="aktivitas_id" class="form-control" id="editkebaktivitas_id" value="{{ old('aktivitas_id') }}" hidden>
                    <input type="text" name="kode_kak" class="form-control" id="editkebkode_kak" value="{{ old('kode_kak') }}" hidden>
                    <input type="text" name="jeketibajeno_slug" class="form-control" id="editkebjeketibajeno_slug" value="{{ old('jeketibajeno_slug') }}" hidden>
                    <input type="text" name="spek" class="form-control" id="editkebspek" value="{{ old('spek') }}" hidden>
                    <input type="text" name="tipe_keb" class="form-control" id="editkebtipe_keb" value="{{ old('tipe_keb') }}" hidden>
                    <input type="text" name="item_name" class="form-control" id="editkebitem_name" value="{{ old('item_name') }}" readonly disabled>
                </div>
                <div class="row">
                  <div class="col col-md-6" id="edithargarow">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="editkebharga" value="{{ old('harga') }}" readonly>
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <div class="input-group">
                          <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="editkebjumlah" value="{{ old('jumlah', 1) }}">
                          <span class="input-group-text" id="editkebsatssh"></span>
                        </div>
                        @error('jumlah')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="editkebtotal" value="{{ old('total') }}" readonly>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Data Kebutuhan</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

@endsection