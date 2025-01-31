@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-center">Kerangka Acuan Kerja Aktivitas Subkegiatan</h1>
    <div class="row "></div>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="accordion mb-3" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button bg-orange text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        KAK Header
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div id="kakheaderform">
          <table class="table tbale-boderless fs-7 m-0 p-0 align-middle">
            <tr class="tbold">
              <td class="w-5">Urusan Pemerintah</td>
              <td class="w-10"></td>
              <td>: {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->kode }} {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->ket }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">bidang Urusan</td>
              <td class="w-10"></td>
              <td>: {{ $kak->subkeg->kegprog->progbid->bidurus->kode }}{{ $kak->subkeg->kegprog->progbid->bidurus->ket }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">Organisasi</td>
              <td class="w-10"></td>
              <td>: {{ $skpd->kode }} {{ $skpd->name }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">Program</td>
              <td class="w-10"></td>
              <td>: {{ $kak->subkeg->kegprog->progbid->kode }} {{ $kak->subkeg->kegprog->progbid->ket }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Capaian Program</td>
              <td>:</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Indikator</td>
              <td>: {{ $kak->icapaianprog }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Target</td>
              <td>: {{ $kak->volcapprog }} {{ $kak->satcapprog }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">Kegiatan</td>
              <td class="w-10"></td>
              <td>: {{ $kak->subkeg->kegprog->kode }} {{ $kak->subkeg->kegprog->ket }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Hasil Kegiatan</td>
              <td>:</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Indikator</td>
              <td>: {{ $kak->ihaskeg }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Target</td>
              <td>: {{ $kak->volhaskeg }} {{ $kak->sathaskeg }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Keluaran Kegiatan</td>
              <td>:</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Indikator</td>
              <td>: {{ $kak->ikeluarankeg }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Target</td>
              <td>: {{ $kak->volkelkeg }} {{ $kak->satkelkeg }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">Subkegiatan</td>
              <td class="w-10"></td>
              <td>: {{ $kak->subkeg->kode }} {{ $kak->subkeg->ket }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Output Subkegiatan</td>
              <td>:</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Indikator</td>
              <td>: {{ $kak->subkeg->indikator }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Target</td>
              <td>: {{ $kak->tarsubkeg }} {{ $subkeg->satuan->satuan }}</td>
            </tr>
            <tr class="tbold">
              <td class="w-5">Aktivitas</td>
              <td class="w-10"></td>
              <td>: {{ $kak->ket }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Keluaran Aktivitas</td>
              <td>:</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Indikator</td>
              <td>: {{ $kak->outakti }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Target</td>
              <td>: {{ $kak->voloutakti }} {{ $kak->satoutakti }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Pendekatan Belanja</td>
              <td>: {{ $kak->kelompokbelanja->ket }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Pencetus Belanja</td>
              <td>: {{ $kak->pencetus->pencetus??'' }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Jumlah Anggaran</td>
              <td>: Rp. 
                @if ($periode->sesi == 'rka')
                  {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                @elseif ($periode->sesi == 'kuappas')
                  {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                @elseif ($periode->sesi == 'apbd')
                  {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                @elseif ($periode->sesi == 'final')
                  {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                @endif
              </td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Waktu Pelaksanaan</td>
              <td>: {{ $kak->dari }} - {{ $kak->sampai }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Lokasi</td>
              <td>: {{ $kak->lokasikak->ket??'' }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Deskripsi Aktivtas</td>
              <td>: {{ $kak->deskrip }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Bagian/Bidang/Sekretariat/UPTD</td>
              <td>: {{ $kak->bidangsek->name??'' }}</td>
            </tr>
            <tr>
              <td class="w-5"></td>
              <td class="w-10">Subbag/Seksi/Sub-koordinator</td>
              <td>: {{ $kak->subbagdkk }}</td>
            </tr>
          </table>

          <button class="btn btn-block btn-warning mt-3 w-100" type="submit" id="kakediting"><i class="fa fa-edit"></i> Edit KAK</button>
          <button class="btn btn-block btn-danger mt-3 w-100" type="submit" id="kakdeleting" data-bs-toggle="modal" title="Hapus Kebutuhan" data-bs-target="#kakdeletemodal"><i class="fa fa-trash"></i> Hapus KAK</button>
        </div>
        <div id="kakeditform" style="display: none">
          <form action="/kak/{{ $kak->kode }}" method="post">
            @csrf
            @method('put')
            <input type="text" name="kode_skpd" value="{{ request('kode_skpd') }}" hidden>
            <input type="text" name="periode" value="{{ request('periode') }}" hidden>
            <table class="table tbale-boderless fs-7 m-0 p-0 align-middle">
              <tr class="tbold">
                <td class="w-5">Urusan Pemerintah</td>
                <td class="w-10"></td>
                <td>: {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->kode }} {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->ket }}</td>
              </tr>
              <tr class="tbold">
                <td class="w-5">bidang Urusan</td>
                <td class="w-10"></td>
                <td>: {{ $kak->subkeg->kegprog->progbid->bidurus->kode }}{{ $kak->subkeg->kegprog->progbid->bidurus->ket }}</td>
              </tr>
              <tr class="tbold">
                <td class="w-5">Organisasi</td>
                <td class="w-10"></td>
                <td>: {{ $skpd->kode }} {{ $skpd->name }}</td>
              </tr>
              <tr class="tbold">
                <td class="w-5">Program</td>
                <td class="w-10"></td>
                <td>: {{ $kak->subkeg->kegprog->progbid->kode }} {{ $kak->subkeg->kegprog->progbid->ket }}</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Capaian Program</td>
                <td>:</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Indikator</td>
                <td><input type="text" name="icapaianprog" class="form-control" value="{{ $kak->icapaianprog }}"></td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Target</td>
                <td>
                  <div class="input-group">
                    <input type="text"name="volcapprog" class="form-control" value="{{ $kak->volcapprog }}">
                    <input type="text"name="satcapprog" class="form-control" value="{{ $kak->satcapprog }}">
                  </div>
                </td>
              </tr>
              <tr class="tbold">
                <td class="w-5">Kegiatan</td>
                <td class="w-10"></td>
                <td>: {{ $kak->subkeg->kegprog->kode }} {{ $kak->subkeg->kegprog->ket }}</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Hasil Kegiatan</td>
                <td>:</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Indikator</td>
                <td>
                  <input type="text"name="ihaskeg" class="form-control" value="{{ $kak->ihaskeg }}">
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Target</td>
                <td>
                  <div class="input-group">
                    <input type="text"name="volhaskeg" class="form-control" value="{{ $kak->volhaskeg }}">
                    <input type="text"name="sathaskeg" class="form-control" value="{{ $kak->sathaskeg }}">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Keluaran Kegiatan</td>
                <td>:</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Indikator</td>
                <td>
                  <input type="text"name="ikeluarankeg" class="form-control" value="{{ $kak->ikeluarankeg }}">
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Target</td>
                <td>
                  <div class="input-group">
                    <input type="text"name="volkelkeg" class="form-control" value="{{ $kak->volkelkeg }}">
                    <input type="text"name="satkelkeg" class="form-control" value="{{ $kak->satkelkeg }}">
                  </div>
                </td>
              </tr>
              <tr class="tbold">
                <td class="w-5">Subkegiatan</td>
                <td class="w-10"></td>
                <td>: {{ $kak->subkeg->kode }} {{ $kak->subkeg->ket }}</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Output Subkegiatan</td>
                <td>:</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Indikator</td>
                <td>: {{ $kak->subkeg->indikator }}</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Target</td>
                <td>
                  <div class="input-group">
                    <input type="text"name="tarsubkeg" class="form-control" value="{{ $kak->tarsubkeg }}">
                    <span class="input-group-text">{{ $subkeg->satuan->satuan }}</span>
                  </div>
                </td>
              </tr>
              <tr class="tbold">
                <td class="w-5">Aktivitas</td>
                <td class="w-10"></td>
                <td>
                  <input type="text"name="ket" class="form-control" value="{{ $kak->name }}">
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Keluaran Aktivitas</td>
                <td>:</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Indikator</td>
                <td>
                  <input type="text"name="outakti" class="form-control" value="{{ $kak->outakti }}">
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Target</td>
                <td>
                  <div class="input-group">
                    <input type="text"name="voloutakti" class="form-control" value="{{ $kak->voloutakti }}">
                    <input type="text"name="satoutakti" class="form-control" value="{{ $kak->satoutakti }}">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Pendekatan Belanja</td>
                <td>: {{ $kak->kelompokbelanja->ket }}</td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Pencetus Belanja</td>
                <td>
                  <select name="pencetuskebe_id" id="" class="form-control">
                    @foreach ($pencetus as $penc)
                      @if ($kak->kelompokbelanja_id == $penc->kebe_id)
                        <option @if($kak->pencetuskebe_id == $penc->id) selected @endif value="{{ $penc->id }}">{{ $penc->pencetus }}</option>
                      @endif
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Jumlah Anggaran</td>
                <td>: Rp. 
                  @if ($periode->sesi == 'rka')
                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                  @elseif ($periode->sesi == 'kuappas')
                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                  @elseif ($periode->sesi == 'apbd')
                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                  @elseif ($periode->sesi == 'final')
                    {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                  @endif
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Waktu Pelaksanaan</td>
                <td>
                  <div class="input-group">
                    <input type="text" name="dari" class="form-control" id="editdari" value="{{ $kak->dari }}">
                    <span class="input-group-text">s/d</span>
                    <input type="text" name="sampai" class="form-control" id="editsampai" value="{{ $kak->sampai }}">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Lokasi</td>
                <td>
                  <select name="lokasi" id="" class="form-control">
                    <option value="">Pilih Lokasi</option>
                    @foreach ($lokasi as $lok)
                    <option @if($kak->lokasi == $lok->id) selected @endif value="{{ $lok->id }}">{{ $lok->ket }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Deskripsi Aktivtas</td>
                <td>
                  <textarea name="deskrip" class="form-control @error('deskrip') is-invalid @enderror" id="adddeskrip" rows="3">{{ $kak->deskrip }}</textarea>
                </td>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Bagian/Bidang/Sekretariat/UPTD</td>
                <td>
                  <input type="text" name="bidang_sekretariat" class="form-control" @if(auth()->user()->role_slug == 'askpd') value="{{ old('bidang_sekretariat', auth()->user()->kode_sub) }}" @else value="{{ $kak->bidang_sekretariat }}" @endif hidden>
                  <select class="form-control" @if(auth()->user()->role_slug == 'askpd') disabled @endif>
                  @foreach ($subunit as $sub)
                    <option value="{{ $sub->kode }}" @if($sub->kode == auth()->user()->kode_sub) selected @endif>{{ $sub->name }}</option>
                  @endforeach
                </select>
              </tr>
              <tr>
                <td class="w-5"></td>
                <td class="w-10">Subbag/Seksi/Sub-koordinator</td>
                <td>
                  <input type="text" name="subbagdkk" class="form-control" id="editdari" value="{{ $kak->subbagdkk }}">
                </td>
              </tr>
            </table>
            <button class="btn btn-block btn-warning mt-3 w-100" type="submit"><i class="fa fa-edit"></i> Ubah header KAK</button>
          </form>
          <button class="btn btn-block btn-danger mt-3 w-100" type="submit" id="kakeditcancel"><i class="fa fa-xmark"></i> Batal</button>
        </div>
      </div>
    </div>
  </div>
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

@if ($kak->kelompokbelanja_id == 2)
  <a href="/skpdprogkak?kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>
  
  @if (auth()->user()->role_slug == 'askpd')
  <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    <div id="addformdivgaji">
      @if ($periode->proses == 'berjalan')
        <form action="/kebutuhanakt" method="POST">
          @csrf
          <div class="row mb-3">
            <div class="col-mb-12">
              <label for="kode" class="form-label"><small class="text-danger">*Mohon Diisi data Detail terlebih dahulu</small></label>
            </div>
            <div class="col-md-6">
              <div class="group-input">
                <input type="text" name="kode_skpd" id="addkode_skpd" class="form-control" value="{{ request('kode_skpd') }}" hidden>
                <input type="text" name="kode_kak" id="addkode_kak" class="form-control" value="{{ $kak->kode }}" hidden>
                <input type="text" name="periode" id="addperiode" class="form-control" value="{{ request('periode') }}" hidden>
                <input type="text" name="tipe_keb" id="addtipe_keb" class="form-control" value="gaji" hidden>
                <input type="text" name="uraian_lain" id="adduraian_lain" class="form-control @error('uraian_lain') is-invalid @enderror" placeholder="Rincian Pengeluaran">
                @error('uraian_lain')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            </div>
            <div class="col-md-5">
              <div class="group-input">
                <input type="text" name="total" id="addtotal" class="form-control @error('uraian_lain') is-invalid @enderror" placeholder="total">
                @error('total')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Rincian</button>
        </form>
      @endif
    </div>
  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
      <div id="addformdivgaji">
        <form action="/kebutuhanakt" method="POST">
          @csrf
          <div class="row mb-3">
            <div class="col-mb-12">
              <label for="kode" class="form-label"><small class="text-danger">*Mohon Diisi data Detail terlebih dahulu</small></label>
            </div>
            <div class="col-md-6">
              <div class="group-input">
                <input type="text" name="kode_skpd" id="addkode_skpd" class="form-control" value="{{ request('kode_skpd') }}" hidden>
                <input type="text" name="kode_kak" id="addkode_kak" class="form-control" value="{{ $kak->kode }}" hidden>
                <input type="text" name="periode" id="addperiode" class="form-control" value="{{ request('periode') }}" hidden>
                <input type="text" name="tipe_keb" id="addtipe_keb" class="form-control" value="gaji" hidden>
                <input type="text" name="uraian_lain" id="adduraian_lain" class="form-control @error('uraian_lain') is-invalid @enderror" placeholder="Rincian Pengeluaran">
                @error('uraian_lain')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            </div>
            <div class="col-md-5">
              <div class="group-input">
                <input type="text" name="total" id="addtotal" class="form-control @error('uraian_lain') is-invalid @enderror" placeholder="total">
                @error('total')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Rincian</button>
        </form>
      </div>
  @endif
  <div id="editformdivgaji" style="display: none;">
    <form id="editgajiform" action="/kebutuhanakt" method="POST">
      @csrf
      @method('put')
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="group-input">
            <input type="text" name="kode_skpd" id="editgajikode_skpd" class="form-control" value="{{ request('kode_skpd') }}" hidden>
            <input type="text" name="kode_kak" id="editgajikode_kak" class="form-control" value="{{ $kak->kode }}" hidden>
            <input type="text" name="periode" id="editgajiperiode" class="form-control" value="{{ request('periode') }}" hidden>
            <input type="text" name="tipe_keb" id="editgajitipe_keb" class="form-control" value="gaji" hidden>
            <input type="text" name="uraian_lain" id="editgajiuraian_lain" class="form-control" placeholder="Rincian Pengeluaran">
          </div>
        </div>
        <div class="col-md-5">
          <div class="group-input">
            <input type="text" name="total" id="editgajitotal" class="form-control" placeholder="total">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-block btn-warning mb-3"><i class="fa fa-plus"></i> Edit Rincian</button>
    </form>
  </div>


  <div class="table-responsive col-lg-12">
      
      <table class="table table-striped table-sm" id="tbl">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Rincian Gaji</th>
            <th scope="col" colspan="2">Anggaran</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <tr class="fs-7 tbold">
            <td colspan="2">Total</td>
            <td colspan="2" class="text-end">
              @if ($periode->sesi == 'rka')
                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
              @elseif ($periode->sesi == 'kuappas')
                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
              @elseif ($periode->sesi == 'apbd')
                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
              @elseif ($periode->sesi == 'final')
                {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
              @endif
            </td>
          </tr>
          @foreach ($kak->kebutuhanakt as $keb)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $keb->uraian_lain }}</td>
                <td>Rp.</td>
                <td class="text-end">
                  @php
                      if($periode->sesi == 'rka'){
                        $kebut = $keb->total_rka;
                      }elseif ($periode->sesi == 'kuappas'){
                        $kebut = $keb->total_kuappas;
                      }elseif ($periode->sesi == 'apbd'){
                        $kebut = $keb->total_apbd;
                      }elseif ($periode->sesi == 'final'){
                        $kebut = $keb->total_final;
                      }
                  @endphp
                  {{ str_replace(',', '.', number_format($kebut)) }}
                </td>
                <td class="text-center">
                  <button class="badge bg-warning border-0" id="editgajibutton"><a kode="{{ $keb->kode }}" total="{{ $kebut }}" uraian="{{ $keb->uraian_lain }}"></a><i class="fa fa-edit"></i></button>
                  <button class="badge bg-danger border-0" id="deletekebbutton" tipe_keb="{{ $keb->tipe_keb }}" datakeb="{{ $keb->kode }}" data-bs-toggle="modal" title="Hapus Kebutuhan" data-bs-target="#kebdeletemodal"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
  </div>

@elseif($kak->kelompokbelanja_id == 3)

  <div class="table-responsive col-lg-12">
    <a href="/skpdprogkak?kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>

    @if (auth()->user()->role_slug == 'askpd')
      @if ($periode->proses == 'berjalan')
        <button class="btn btn-block btn-primary mb-3" id="a" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodala"><a href="{{ $kak->kode_kak }}"></a><i class="fa fa-plus"></i> Tambah Kebutuhan</button>
      @endif
      <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
      <button class="btn btn-block btn-primary mb-3" id="a" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodala"><a href="{{ $kak->kode_kak }}"></a><i class="fa fa-plus"></i> Tambah Kebutuhan</button>
    @endif
    
    <table class="table table-striped table-sm" id="tbl">
      <thead class="text-center">
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
          <th class="text-end">
            @if ($periode->sesi == 'rka')
              {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
            @elseif ($periode->sesi == 'kuappas')
              {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
            @elseif ($periode->sesi == 'apbd')
              {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
            @elseif ($periode->sesi == 'final')
              {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
            @endif
          </th>
        </tr>
        @foreach ($kak->kebutuhanakt as $keb)
          <tr @if ($keb->berubah == 1) class="bg-yellow" @endif>
            <td class="p-0 m-0">{{ $loop->iteration }}</td>
            <td class="w-50 p-0 m-0">
              @if ($keb->tipe_keb == 'ssh')
                <e title="{{ $keb->ssh->ket }}">{{ $keb->ssh->ket }}</e>
              @elseif ($keb->tipe_keb == 'usulanssh')
                <e title="{{ $keb->usulanssh->ket }}">{{ $keb->usulanssh->ket }}</e>
              @elseif ($keb->tipe_keb == 'sbu')
              <e title="{{ $keb->sbu->ket }}">{{ $keb->sbu->ket }}</e>
              @elseif ($keb->tipe_keb == 'usulansbu')
                <e title="{{ $keb->usulansbu->ket }}">{{ $keb->usulansbu->ket }}</e>
              @elseif ($keb->tipe_keb == 'other')
                <e title="{{ $keb->uraian_lain }}">{{ $keb->uraian_lain }}</e>
              @endif
            </td>
            <td class="w-5 p-0 m-0 text-center">
              @if ($periode->sesi == 'rka')
                {{ str_replace('.', ',', $keb->jml_rka) }}
              @elseif ($periode->sesi == 'kuappas')
                {{ str_replace('.', ',', $keb->jml_kuappas) }}
              @elseif ($periode->sesi == 'apbd')
                {{ str_replace('.', ',', $keb->jml_apbd) }}
              @elseif ($periode->sesi == 'final')
                {{ str_replace('.', ',', $keb->jml_final) }}
              @endif
            </td>
            <td class="w-15 p-0 m-0 text-center">
              @if ($keb->tipe_keb == 'ssh')
              {{ $keb->ssh->satuan->satuan??'' }}
              @elseif ($keb->tipe_keb == 'usulanssh')
                {{ $keb->usulanssh->satuan->satuan??'' }}
              @elseif ($keb->tipe_keb == 'sbu')
                {{ $keb->sbu->satuan->satuan??'' }}
              @elseif ($keb->tipe_keb == 'usulansbu')
                {{ $keb->usulansbu->satuan->satuan??'' }}
              @elseif ($keb->tipe_keb == 'other')
                {{ $keb->satuan->satuan??'' }}
              @endif
            </td>
            <td class="w-15 p-0 m-0 text-end">
              @if ($periode->sesi == 'rka')
                {{ str_replace(',', '.', number_format($keb->harga_rka)) }}
              @elseif ($periode->sesi == 'kuappas')
                {{ str_replace(',', '.', number_format($keb->harga_kuappas)) }}
              @elseif ($periode->sesi == 'apbd')
                {{ str_replace(',', '.', number_format($keb->harga_apbd)) }}
              @elseif ($periode->sesi == 'final')
                {{ str_replace(',', '.', number_format($keb->harga_final)) }}
              @endif
            </td>
            <td class="w-15 p-0 m-0 text-end">
              @if ($periode->sesi == 'rka')
                {{ str_replace(',', '.', number_format($keb->total_rka)) }}
              @elseif ($periode->sesi == 'kuappas')
                {{ str_replace(',', '.', number_format($keb->total_kuappas)) }}
              @elseif ($periode->sesi == 'apbd')
                {{ str_replace(',', '.', number_format($keb->total_apbd)) }}
              @elseif ($periode->sesi == 'final')
                {{ str_replace(',', '.', number_format($keb->total_final)) }}
              @endif
            </td>
            <td>
              <a class="badge bg-warning border-0" id="editkebbutton" tipe_keb="{{ $keb->tipe_keb }}" datakeb="{{ $keb->kode }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#kebeditmodal"><i class="fa fa-edit"></i></a>
              <a class="badge bg-danger border-0" id="deletekebbutton" tipe_keb="{{ $keb->tipe_keb }}" datakeb="{{ $keb->kode }}" data-bs-toggle="modal" title="Hapus Kebutuhan" data-bs-target="#kebdeletemodal"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  @else

  <div class="table-responsive col-lg-12">
    <a href="/skpdprogkak?kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>
    
    @if (auth()->user()->role_slug == 'askpd')
      @if ($periode->proses == 'berjalan')
        <button class="btn btn-block btn-primary mb-3" id="tahapaddbutton" data-bs-toggle="modal" data-bs-target="#tahapaddmodal"><i class="fa fa-plus"></i> Tambah Tahap</button>
      @endif
      <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
      <button class="btn btn-block btn-primary mb-3" id="tahapaddbutton" data-bs-toggle="modal" data-bs-target="#tahapaddmodal"><i class="fa fa-plus"></i> Tambah Tahap</button>
    @endif
    
    
    <table class="table bg-white table-sm" id="tblkak">
      <thead>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="3" class="align-middle">No</th>
          <th scope="col" colspan="5">Kebutuhan Sumber Daya</th>
          <th scope="col" colspan="5">Kebutuhan Belanja</th>
          <th scope="col" rowspan="3" class="align-middle">Action</th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" colspan="2">Personil</th>
          <th scope="col" colspan="2">Alat</th>
          <th scope="col" rowspan="2" class="text-wrap align-middle">Data/ Dokumen</th>
          <th scope="col" rowspan="2" colspan="5" class="text-wrap align-middle w-50">
            <table class="table table-borderless m-0 p-0">
              <tr>
                <th class="w-50 p-0 m-0">Uraian Kebutuhan</th>
                <th class="w-5 p-0 m-0">Vol</th>
                <th class="w-15 p-0 m-0">Satuan</th>
                <th class="w-15 p-0 m-0">Harga</th>
                <th class="w-15 p-0 m-0">Total</th>
              </tr>
            </table>
          </th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" colspan="2">
            <table class="table table-borderless p-0 m-0">
              <tr>
                <th class="w-70 p-0 m-0">Rincian</th>
                <th class="w-30 p-0 m-0">Qty</th>
              </tr>
            </table>
          </th>
          <th scope="col" colspan="2">
            <table class="table table-borderless p-0 m-0">
              <tr>
                <th class="w-70 p-0 m-0">Rincian</th>
                <th class="w-30 p-0 m-0">Qty</th>
              </tr>
            </table>
          </th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tr class="fs-7 bg-green">
          <th colspan="10">Total Anggaran</th>
          <th class="text-end">
            @php
              $total_kak = 0;
              foreach ($kak->tahap as $thp) {
                foreach($thp->aktivitas as $akt){
                  if($periode->sesi == 'rka'){
                    $total_kak += $akt->kebutuhanakt->sum('total_rka');
                  }else if($periode->sesi == 'kuappas'){
                    $total_kak += $akt->kebutuhanakt->sum('total_kuappas');
                  }else if($periode->sesi == 'apbd'){
                    $total_kak += $akt->kebutuhanakt->sum('total_apbd');
                  }else if($periode->sesi == 'final'){
                    $total_kak += $akt->kebutuhanakt->sum('total_final');
                  }
                }
              }
              echo str_replace(',', '.', number_format($total_kak))
            @endphp
          </th>
          <th></th>
        </tr>
        {{-- tahap --}}
        @foreach ($kak->tahap as $thp)
          <tr class="fs-8 bg-orange">
              <th class="text-center">{{ chr(64+$loop->iteration) }}</th>
              <th colspan="8">{{ $thp->ket }} 
                @if (auth()->user()->role_slug == 'askpd')
                  @if ($periode->proses == 'berjalan')
                    <button class="badge bg-success border-0" id="aktivitasaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Aktivitas" data-bs-target="#aktivitasaddmodal"><a thp="{{ $thp->kode }}"></a><i class="fa fa-plus"></i></button>
                    <button class="badge bg-warning border-0" id="tahapeditbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit Tahap" data-bs-target="#tahapeditmodal"><a thp="{{ $thp->kode }}"></a><i class="fa fa-edit"></i></button>
                  @endif
                @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                  <button class="badge bg-success border-0" id="aktivitasaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Aktivitas" data-bs-target="#aktivitasaddmodal"><a thp="{{ $thp->kode }}"></a><i class="fa fa-plus"></i></button>
                    <button class="badge bg-warning border-0" id="tahapeditbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit Tahap" data-bs-target="#tahapeditmodal"><a thp="{{ $thp->kode }}"></a><i class="fa fa-edit"></i></button>
                @endif
              </th>
              <th colspan="2" class="text-end">
                @php
                    $total_tahap = 0;
                    foreach($thp->aktivitas as $akt){
                      if($periode->sesi == 'rka'){
                        $total_tahap += $akt->kebutuhanakt->sum('total_rka');
                      }else if($periode->sesi == 'kuappas'){
                        $total_tahap += $akt->kebutuhanakt->sum('total_kuappas');
                      }else if($periode->sesi == 'apbd'){
                        $total_tahap += $akt->kebutuhanakt->sum('total_apbd');
                      }else if($periode->sesi == 'final'){
                        $total_tahap += $akt->kebutuhanakt->sum('total_final');
                      }
                    }
                    echo str_replace(',', '.', number_format($total_tahap))
                @endphp
              </th>
              <th class="text-center">
                @if (auth()->user()->role_slug == 'askpd')
                  @if ($periode->proses == 'berjalan')
                    <form action="/tahap/{{ $thp->kode }}" id="deletethp" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <input type="hidden" name="periode" value="{{ request('periode') }}">
                      <input type="hidden" name="kode_kak" value="{{ request('kode') }}">
                      <input type="hidden" name="kode_skpd" value="{{ request('kode_skpd') }}">
                      <button class="badge bg-danger border-0" data-bs-toogle="tooltip" data-bs-placement="top" title="Hapus Tahap" onclick="return confirm('Yakin Hapus Tahap?')"><i class="fa fa-circle-xmark"></i></button>
                    </form>
                  @endif
                @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                  <form action="/tahap/{{ $thp->kode }}" id="deletethp" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="periode" value="{{ request('periode') }}">
                    <input type="hidden" name="kode_kak" value="{{ request('kode') }}">
                    <input type="hidden" name="kode_skpd" value="{{ request('kode_skpd') }}">
                    <button class="badge bg-danger border-0" data-bs-toogle="tooltip" data-bs-placement="top" title="Hapus Tahap" onclick="return confirm('Yakin Hapus Tahap?')"><i class="fa fa-circle-xmark"></i></button>
                  </form>
                @endif
              </th>
          </tr>
          {{-- aktivitas --}}
          @foreach ($thp->aktivitas as $akt)
            <tr class="fs-8 bg-info">
                <th class="text-center">{{ $loop->iteration }}</th>
                <th colspan="8">{{ $akt->ket }} 
                  @if (auth()->user()->role_slug == 'askpd')
                    @if ($periode->proses == 'berjalan')
                      <button class="badge bg-warning border-0" id="aktivitaseditbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit Aktivitas" data-bs-target="#aktivitaseditmodal"><a akt="{{ $akt->kode }}" thp="{{ $akt->kode_thp }}"></a><i class="fa fa-edit"></i></button>
                    @endif
                  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                    <button class="badge bg-warning border-0" id="aktivitaseditbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit Aktivitas" data-bs-target="#aktivitaseditmodal"><a akt="{{ $akt->kode }}" thp="{{ $akt->kode_thp }}"></a><i class="fa fa-edit"></i></button>
                  @endif
                </th>
                <th colspan="2" class="text-end">
                  @if ($periode->sesi == 'rka')
                    {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_rka'))) }}
                  @elseif ($periode->sesi == 'kuappas')
                    {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_kuappas'))) }}
                  @elseif ($periode->sesi == 'apbd')
                    {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_apbd'))) }}
                  @elseif ($periode->sesi == 'final')
                    {{ str_replace(',', '.', number_format($akt->kebutuhanakt->sum('total_final'))) }}
                  @endif
                </th>
                <th class="text-center">
                  @if (auth()->user()->role_slug == 'askpd')
                    @if ($periode->proses == 'berjalan')
                      <form action="/aktivitas/{{ $akt->kode }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="periode" value="{{ request('periode') }}">
                        <input type="hidden" name="kode_kak" value="{{ request('kode') }}">
                        <input type="hidden" name="kode_skpd" value="{{ request('kode_skpd') }}">
                        <button class="badge bg-danger border-0" data-bs-toogle="tooltip" data-bs-placement="top" title="Hapus Aktivitas" onclick="return confirm('Yakin Hapus AKtivitas?')"><i class="fa fa-circle-xmark"></i></button>
                      </form>
                    @endif
                  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                    <form action="/aktivitas/{{ $akt->kode }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <input type="hidden" name="periode" value="{{ request('periode') }}">
                      <input type="hidden" name="kode_kak" value="{{ request('kode') }}">
                      <input type="hidden" name="kode_skpd" value="{{ request('kode_skpd') }}">
                      <button class="badge bg-danger border-0" data-bs-toogle="tooltip" data-bs-placement="top" title="Hapus Aktivitas" onclick="return confirm('Yakin Hapus AKtivitas?')"><i class="fa fa-circle-xmark"></i></button>
                    </form>
                  @endif
                </th>
            </tr>
  
            @php
              if($periode->sesi == 'rka'){
                $sesi_periode = 'tipe_rka';
              }else if($periode->sesi == 'kuappas'){
                $sesi_periode = 'tipe_kuappas';
              }else if($periode->sesi == 'apbd'){
                $sesi_periode = 'tipe_apbd';
              }else if($periode->sesi == 'final'){
                $sesi_periode = 'tipe_final';
              }
            @endphp
            {{-- data aktivitas --}}
            <tr class="fs-8 border-dark">
              <td></td>
              {{-- personalakt --}}
              <td colspan="2">
                <table class="table table-borderless m-0 p-0">
                  @foreach ($akt->personalakt as $p)
                    @if($p->$sesi_periode != 3)
                      <tr>
                        <td class="w-70 m-0 p-0 text-wrap">
                          @if ($p->personil_slug != null)
                          {{ $p->personil->name }} 
                          @else
                            {{ ucwords($p->otherpersonil) }}
                          @endif
                          
                          @if (auth()->user()->role_slug == 'askpd')
                            @if ($periode->proses == 'berjalan')
                              <a class="text-decoration-none text-dark" id="personalakteditbutton" pers="{{ $p->kode_pers }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#personalakteditmodal"><i class="fa fa-edit"></i></a>
                              <a class="text-decoration-none text-dark" id="personalaktdeletebutton" pers="{{ $p->kode_pers }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#personalaktdeletemodal"><i class="fa fa-trash"></i></a>
                            @endif
                          @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                            <a class="text-decoration-none text-dark" id="personalakteditbutton" pers="{{ $p->kode_pers }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#personalakteditmodal"><i class="fa fa-edit"></i></a>
                            <a class="text-decoration-none text-dark" id="personalaktdeletebutton" pers="{{ $p->kode_pers }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#personalaktdeletemodal"><i class="fa fa-trash"></i></a>
                          @endif
                        </td>
                        <td class="w-30 m-0 p-0 text-center">
                          {{ $p->jumlah }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
                  @if (auth()->user()->role_slug == 'askpd')
                    @if ($periode->proses == 'berjalan')
                      <button class="badge bg-success border-0" id="personalaktaddbutton" data-bs-toggle="modal"  data-bs-placement="top" data-bs-target="#personalaktaddmodal" title="Tambah Personil"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                    @endif
                  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                    <button class="badge bg-success border-0" id="personalaktaddbutton" data-bs-toggle="modal"  data-bs-placement="top" data-bs-target="#personalaktaddmodal" title="Tambah Personil"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                  @endif
              </td>
              {{-- end personalakt --}}
  
              {{-- instruakt --}}
              <td colspan="2">
                <table class="table table-borderless p-0 m-0">
                  @foreach ($akt->instruakt as $i)
                    @if($i->$sesi_periode != 3)
                      <tr>
                        <td class="w-70 m-0 p-0 text-wrap">
                          @if ($i->instruakt_slug != null)
                          {{ $i->instrumen->name??'' }}
                          @else
                          {{ ucwords($i->otherinstru) }}
                          @endif
                          
                          @if (auth()->user()->role_slug == 'askpd')
                            @if ($periode->proses == 'berjalan')
                              <a class="text-decoration-none text-dark" id="instruakteditbutton" instruakt="{{ $i->kode_instruakt }}" data-bs-toggle="modal" title="Edit Instrumen" data-bs-target="#instruakteditmodal"><i class="fa fa-edit"></i></a>
                              <a class="text-decoration-none text-dark" id="instruaktdeletebutton" instruakt="{{ $i->kode_instruakt }}" data-bs-toggle="modal" title="Hapus Instrumen Aktivitas KAK" data-bs-target="#instruaktdeletemodal"><i class="fa fa-trash"></i></a>

                            @endif
                          @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                            <a class="text-decoration-none text-dark" id="instruakteditbutton" instruakt="{{ $i->kode_instruakt }}" data-bs-toggle="modal" title="Edit Instrumen" data-bs-target="#instruakteditmodal"><i class="fa fa-edit"></i></a>
                            <a class="text-decoration-none text-dark" id="instruaktdeletebutton" instruakt="{{ $i->kode_instruakt }}" data-bs-toggle="modal" title="Hapus Instrumen Aktivitas KAK" data-bs-target="#instruaktdeletemodal"><i class="fa fa-trash"></i></a>

                          @endif
                        </td>
                        <td class="w-30 m-0 p-0 text-center">
                          {{ $i->jumlah }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
                
                @if (auth()->user()->role_slug == 'askpd')
                  @if ($periode->proses == 'berjalan')
                    <button class="badge bg-success border-0" id="instruaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Alat" data-bs-target="#instruaktaddmodal"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                  @endif
                @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                  <button class="badge bg-success border-0" id="instruaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Alat" data-bs-target="#instruaktaddmodal"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                @endif
              </td>
              {{-- instruakt --}}
  
              {{-- dataakt --}}
              <td class="text-wrap">
                @foreach ($akt->dataakt as $d)
                  @if($d->$sesi_periode != 3)
                    @if ($d->datakeg_slug != null)
                      {{ $d->datakeg->name }}
                    @else
                      {{ ucwords($d->otherdata) }}
                    @endif
                      
                    @if (auth()->user()->role_slug == 'askpd')
                      @if ($periode->proses == 'berjalan')
                        <a class="text-decoration-none text-dark" id="dataakteditbutton" dataakt="{{ $d->kode_dataakt }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#dataakteditmodal"><i class="fa fa-edit"></i></a>
                        <a class="text-decoration-none text-dark" id="dataaktdeletebutton" dataakt="{{ $d->kode_dataakt }}" data-bs-toggle="modal" title="Hapus Data Aktivitas KAK" data-bs-target="#dataaktdeletemodal"><i class="fa fa-trash"></i></a>
                      @endif
                    @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                      <a class="text-decoration-none text-dark" id="dataakteditbutton" dataakt="{{ $d->kode_dataakt }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#dataakteditmodal"><i class="fa fa-edit"></i></a>
                      <a class="text-decoration-none text-dark" id="dataaktdeletebutton" dataakt="{{ $d->kode_dataakt }}" data-bs-toggle="modal" title="Hapus Data Aktivitas KAK" data-bs-target="#dataaktdeletemodal"><i class="fa fa-trash"></i></a>
                    @endif
                    <br>
                  @endif
                @endforeach

                @if (auth()->user()->role_slug == 'askpd')
                  @if ($periode->proses == 'berjalan')
                    <button class="badge bg-success border-0" id="dataaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Data" data-bs-target="#dataaktaddmodal"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                  @endif
                @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                  <button class="badge bg-success border-0" id="dataaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Data" data-bs-target="#dataaktaddmodal"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                @endif

              </td>
              {{-- dataakt --}}

              {{-- kebutuhanakt --}}
              <td colspan="5">
                <table class="table table-borderless p-0 m-0">
                  @foreach ($akt->kebutuhanakt as $keb)
                    @if($keb->$sesi_periode != 3)
                      <tr @if($keb->berubah == 1) class="bg-yellow" @endif>
                        <td class="w-50 p-0 m-0">
                          @if ($keb->tipe_keb == 'ssh')
                            <e title="{{ $keb->ssh->ket??'' }}">...{{ substr($keb->ssh->ket, -30)??'' }}</e>
                          @elseif ($keb->tipe_keb == 'usulanssh')
                            <e title="{{ $keb->usulanssh->ket??'' }}">...{{ substr($keb->usulanssh->ket, -30)??'' }}</e>
                          @elseif ($keb->tipe_keb == 'sbu')
                          <e title="{{ $keb->sbu->ket??'' }}">...{{ substr($keb->sbu->ket, -30)??'' }}</e>
                          @elseif ($keb->tipe_keb == 'usulansbu')
                            <e title="{{ $keb->usulansbu->ket??'' }}">...{{ substr($keb->usulansbu->ket, -30)??'' }}</e>
                          @elseif ($keb->tipe_keb == 'other')
                            <e title="{{ $keb->uraian_lain }}">...{{ substr($keb->uraian_lain, -30)??'' }}</e>
                          @endif
                          <a class="text-decoration-none text-dark" id="editkebbutton" tipe_keb="{{ $keb->tipe_keb }}" datakeb="{{ $keb->kode }}" data-bs-toggle="modal" title="Edit Kebutuhan" data-bs-target="#kebeditmodal"><i class="fa fa-edit"></i></a>
                          <a class="text-decoration-none text-dark" id="deletekebbutton" tipe_keb="{{ $keb->tipe_keb }}" datakeb="{{ $keb->kode }}" data-bs-toggle="modal" title="Hapus Kebutuhan" data-bs-target="#kebdeletemodal"><i class="fa fa-xmark-circle"></i></a>
                        </td>
                        <td class="w-5 p-0 m-0 text-center">
                          @if ($periode->sesi == 'rka')
                            {{ str_replace('.', ',', $keb->jml_rka) }}
                          @elseif ($periode->sesi == 'kuappas')
                            {{ str_replace('.', ',', $keb->jml_kuappas) }}
                          @elseif ($periode->sesi == 'apbd')
                            {{ str_replace('.', ',', $keb->jml_apbd) }}
                          @elseif ($periode->sesi == 'final')
                            {{ str_replace('.', ',', $keb->jml_final) }}
                          @endif
                        </td>
                        <td class="w-15 p-0 m-0 text-center">
                          @if ($keb->tipe_keb == 'ssh')
                            {{ $keb->ssh->satuan->satuan??'' }}
                          @elseif ($keb->tipe_keb == 'usulanssh')
                            {{ $keb->usulanssh->satuan->satuan??'' }}
                          @elseif ($keb->tipe_keb == 'sbu')
                            {{ $keb->sbu->satuan->satuan??'' }}
                          @elseif ($keb->tipe_keb == 'usulansbu')
                            {{ $keb->usulansbu->satuan->satuan}}
                          @elseif ($keb->tipe_keb == 'other')
                            {{ $keb->satuan->satuan??'' }}
                          @endif
                        </td>
                        <td class="w-15 p-0 m-0 text-end">
                          @if ($periode->sesi == 'rka')
                            {{ str_replace(',', '.', number_format($keb->harga_rka)) }}
                          @elseif ($periode->sesi == 'kuappas')
                            {{ str_replace(',', '.', number_format($keb->harga_kuappas)) }}
                          @elseif ($periode->sesi == 'apbd')
                            {{ str_replace(',', '.', number_format($keb->harga_apbd)) }}
                          @elseif ($periode->sesi == 'final')
                            {{ str_replace(',', '.', number_format($keb->harga_final)) }}
                          @endif
                        </td>
                        <td class="w-15 p-0 m-0 text-end">
                          @if ($periode->sesi == 'rka')
                            {{ str_replace(',', '.', number_format($keb->total_rka)) }}
                          @elseif ($periode->sesi == 'kuappas')
                            {{ str_replace(',', '.', number_format($keb->total_kuappas)) }}
                          @elseif ($periode->sesi == 'apbd')
                            {{ str_replace(',', '.', number_format($keb->total_apbd)) }}
                          @elseif ($periode->sesi == 'final')
                            {{ str_replace(',', '.', number_format($keb->total_final)) }}
                          @endif
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
                
                @if (auth()->user()->role_slug == 'askpd')
                    @if ($periode->proses == 'berjalan')
                      <button class="badge bg-success border-0" id="kebutuhanaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Kebutuhan" data-bs-target="#kebutuhanaktaddmodala"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                    @endif
                  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
                    <button class="badge bg-success border-0" id="kebutuhanaktaddbutton" data-bs-toggle="modal" data-bs-placement="top" title="Tambah Kebutuhan" data-bs-target="#kebutuhanaktaddmodala"><a kode_akt="{{ $akt->kode }}"></a><i class="fa fa-plus"></i></button>
                  @endif
              </td>
              {{-- kebutuhanakt --}}


              <td></td>
            </tr>
            {{-- end data aktivitas --}}
          @endforeach
          {{-- end aktivitas --}}
        @endforeach
        {{-- end tahap --}}
      </tbody>
    </table>
  
    
  </div>
  

@endif

<!-- Modal Delete KAK -->
<div class="modal fade" id="kakdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="deletekakform" action="/kak/{{ $kak->kode }}" class="mb-3">
          @csrf
          @method('delete')
            <div class="mb-3">
              <label for="" class="form-label">Data Kebutuhan</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="deletekakkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="deletekakkode" value="{{ old('kode', $kak->kode_subkeg) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="deletekakperiode" value="{{ old('periode', request('periode')) }}" hidden>
            </div>
            
            <div class="mb-5">
                <label for="total" class="form-label">Data</label>
                
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Kelompok Belanja</td>
                      <td>: {{ $kak->kelompokbelanja->ket }}</td>
                    </tr>
                    <tr>
                      <td>Program</td>
                      <td>: {{ $kak->subkeg->kegprog->progbid->kode }} {{ $kak->subkeg->kegprog->progbid->ket }}</td>
                    </tr>
                    <tr>
                      <td>Kegiatan</td>
                      <td>: {{ $kak->subkeg->kegprog->kode }} {{ $kak->subkeg->kegprog->ket }}</td>
                    </tr>
                    <tr>
                      <td>Subkegiatan</td>
                      <td>: {{ $kak->subkeg->kode }} {{ $kak->subkeg->ket }}</td>
                    </tr>
                    <tr>
                      <td>Nama Aktivitas</td>
                      <td>: {{ $kak->ket??'-' }}</td>
                    </tr>
                    <tr>
                      <td>Total Pagu</td>
                      <td>: Rp. 
                        @if ($periode->sesi == 'rka')
                          {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_rka'))) }}
                        @elseif ($periode->sesi == 'kuappas')
                          {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_kuappas'))) }}
                        @elseif ($periode->sesi == 'apbd')
                          {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_apbd'))) }}
                        @elseif ($periode->sesi == 'final')
                          {{ str_replace(',', '.', number_format($kak->kebutuhanakt->sum('total_final'))) }}
                        @endif</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="editkebalasan" value="{{ old('alasan') }}">
              </div>
            @endif
            
            <div class="text-end">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<!-- Modal Create Tahap -->
<div class="modal fade" id="tahapaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tahap</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/tahap" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                    <table>
                      <tr>
                        <td><h6>1.</h6></td>
                        <td><h6>Tahap Persiapan</h6></td>
                      </tr>
                      <tr>
                        <td><h6>2.</h6></td>
                        <td><h6>Tahap Pelaksanaan</h6></td>
                      </tr>
                      <tr>
                        <td><h6>3.</h6></td>
                        <td><h6>Tahap Penyelesaian</h6></td>
                      </tr>
                    </table>
                  </div>
                  <div class="mb-3">
                      <label for="ket" class="form-label">Nama tahap</label>
                      <input type="text" name="kode_skpd" class="form-control" id="tahapaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control" id="tahapaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control" id="tahapaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="tahapaddket" value="{{ old('ket') }}">
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  @if ($periode->sesi != 'rka')
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Ditambah</label>
                          <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="tahapaddalasan" value="{{ old('alasan') }}">
                    </div>
                  @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Tahap</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal edit Tahap-->
<div class="modal fade" id="tahapeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tahap</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="tahapeditform" action="/tahap" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                    <table>
                      <tr>
                        <td><h6>1.</h6></td>
                        <td><h6>Tahap Persiapan</h6></td>
                      </tr>
                      <tr>
                        <td><h6>2.</h6></td>
                        <td><h6>Tahap Pelaksanaan</h6></td>
                      </tr>
                      <tr>
                        <td><h6>3.</h6></td>
                        <td><h6>Tahap Penyelesaian</h6></td>
                      </tr>
                    </table>
                  </div>
                  <div class="mb-3">
                      <label for="ket" class="form-label">Nama tahap</label>
                      <input type="text" name="kode_skpd" class="form-control" id="tahapeditkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control" id="tahapeditkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control" id="tahapeditperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="tahapeditket" value="{{ old('ket') }}">
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  @if ($periode->sesi != 'rka')
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                          <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="tahapeditalasan" value="{{ old('alasan') }}">
                    </div>
                  @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Tahap</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Create Aktivitas -->
<div class="modal fade" id="aktivitasaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/aktivitas" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="ket" class="form-label">Nama aktivitas</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="aktivitasaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="aktivitasaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="aktivitasaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="kode_thp" class="form-control @error('kode_thp') is-invalid @enderror" id="aktivitasaddkode_thp" value="{{ old('kode_akt') }}" hidden>
                      <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="aktivitasaddket" value="{{ old('ket') }}">
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <h6>Waktu Aktivitas</h6>
                  <div class="mb-3">
                    <label for="name" class="form-label">Dimulai</label>
                    <div class="input-group">
                      <select name="bulandari" id="aktivitasaddbulandari" class="form-control @error('bulandari') is-invalid @enderror">
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      @error('bulandari')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      <select name="minggudari" id="aktivitasaddminggudari" class="form-control @error('minggudari') is-invalid @enderror">
                        <option value="">minggu ke</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      @error('minggudari')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Berakhir</label>
                    <div class="input-group">
                      <select name="bulansampai" id="aktivitasaddbulansampai" class="form-control @error('bulansampai') is-invalid @enderror">
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      @error('bulansampai')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      <select name="minggusampai" id="aktivitasaddminggusampai" class="form-control @error('minggusampai') is-invalid @enderror">
                        <option value="">minggu ke</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      @error('minggusampai')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  @if ($periode->sesi != 'rka')
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Ditambah</label>
                          <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="aktivitasaddalasan" value="{{ old('alasan') }}">
                    </div>
                  @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Aktivitas</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal edit Aktivias -->
<div class="modal fade" id="aktivitaseditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Aktivitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="aktivitaseditform" action="/aktivitas" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="ket" class="form-label">Nama aktivitas</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="aktivitaseditkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="aktivitaseditkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="aktivitaseditperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="aktivitaseditket" value="{{ old('ket') }}">
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <h6>Waktu Aktivitas</h6>
                  <div class="mb-3">
                    <label for="name" class="form-label">Dimulai</label>
                    <div class="input-group">
                      <select name="bulandari" id="aktivitaseditbulandari" class="form-control @error('bulandari') is-invalid @enderror">
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      @error('bulandari')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      <select name="minggudari" id="aktivitaseditminggudari" class="form-control @error('minggudari') is-invalid @enderror">
                        <option value="">minggu ke</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      @error('minggudari')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Berakhir</label>
                    <div class="input-group">
                      <select name="bulansampai" id="aktivitaseditbulansampai" class="form-control @error('bulansampai') is-invalid @enderror">
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      @error('bulansampai')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      <select name="minggusampai" id="aktivitaseditminggusampai" class="form-control @error('minggusampai') is-invalid @enderror">
                        <option value="">minggu ke</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      @error('minggusampai')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  @if ($periode->sesi != 'rka')
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                          <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="aktivitaseditalasan" value="{{ old('alasan') }}">
                    </div>
                  @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Aktivitas</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Add Personil -->
<div class="modal fade" id="personalaktaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Personil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/personalakt" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="personalaktaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="personalaktaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="personalaktaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="personalaktaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Personil</label>
                    <select name="personil_slug" class="form-control" id="personalaktaddpersonil_slug">
                      <option value="">--- Pilih Personil ---</option>
                      @foreach ($personil as $p)
                          <option value="{{ $p->slug }}">{{ $p->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3" id="personalaktaddotherpersonilform">
                  <label for="otherpersonil" class="form-label">Lainnya <small>(diisi jika tidak ditemukan dalam pilihan diatas)</small></label>
                  <input type="text" name="otherpersonil" class="form-control" id="personalaktaddotherpersonil" value="{{ old('otherpersonil') }}">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah Personil</label>
                  <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="personalaktaddjumlah" value="{{ old('jumlah') }}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="personalaktaddalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Personil</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Edit Personil -->
<div class="modal fade" id="personalakteditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Personil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="personalakteditform" action="/personalakt" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="personalaktaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="personalaktaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="personalaktaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Personil</label>
                    <select name="personil_slug" class="form-control" id="personalakteditpersonil_slug">
                      <option value="">--- Pilih Personil ---</option>
                      @foreach ($personil as $p)
                          <option value="{{ $p->slug }}">{{ $p->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3" id="personalakteditotherpersonilform">
                  <label for="otherpersonil" class="form-label">Lainnya <small>(diisi jika tidak ditemukan dalam pilihan diatas)</small></label>
                  <input type="text" name="otherpersonil" class="form-control" id="personalakteditotherpersonil" value="{{ old('otherpersonil') }}">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah Personil</label>
                  <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="personalakteditjumlah" value="{{ old('jumlah') }}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="personalakteditalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Personil</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Delete Instrumen -->
<div class="modal fade" id="personalaktdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Personil Aktivitas KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="deletepform" action="/personalakt" class="mb-3">
          @csrf
          @method('delete')
            <div>
              <label for="" class="form-label">Data Instrumen</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="deleteikode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="deleteikode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="deleteiperiode" value="{{ old('periode', request('periode')) }}" hidden>
            </div>
            
            <div class="mb-5">
                
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Data</td>
                      <td>: <span id="deletepket"></span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="deletepalasan" value="{{ old('alasan') }}">
              </div>
            @endif
            
            <div class="text-end">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<!-- Modal Add Instrumen -->
<div class="modal fade" id="instruaktaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/instruakt" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="instruaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="instruaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="instruaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="instruaktaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Alat</label>
                    <select name="instruakt_slug" class="form-control" id="instruaktaddinstruakt_slug">
                      <option value="">--- Pilih Alat ---</option>
                      @foreach ($instrumen as $i)
                          <option value="{{ $i->slug }}">{{ $i->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                  <label for="otherinstru" class="form-label">Lainnya <small>(diisi jika tidak ditemukan dalam pilihan diatas)</small></label>
                  <input type="text" name="otherinstru" class="form-control" id="instruaktaddotherinstru" value="{{ old('otherpersonil') }}">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah Alat</label>
                  <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="instruaktaddjumlah" value="{{ old('jumlah') }}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="instruaktaddalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Tambah Alat</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit Instrumen -->
<div class="modal fade" id="instruakteditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Alat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="instruakteditform" action="/instruakt" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="instruaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="instruaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="instruaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Alat</label>
                    <select name="instruakt_slug" class="form-control" id="instruakteditinstruakt_slug">
                      <option value="">--- Pilih Alat ---</option>
                      @foreach ($instrumen as $i)
                          <option value="{{ $i->slug }}">{{ $i->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                  <label for="otherinstru" class="form-label">Lainnya <small>(diisi jika tidak ditemukan dalam pilihan diatas)</small></label>
                  <input type="text" name="otherinstru" class="form-control" id="instruakteditotherinstru" value="{{ old('otherpersonil') }}">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah Alat</label>
                  <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="instruakteditjumlah" value="{{ old('jumlah') }}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="instruakteditalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Alat</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Delete Instrumen -->
<div class="modal fade" id="instruaktdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Intrumen Aktivitas KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="deleteiform" action="/instruakt" class="mb-3">
          @csrf
          @method('delete')
            <div>
              <label for="" class="form-label">Data Instrumen</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="deleteikode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="deleteikode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="deleteiperiode" value="{{ old('periode', request('periode')) }}" hidden>
            </div>
            
            <div class="mb-5">
                
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Data</td>
                      <td>: <span id="deleteiket"></span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="deleteialasan" value="{{ old('alasan') }}">
              </div>
            @endif
            
            <div class="text-end">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<!-- Modal Add Data Kegiatan -->
<div class="modal fade" id="dataaktaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/dataakt" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="dataaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="dataaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="dataaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="dataaktaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Data kegiatan</label>
                    <select name="datakeg_slug" class="form-control" id="dataaktadddatakeg_slug">
                      <option value="">--- Pilih Data ---</option>
                      @foreach ($datakeg as $dk)
                          <option value="{{ $dk->slug }}">{{ $dk->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Lainnya</label>
                    <input type="text" name="otherdata" class="form-control @error('otherdata') is-invalid @enderror" id="dataaktaddotherdata" value="{{ old('otherdata') }}">
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="dataaktaddalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Data Kegiatan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Edit Data Kegiatan -->
<div class="modal fade" id="dataakteditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="dataakteditform" action="/dataakt" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="dataaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="dataaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="dataaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Data kegiatan</label>
                    <select name="datakeg_slug" class="form-control" id="dataakteditdatakeg_slug">
                      <option value="">--- Pilih Data ---</option>
                      @foreach ($datakeg as $dk)
                          <option value="{{ $dk->slug }}">{{ $dk->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Lainnya</label>
                    <input type="text" name="otherdata" class="form-control @error('otherdata') is-invalid @enderror" id="dataakteditotherdata" value="{{ old('otherdata') }}">
                </div>
                @if ($periode->sesi != 'rka')
                  <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="dataakteditalasan" value="{{ old('alasan') }}">
                  </div>
                @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="editnewdatakeg" class="btn btn-primary">Edit Data Kegiatan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Delete Dataakt -->
<div class="modal fade" id="dataaktdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Aktivitas KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="deletedform" action="/dataakt" class="mb-3">
          @csrf
          @method('delete')
            <div>
              <label for="" class="form-label">Data Aktivitas</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="deletekebkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="deletekebkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="deletekebperiode" value="{{ old('periode', request('periode')) }}" hidden>
            </div>
            
            <div class="mb-5">
                
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Data</td>
                      <td>: <span id="deletedket"></span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="deletedalasan" value="{{ old('alasan') }}">
              </div>
            @endif
            
            <div class="text-end">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<!-- Modal Add Kebutuhan -->
{{-- modal ssh --}}
<div class="modal fade" id="kebutuhanaktaddmodala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="aa" data-bs-toggle="modal" data-bs-target="#a">SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="ab" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalb">SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="ac" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalc">Non SSH / SBU</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
                <div class="row">
                    <div class="col col-xl-12">
                        <div class="mb-3">
                            <label for="cari" class="form-label">Cari</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="sshaddcari" placeholder="Cari nama kebutuhan">
                              <button class="btn btn-primary" id="sshaddcaributton" type="button"><i class="fa fa-magnifying-glass"></i> Cari</button>
                            </div>
                            <table class="table" id="sshaddtblmodal" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Spek</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody id="sshaddtbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="sshaddform" style="display: none;">
                  <form method="post" action="/kebutuhanakt" class="mb-3">
                  @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Data Kebutuhan</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="sshaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="sshaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="sshaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="sshaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                      <input type="text" name="kode_item" class="form-control" id="sshaddkode_item" value="{{ old('kode_item') }}" hidden>
                      <input type="text" name="tipe_keb" class="form-control" id="sshaddtipe_keb" value="{{ old('tipe_keb') }}" hidden>
                      <textarea name="uraian_lain" class="form-control" id="sshadditem_name" rows="3" readonly></textarea>
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="sshaddharga" value="{{ old('harga') }}" readonly>
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
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="sshaddjumlah" value="{{ old('jumlah', 1) }}">
                              <span class="input-group-text" id="sshaddsatuan"></span>
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    @if ($periode->sesi != 'rka')
                      <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="sshaddalasan" value="{{ old('alasan') }}">
                      </div>
                    @endif
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="sshaddtotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="mb-3">
                      <input class="form-check-input" type="checkbox" id="sshaddcheckupdateh">
                      <label class="form-check-label text-wrap" for="checkupdateh">
                        Checklist Jika harga pasaran sudah tidak relevan dengan SSH
                      </label>
                    </div>
                    <div class="mb-3" id="sshaddupdatehargaform" style="display: none">
                      <label for="" class="form-label">Harga terupdate</label>
                      <input type="text" name="update_harga" class="form-control" id="sshaddupdate_harga" value="{{ old('update_harga') }}">
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>

                {{-- form usulan ssh --}}
                <div id="usshaddform" style="display: none;">
                  <form method="post" action="/kebutuhanakt" class="mb-3">
                  @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Data Kebutuhan</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="usshaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="usshaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="usshaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="usshaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                      <input type="text" name="kode_item" class="form-control" id="usshaddkode_item" value="{{ old('kode_item') }}" hidden>
                      <input type="text" name="tipe_keb" class="form-control" id="usshaddtipe_keb" value="{{ old('tipe_keb') }}" hidden>
                      <textarea name="uraian_lain" class="form-control" id="usshadditem_name" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="usshaddharga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="usshaddjumlah" value="{{ old('jumlah', 1) }}">
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <div class="input-group">
                              <select name="satuan_id" id="usshaddsatuan_id" class="form-select">
                                @foreach ($satuan as $sat)
                                    <option value="{{ $sat->id }}">{!! strtolower($sat->satuan) !!}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('satuan_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    @if ($periode->sesi != 'rka')
                      <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="usshaddalasan" value="{{ old('alasan') }}">
                      </div>
                    @endif
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="usshaddtotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="mb-3">
                      <input class="form-check-input" type="checkbox" id="usshaddcheckupdateh">
                      <label class="form-check-label text-wrap" for="checkupdateh">
                        Checklist Jika harga pasaran sudah tidak relevan dengan SSH
                      </label>
                    </div>
                    <div class="mb-3" id="usshaddupdatehargaform" style="display: none">
                      <label for="" class="form-label">Harga terupdate</label>
                      <input type="text" name="update_harga" class="form-control" id="usshaddupdate_harga" value="{{ old('update_harga') }}">
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
{{-- end modal ssh --}}

{{-- modal sbu --}}
<div class="modal fade" id="kebutuhanaktaddmodalb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan SBU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="aa" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodala">SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="ab" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalb">SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="ac" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalc">Non SSH / SBU</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
                <div class="row">
                    <div class="col col-xl-12">
                        <div class="mb-3">
                            <label for="cari" class="form-label">Cari</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="sbuaddcari" list="cari" placeholder="Cari nama kebutuhan" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" id="sbuaddcaributton" type="button" id="button-addon2"><i class="fa fa-magnifying-glass"></i> Cari</button>
                            </div>
                            <table class="table" id="sbuaddtblmodal" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Uraian SBU</th>
                                        <th>Biaya</th>
                                    </tr>
                                </thead>
                                <tbody id="sbuaddtbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- sesi sbu --}}
                <div id="sbuaddform" style="display: none;">
                  <form method="post" action="/kebutuhanakt" class="mb-3">
                  @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Data Kebutuhan</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="sbuaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="sbuaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="sbuaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="sbuaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                      <input type="text" name="kode_item" class="form-control" id="sbuaddkode_item" value="{{ old('kode_item') }}" hidden>
                      <input type="text" name="tipe_keb" class="form-control" id="sbuaddtipe_keb" value="{{ old('tipe_keb') }}" hidden>
                      <textarea name="uraian_lain" class="form-control" id="sbuadditem_name" rows="3" readonly></textarea>
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="sbuaddharga" value="{{ old('harga') }}" readonly>
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
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="sbuaddjumlah" value="{{ old('jumlah', 1) }}">
                              <span class="input-group-text" id="sbuaddsatuan"></span>
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    @if ($periode->sesi != 'rka')
                      <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="sbuaddalasan" value="{{ old('alasan') }}">
                      </div>
                    @endif
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="sbuaddtotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Tambah Data Kebutuhan</button>
                    </div>
                  </form>
                </div>
                {{-- end sesi sbu --}}

                
                {{-- sesi sbu --}}
                <div id="usbuaddform" style="display: none;">
                  <form method="post" action="/kebutuhanakt" class="mb-3">
                  @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Data Kebutuhan</label>
                      <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="usbuaddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                      <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="usbuaddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="usbuaddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                      <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="usbuaddkode_akt" value="{{ old('kode_akt') }}" hidden>
                      <input type="text" name="kode_item" class="form-control" id="usbuaddkode_item" value="{{ old('kode_item') }}" hidden>
                      <input type="text" name="tipe_keb" class="form-control" id="usbuaddtipe_keb" value="{{ old('tipe_keb') }}" hidden>
                      <textarea name="uraian_lain" class="form-control" id="usbuadditem_name" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="usbuaddharga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <div class="input-group">
                              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="usbuaddjumlah" value="{{ old('jumlah', 1) }}">
                            </div>
                            @error('jumlah')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="col col-md-6">
                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <div class="input-group">
                              <select name="satuan_id" id="usbuaddsatuan_id" class="form-select">
                                @foreach ($satuan as $sat)
                                    <option value="{{ $sat->id }}">{!! strtolower($sat->satuan) !!}</option>
                                @endforeach
                              </select>
                            </div>
                            @error('satuan_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    @if ($periode->sesi != 'rka')
                      <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Diubah</label>
                        <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="usbuaddalasan" value="{{ old('alasan') }}">
                      </div>
                    @endif
                    <div class="mb-5">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="usbuaddtotal" value="{{ old('total') }}" readonly>
                    </div>
                    <div class="text-end">
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
{{-- end modal sbu --}}

<!-- End Modal Create -->
{{-- modal LAinnya --}}
<div class="modal fade" id="kebutuhanaktaddmodalc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan Hibah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark" id="aa" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodala">SSH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark " id="ab" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalb">SBU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-decoration-none text-dark active" id="ac" data-bs-toggle="modal" data-bs-target="#kebutuhanaktaddmodalc">Non SSH / SBU</a>
          </li>
        </ul>
          <div class="row">
              <div class="col col-xl-12">
        <form method="post" action="/kebutuhanakt" class="mb-3">
          @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Uraian <small class="text-danger">*Wajib Diisi</small></label>
                    <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="otheraddkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                    <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="otheraddkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="otheraddperiode" value="{{ old('periode', request('periode')) }}" hidden>
                    <input type="text" name="kode_akt" class="form-control @error('kode_akt') is-invalid @enderror" id="otheraddkode_akt" value="{{ old('kode_akt') }}" hidden>
                    <input type="text" name="tipe_keb" class="form-control" id="otheraddtipe_keb" value="other" hidden>
                    <textarea name="uraian_lain" class="form-control" id="otheradditem_name" rows="3"></textarea>
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah <small>(Gunakan titik (.) jika ada koma)</small>  <small class="text-danger">*Wajib Diisi</small></label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="otheraddjumlah" value="{{ old('jumlah', 1) }}">
                        @error('jumlah')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control" id="otheraddsatuan">
                          @foreach ($satuan as $sat)
                            <option value="{{ $sat->id }}">{!! $sat->satuan !!}</option>
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
                    <label for="total" class="form-label">Jumlah Pagu <small class="text-danger">*Wajib Diisi</small></label>
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="otheraddtotal" value="{{ old('total') }}">
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
<div class="modal fade" id="kebeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kebutuhan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editkebform" action="/kebutuhanakt" class="mb-3">
          @csrf
          @method('put')
            <div class="mb-3">
              <label for="" class="form-label">Data Kebutuhan</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="editkebkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="editkebkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="editkebperiode" value="{{ old('periode', request('periode')) }}" hidden>
              <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="editkebkode" value="{{ old('kode') }}" hidden>
              <input type="text" name="tipe_keb" class="form-control @error('tipe_keb') is-invalid @enderror" id="editkebtipe_keb" value="{{ old('tipe_keb') }}" hidden>
              <textarea name="uraian_lain" class="form-control" id="editkebitem_name" rows="3" readonly></textarea>
            </div>
            <div class="row">
              <div class="col col-md-6">
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="editkebharga" value="{{ old('harga') }}" readonly>
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
                      <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="editkebjumlah" value="{{ old('jumlah', 1) }}">
                      <span class="input-group-text" id="editkebsatuan"></span>
                    </div>
                    @error('jumlah')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="editkebalasan" value="{{ old('alasan') }}">
              </div>
            @endif
            <div class="mb-5">
                <label for="total" class="form-label">Total</label>
                <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="editkebtotal" value="{{ old('total') }}" readonly>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Edit Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Delete Kebutuhan -->
<div class="modal fade" id="kebdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kebutuhan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="deletekebform" action="/kebutuhanakt" class="mb-3">
          @csrf
          @method('delete')
            <div class="mb-3">
              <label for="" class="form-label">Data Kebutuhan</label>
              <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="deletekebkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
              <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="deletekebkode_kak" value="{{ old('kode_kak', $kak->kode) }}" hidden>
              <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="deletekebperiode" value="{{ old('periode', request('periode')) }}" hidden>
            </div>
            
            <div class="mb-5">
                <label for="total" class="form-label">Data</label>
                
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Jenis Kebutuhan</td>
                      <td>: <span id="deletekebtipe_keb"></span></td>
                    </tr>
                    <tr>
                      <td>Nama kebutuhan</td>
                      <td>: <span id="deletekebket"></span></td>
                    </tr>
                    <tr>
                      <td>Harga</td>
                      <td>: <span id="deletekebharga"></span></td>
                    </tr>
                    <tr>
                      <td>Jumlah</td>
                      <td>: <span id="deletekebjumlah"></span></td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td>: <span id="deletekebtotal"></span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            @if ($periode->sesi != 'rka')
              <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Diubah</label>
                <input type="text" name="alasan" class="form-control @error('alasan') is-invalid @enderror" id="editkebalasan" value="{{ old('alasan') }}">
              </div>
            @endif
            
            <div class="text-end">
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus Data Kebutuhan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<!-- Modal Edit Other -->
<div class="modal fade" id="editothermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kebutuhan Lainnya</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/kebutuhanakt" class="mb-3" id="editotherform">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="" class="form-label">Uraian Lainnya</label>
                    <input type="text" name="aktivitas_id" class="form-control" id="editotheraktivitas_id" value="{{ old('aktivitas_id') }}" hidden>
                    <input type="text" name="kode_kak" class="form-control" id="editotherkode_kak" value="{{ old('kode_kak') }}" hidden>
                    <input type="text" name="tipe_keb" class="form-control" id="editothertipe_keb" value="{{ old('tipe_keb') }}" hidden>
                    <input type="text" name="otheruraian" class="form-control" id="editotheruraian" value="{{ old('otheruraian') }}">
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah <small>(Gunakan titik (.) jika ada koma)</small></label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="editotherjumlah" value="{{ old('jumlah', 1) }}">
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
                        <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="editothersatuan" value="{{ old('satuan') }}" list="satuanopt">
                        <datalist id="satuanopt">
                          @foreach ($satuan as $s)
                            <option value="{{ $s->slug }}" class="form-control">{!! $s->name !!}</option>
                          @endforeach
                        </datalist>
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
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="editothertotal" value="{{ old('total') }}">
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

<div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/cetaklaporan?tipe=kak&getlaporan=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ request('kode') }}&periode={{ request('periode') }}" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                    <label for="jenisprint" class="form-label">Jenis Print Out</label>
                    <select name="jenisprint" class="form-select" id="jenisprint">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Cetak</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    $("#kakediting").click(function (e) { 
      e.preventDefault();
      
      $("#kakheaderform").css("display", "none");
      $("#kakeditform").css("display", "block");
    });

    $("#kakeditcancel").click(function (e) { 
      e.preventDefault();
      
      $("#kakheaderform").css("display", "block");
      $("#kakeditform").css("display", "none");
    });
    
    $("#editdari").datepicker({format: "yyyy/mm/dd"});
    $("#editsampai").datepicker({format: "yyyy/mm/dd"});

    $("#tbody #editgajibutton").click(function (e) { 
      e.preventDefault();
      
      var id = $(this).find("a").attr("kode");
      var uraian = $(this).find("a").attr("uraian");
      var total = $(this).find("a").attr("total");
      console.log(id);
      console.log(uraian);
      console.log(total);
      
      $("#addformdivgaji").css("display","none");
      $("#editformdivgaji").css("display","block");

      $("#editgajiuraian_lain").val(uraian);
      $("#editgajitotal").val(total);
      $("#editgajiform").attr("action", "/kebutuhanakt/"+id);
    });

    //edit tahap
    $("#tbody #tahapeditbutton").click(function (e) { 
      e.preventDefault();
      
      var tahap = $(this).find("a").attr("thp");
      $.ajax({
        type: "GET",
        url: "/getdataedit?tbl=tahap_kaks&whr=kode&id="+tahap,
        success: function (data) {
          $("#tahapeditmodal #tahapeditform").attr("action", "/tahap/"+tahap);
          $("#tahapeditmodal #tahapeditket").val(data.ket);
        }
      });
    });

    //tambah aktivitas
    $("#tbody #aktivitasaddbutton").click(function (e) { 
      e.preventDefault();
      
      var tahap = $(this).find("a").attr("thp");
      $("#aktivitasaddmodal #aktivitasaddkode_thp").val(tahap);
    });

    //edit aktivitas
    $("#tbody #aktivitaseditbutton").click(function (e) { 
      e.preventDefault();
      
      var tahap = $(this).find("a").attr("thp");
      var aktivitas = $(this).find("a").attr("akt");
      $.ajax({
        type: "GET",
        url: "/getdataedit?tbl=aktivitas_kaks&whr=kode&id="+aktivitas,
        success: function (data) {
          $("#aktivitaseditmodal #aktivitaseditform").attr("action", "/aktivitas/"+aktivitas);
          $("#aktivitaseditmodal #aktivitaseditkode_thp").val(tahap);
          $("#aktivitaseditmodal #aktivitaseditket").val(data.ket);
          $("#aktivitaseditmodal #aktivitaseditbulandari").val(data.bulandari).change();
          $("#aktivitaseditmodal #aktivitaseditminggudari").val(data.minggudari).change();
          $("#aktivitaseditmodal #aktivitaseditbulansampai").val(data.bulansampai).change();
          $("#aktivitaseditmodal #aktivitaseditminggusampai").val(data.minggusampai).change();
        }
      });
    });

    //tambah personalakt
    $("#tbody #personalaktaddbutton").click(function (e) { 
      e.preventDefault();
      
      var aktivitas = $(this).find("a").attr("kode_akt");
      $("#personalaktaddmodal #personalaktaddkode_akt").val(aktivitas);
    });

    //edit personalakt
    $("#tbody").on("click", "#personalakteditbutton", function (e) { 
      e.preventDefault();

      var personalakt = $(this).attr("pers");
      $.ajax({
        type: "GET",
        url: "/getdataedit?tbl=personalakts&whr=kode_pers&id="+personalakt,
        success: function (data) {
          $("#personalakteditmodal #personalakteditform").attr("action", "/personalakt/"+personalakt);
          $("#personalakteditmodal #personalakteditpersonil_slug").val(data.personil_slug).change();
          $("#personalakteditmodal #personalakteditotherpersonil").val(data.otherpersonil);
          $("#personalakteditmodal #personalakteditjumlah").val(data.jumlah);
        }
      });
    });

    //delete instruakt
    $("#tbody #personalaktdeletebutton").click(function (e) { 
      e.preventDefault();
      
      var kode = $(this).attr('pers');
      var _with = ['personil'];

      $.ajax({
        type: "GET",
        url: "/getdatawith?tbl=App\\Personalakt&whr=kode_pers&id="+kode+"&with="+_with,
        success: function (data) {
          $("#deletepform").attr("action", "/personalakt/"+kode);

          if(data.otherpersonil == ''){
            $("#deletepket").text(data.personil.name);
          }else{
            $("#deletepket").text(data.otherpersonil);
          }
        }
      });
    });

    //tambah instruakt
    $("#tbody #instruaktaddbutton").click(function (e) { 
      e.preventDefault();
      
      var aktivitas = $(this).find("a").attr("kode_akt");
      $("#instruaktaddmodal #instruaktaddkode_akt").val(aktivitas);
    });

    //edit instruakt
    $("#tbody").on("click", "#instruakteditbutton", function (e) { 
      e.preventDefault();

      var instruakt = $(this).attr("instruakt");
      $.ajax({
        type: "GET",
        url: "/getdataedit?tbl=instruakts&whr=kode_instruakt&id="+instruakt,
        success: function (data) {
          $("#instruakteditmodal #instruakteditform").attr("action", "/instruakt/"+instruakt);
          $("#instruakteditmodal #instruakteditinstruakt_slug").val(data.instruakt_slug).change();
          $("#instruakteditmodal #instruakteditotherinstru").val(data.otherinstru);
          $("#instruakteditmodal #instruakteditjumlah").val(data.jumlah);
        }
      });
    });

    //delete instruakt
    $("#tbody #instruaktdeletebutton").click(function (e) { 
      e.preventDefault();
      
      var kode = $(this).attr('instruakt');
      var _with = ['instrumen'];

      $.ajax({
        type: "GET",
        url: "/getdatawith?tbl=App\\Instruakt&whr=kode_instruakt&id="+kode+"&with="+_with,
        success: function (data) {
          $("#deleteiform").attr("action", "/instruakt/"+kode);

          if(data.otherinstru == ''){
            $("#deleteiket").text(data.instrumen.name);
          }else{
            $("#deleteiket").text(data.otherinstru);
          }
        }
      });
    });

    //tambah dataakt
    $("#tbody #dataaktaddbutton").click(function (e) { 
      e.preventDefault();
      
      var aktivitas = $(this).find("a").attr("kode_akt");
      $("#dataaktaddmodal #dataaktaddkode_akt").val(aktivitas);
    });

    //edit dataakt
    $("#tbody").on("click", "#dataakteditbutton", function (e) { 
      e.preventDefault();

      var dataakt = $(this).attr("dataakt");
      $.ajax({
        type: "GET",
        url: "/getdataedit?tbl=dataakts&whr=kode_dataakt&id="+dataakt,
        success: function (data) {
          $("#dataakteditmodal #dataakteditform").attr("action", "/dataakt/"+dataakt);
          $("#dataakteditmodal #dataakteditdatakeg_slug").val(data.datakeg_slug).change();
          $("#dataakteditmodal #dataakteditotherdata").val(data.otherdata);
        }
      });
    });

    //delete dataakt
    $("#tbody #dataaktdeletebutton").click(function (e) { 
      e.preventDefault();
      
      var kode = $(this).attr('dataakt');
      var _with = ['datakeg'];

      $.ajax({
        type: "GET",
        url: "/getdatawith?tbl=App\\Dataakt&whr=kode_dataakt&id="+kode+"&with="+_with,
        success: function (data) {
          $("#deletedform").attr("action", "/dataakt/"+kode);

          if(data.otherdata == ''){
            $("#deletedket").text(data.datakeg.name);
          }else{
            $("#deletedket").text(data.otherdata);
          }
        }
      });
    });

    //tambah kebutuhanakt
    $("#tbody #kebutuhanaktaddbutton").click(function (e) { 
      e.preventDefault();
      
      var aktivitas = $(this).find("a").attr("kode_akt");
      $("#kebutuhanaktaddmodala #sshaddkode_akt").val(aktivitas);
      $("#kebutuhanaktaddmodala #usshaddkode_akt").val(aktivitas);
      $("#kebutuhanaktaddmodalb #sbuaddkode_akt").val(aktivitas);
      $("#kebutuhanaktaddmodalb #usbuaddkode_akt").val(aktivitas);
      $("#kebutuhanaktaddmodalc #otheraddkode_akt").val(aktivitas);
    });

    //cari ssh
    $("#kebutuhanaktaddmodala #sshaddcaributton").click(function (e) { 
      e.preventDefault();

      $("#kebutuhanaktaddmodala #sshaddform").css("display", "none");
      $("#kebutuhanaktaddmodala #usshaddform").css("display", "none");
      
      var cari = $("#kebutuhanaktaddmodala #sshaddcari").val();
      var tblmodal = $("#sshaddtblmodal");
      var tbody = $("#sshaddtbody");
      $.ajax({
        type: "GET",
        url: "/getitemkeb?cari="+cari,
        success: function (data) {
          var tr = "";
          $.each(data, function (index, value) { 
             var i = index+1;
             tr += "<tr class='clickable' id='sshdata' kebid='"+data[index].id+"' ket='"+data[index].ket+"' harga='"+data[index].harga_std+"' satuan='"+data[index].satuan.satuan+"' spek='"+data[index].spek+"' tipe_keb='ssh'><td>"+i+".</td><td>"+data[index].ket+"</td><td>"+data[index].spek+"</td><td>"+data[index].harga_std+"</td><td>"+data[index].satuan.satuan+"</td></tr>";
          });
          tr += "<tr class='clickable' id='checkusulan'><td colspan='5'><i class='fa fa-magnifying-glass'></i> Lihat Usulan Pengguna untuk pencarian ini</td></tr>";
          tbody.html(tr);
          tblmodal.css("display", "block");
        }
      });
    });

    //ssh data clicked
    $("#sshaddtbody").on("click", "#sshdata", function (e) { 
      e.preventDefault();
      
      var kebid = $(this).attr("kebid");
      var ket = $(this).attr("ket");
      var harga = $(this).attr("harga");
      var satuan = $(this).attr("satuan");
      var spek = $(this).attr("spek");
      var tipe_keb = $(this).attr("tipe_keb");

      $("#kebutuhanaktaddmodala #sshaddform").css("display", "block");
      $("#kebutuhanaktaddmodala #sshaddkode_item").val(kebid);
      $("#kebutuhanaktaddmodala #sshaddtipe_keb").val(tipe_keb);
      $("#kebutuhanaktaddmodala #sshadditem_name").text(ket);
      $("#kebutuhanaktaddmodala #sshaddharga").val(harga);
      $("#kebutuhanaktaddmodala #sshaddsatuan").text(satuan);
      $("#kebutuhanaktaddmodala #sshaddtotal").val(harga);
      // $("#kebutuhanaktaddmodala #sshaddspek").val(spek);

      if(harga == 0){
        $("#kebutuhanaktaddmodala #sshaddharga").attr('readonly', false);
      }else if(harga != 0){
        $("#kebutuhanaktaddmodala #sshaddharga").attr('readonly', true);
      }

      $("#kebutuhanaktaddmodala #sshaddtblmodal").css("display", "none");
    });

    //jumlah updated
    $("#kebutuhanaktaddmodala #sshaddjumlah").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $("#kebutuhanaktaddmodala #sshaddharga").val();
      var jumlah = $(this).val();
      $("#kebutuhanaktaddmodala #sshaddtotal").val(harga*jumlah);
    });

    //harga updated
    $("#kebutuhanaktaddmodala #sshaddharga").keyup(function (e) { 
      e.preventDefault();
      
      var jumlah = $("#kebutuhanaktaddmodala #sshaddjumlah").val();
      var harga = $(this).val();
      $("#kebutuhanaktaddmodala #sshaddtotal").val(harga*jumlah);
    });

    //jumlah usulan updated
    $("#usshaddform #usshaddjumlah").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $("#usshaddform #usshaddharga").val();
      var jumlah = $(this).val();
      $("#usshaddform #usshaddtotal").val(harga*jumlah);
    });

    //harga usulan updated
    $("#usshaddform #usshaddharga").keyup(function (e) { 
      e.preventDefault();
      
      var jumlah = $("#usshaddform #usshaddjumlah").val();
      var harga = $(this).val();
      $("#usshaddform #usshaddtotal").val(harga*jumlah);
    });

    $("#kebutuhanaktaddmodala #sshaddcheckupdateh").click(function (e) { 
      e.preventDefault();
      
      var konocheckbox = $(this);
      if(konocheckbox.is(":checked")){
        $("#kebutuhanaktaddmodala #sshaddupdatehargaform").css("display", "block");
      }else{
        $("#kebutuhanaktaddmodala #sshaddupdatehargaform").css("display", "none");
        $("#kebutuhanaktaddmodala #sshaddupdate_harga").val("");
      }
    });

    //checkusulan clicked
    $("#sshaddtbody").on("click", "#checkusulan", function (e) { 
      e.preventDefault();
      
      var cari = $("#kebutuhanaktaddmodala #sshaddcari").val();
      var tblmodal = $("#sshaddtblmodal");
      var tbody = $("#sshaddtbody");
      $.ajax({
        type: "GET",
        url: "/getusulankeb?cari="+cari,
        success: function (data) {
          var tr = "";
          $.each(data, function (index, value) { 
             var i = index+1;
             tr += "<tr class='clickable' id='sshdata' kebid='"+data[index].id+"' ket='"+data[index].ket+"' harga='"+data[index].harga_std+"' satuan='"+data[index].satuan.satuan+"' spek='"+data[index].spek+"' tipe_keb='dariusulanssh'><td>"+i+".</td><td>"+data[index].ket+"</td><td>"+data[index].spek+"</td><td>"+data[index].harga_std+"</td><td>"+data[index].satuan.satuan+"</td></tr>";
          });
          tr += "<tr class='clickable' id='usulanssh' tipe_keb='usulanssh'><td colspan='5'><i class='fa fa-circle-plus'></i> Tambahkan Usulan SSH</td></tr>";
          tbody.html(tr);
          tblmodal.css("display", "block");
        }
      });
    });

    //checkusulan clicked
    $("#sshaddtbody").on("click", "#usulanssh", function (e) { 
      e.preventDefault();
      
      var tipe_keb = $(this).attr("tipe_keb");
      $("#kebutuhanaktaddmodala #sshaddtblmodal").css("display", "none");
      $("#kebutuhanaktaddmodala #sshaddform").css("display", "none");
      $("#kebutuhanaktaddmodala #usshaddtipe_keb").val(tipe_keb);
      $("#kebutuhanaktaddmodala #usshaddform").css("display", "block");
    });

    //cari sbu
    $("#kebutuhanaktaddmodalb #sbuaddcaributton").click(function (e) { 
      e.preventDefault();

      $("#kebutuhanaktaddmodalb #sbuaddform").css("display", "none");
      $("#kebutuhanaktaddmodalb #usbuaddform").css("display", "none");
      
      var cari = $("#kebutuhanaktaddmodalb #sbuaddcari").val();
      var tblmodal = $("#sbuaddtblmodal");
      var tbody = $("#sbuaddtbody");
      $.ajax({
        type: "GET",
        url: "/getsbukeb?cari="+cari,
        success: function (data) {
          var tr = "";
          $.each(data, function (index, value) { 
            var i = index+1;
            tr += "<tr class='clickable' id='sbudata' kebid='"+data[index].id+"' ket='"+data[index].ket+"' harga='"+data[index].harga+"' satuan='' spek='"+data[index].kali+"' tipe_keb='sbu'><td>"+i+".</td><td>"+data[index].ket+"</td><td>"+data[index].harga+"</td></tr>";
          });
          tr += "<tr class='clickable' id='checkusulan'><td colspan='5'><i class='fa fa-magnifying-glass'></i> Lihat Usulan Pengguna untuk pencarian ini</td></tr>";
          tbody.html(tr);
          tblmodal.css("display", "block");
        }
      });
    });

    //sbu data clicked
    $("#sbuaddtbody").on("click", "#sbudata", function (e) { 
      e.preventDefault();
      
      var kebid = $(this).attr("kebid");
      var ket = $(this).attr("ket");
      var harga = $(this).attr("harga");
      var satuan = $(this).attr("satuan");
      var kali = $(this).attr("spek");
      var tipe_keb = $(this).attr("tipe_keb");

      $("#kebutuhanaktaddmodalb #sbuaddtblmodal").css("display", "none");
      $("#kebutuhanaktaddmodalb #sbuaddform").css("display", "block");
      $("#kebutuhanaktaddmodalb #sbuaddkode_item").val(kebid);
      $("#kebutuhanaktaddmodalb #sbuaddtipe_keb").val(tipe_keb);
      $("#kebutuhanaktaddmodalb #sbuadditem_name").text(ket);
      $("#kebutuhanaktaddmodalb #sbuaddharga").val(harga);
      // $("#kebutuhanaktaddmodalb #sbuaddsatuan").text(satuan);
      $("#kebutuhanaktaddmodalb #sbuaddtotal").val(harga);
      // $("#kebutuhanaktaddmodalb #sbuaddspek").val(spek);

      if(harga == 0){
        $("#kebutuhanaktaddmodalb #sbuaddharga").prop("readonly", false);
      }else if(harga > 0){
        $("#kebutuhanaktaddmodalb #sbuaddharga").prop("readonly", true);
      }

      if(kali == 1){
        $("#kebutuhanaktaddmodalb #sbuaddharga").val(harga);
        $("#kebutuhanaktaddmodalb #sbuaddtotal").val(harga);
      }else if(kali > 1){
        $("#kebutuhanaktaddmodalb #sbuaddjumlah").val(kali);
        $("#kebutuhanaktaddmodalb #sbuaddjumlah").prop("readonly", true);
        $("#kebutuhanaktaddmodalb #sbuaddharga").prop("readonly", false);
        $("#kebutuhanaktaddmodalb #sbuaddtotal").val(harga);
      }else if(kali == 0){
        $("#kebutuhanaktaddmodalb #sbuaddjumlah").prop("readonly", false);
        $("#kebutuhanaktaddmodalb #sbuaddharga").prop("readonly", false);
        $("#kebutuhanaktaddmodalb #sbuaddtotal").val(0);
      }
    });

    //jumlah updated
    $("#kebutuhanaktaddmodalb #sbuaddjumlah").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $("#kebutuhanaktaddmodalb #sbuaddharga").val();
      var jumlah = $(this).val();
      $("#kebutuhanaktaddmodalb #sbuaddtotal").val(harga*jumlah);
    });

    //harga updated
    $("#kebutuhanaktaddmodalb #sbuaddharga").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $(this).val();
      var jumlah = $("#kebutuhanaktaddmodalb #sbuaddjumlah").val();
      $("#kebutuhanaktaddmodalb #sbuaddtotal").val(harga*jumlah);
    });

    // //jumlah usulan updated
    // $("#usbuaddform #usbuaddjumlah").keyup(function (e) { 
    //   e.preventDefault();
      
    //   var harga = $("#usbuaddform #sbuaddharga").val();
    //   var jumlah = $(this).val();
    //   $("#usbuaddform #usbuaddtotal").val(harga*jumlah);
    // });

    // //harga usulan updated
    // $("#usbuaddform #usbuaddjumlah").keyup(function (e) { 
    //   e.preventDefault();
      
    //   var harga = $(this).val();
    //   var jumlah = $("#usbuaddform #sbuaddjumlah").val();
    //   $("#usbuaddform #usbuaddtotal").val(harga*jumlah);
    // });

    $("#kebutuhanaktaddmodalb #sbuaddcheckupdateh").click(function (e) { 
      e.preventDefault();
      
      var konocheckbox = $(this);
      if(konocheckbox.is(":checked")){
        $("#kebutuhanaktaddmodalb #sbuaddupdatehargaform").css("display", "block");
      }else{
        $("#kebutuhanaktaddmodalb #sbuaddupdatehargaform").css("display", "none");
        $("#kebutuhanaktaddmodalb #sbuaddupdate_harga").val("");
      }
    });

    //checkusulan clicked
    $("#sbuaddtbody").on("click", "#checkusulan", function (e) { 
      e.preventDefault();
      
      var cari = $("#kebutuhanaktaddmodalb #sbuaddcari").val();
      var tblmodal = $("#sbuaddtblmodal");
      var tbody = $("#sbuaddtbody");
      $.ajax({
        type: "GET",
        url: "/getusulansbu?cari="+cari,
        success: function (data) {
          var tr = "";
          $.each(data, function (index, value) { 
            var i = index+1;
            tr += "<tr class='clickable' id='sbudata' kebid='"+data[index].id+"' ket='"+data[index].ket+"' harga='"+data[index].harga+"' satuan='' spek='"+data[index].kali+"' tipe_keb='dariusulansbu'><td>"+i+".</td><td>"+data[index].ket+"</td><td>"+data[index].harga+"</td></tr>";
          });
          tr += "<tr class='clickable' id='usulansbu' tipe_keb='usulansbu'><td colspan='5'><i class='fa fa-circle-plus'></i> Tambahkan Usulan sbu</td></tr>";
          tbody.html(tr);
          tblmodal.css("display", "block");
        }
      });
    });

    //checkusulan clicked
    $("#sbuaddtbody").on("click", "#usulansbu", function (e) { 
      e.preventDefault();
      
      var tipe_keb = $(this).attr("tipe_keb");
      $("#kebutuhanaktaddmodalb #sbuaddtblmodal").css("display", "none");
      $("#kebutuhanaktaddmodalb #sbuaddform").css("display", "none");
      $("#kebutuhanaktaddmodalb #usbuaddtipe_keb").val(tipe_keb);
      $("#kebutuhanaktaddmodalb #usbuaddform").css("display", "block");
    });

    //harga usulan sbu updated
    $("#kebutuhanaktaddmodalb #usbuaddharga").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $(this).val();
      var jumlah = $("#kebutuhanaktaddmodalb #usbuaddjumlah").val();
      $("#kebutuhanaktaddmodalb #usbuaddtotal").val(harga*jumlah);
    });

    //jumlah usulan sbu updated
    $("#kebutuhanaktaddmodalb #usbuaddjumlah").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $("#kebutuhanaktaddmodalb #usbuaddharga").val();
      var jumlah = $(this).val();
      $("#kebutuhanaktaddmodalb #usbuaddtotal").val(harga*jumlah);
    });

    //kebutuhanakt button clicked
    $("#tbody #editkebbutton").click(function (e) { 
      e.preventDefault();
      
      var datakeb = $(this).attr('datakeb');
      var tipe_keb = $(this).attr('tipe_keb');

      $("#kebeditmodal #editkebtipe_keb").val(tipe_keb)
      if(tipe_keb != 'ssh' && tipe_keb != 'usulanssh' && tipe_keb != 'sbu' && tipe_keb != 'usulansbu'){
        tipe_keb = '';
      }

      console.log(tipe_keb);

      $.ajax({
        type: "GET",
        url: "/getitemedit?with="+tipe_keb+"&kode="+datakeb,
        success: function (data) {
          console.log(data);
          $("#editkebform").attr("action", "/kebutuhanakt/"+datakeb);
          $("#editkebkode").val(data.kode);
          if(data.tipe_keb == "ssh"){
            $("#editkebitem_name").val(data.ssh.ket);
          }else if(data.tipe_keb == "usulanssh"){
            $("#editkebitem_name").val(data.usulanssh.ket);
          }else if(data.tipe_keb == "sbu"){
            $("#editkebitem_name").val(data.sbu.ket);
          }else if(data.tipe_keb == "usulansbu"){
            $("#editkebitem_name").val(data.usulansbu.ket);
          }else{
            $("#editkebitem_name").val(data.uraian_lain);
          }
          <?php if($periode->sesi == 'rka'){?>
            var harga = data.harga_rka;
            var jml = parseInt(data.jml_rka);
            var total = data.total_rka;
          <?php }else if($periode->sesi == 'kuappas'){?>
            var harga = data.harga_kuappas;
            var jml = parseInt(data.jml_kuappas);
            var total = data.total_kuappas;
          <?php }else if($periode->sesi == 'apbd'){?>
            var harga = data.harga_apbd;
            var jml = parseInt(data.jml_apbd);
            var total = data.total_apbd;
          <?php }else if($periode->sesi == 'final'){?>
            var harga = data.harga_final;
            var jml = parseInt(data.jml_final);
            var total = data.total_final;
          <?php }?>
          if(tipe_keb == ''){
            $("#editkebitem_name").prop("readonly", false);
            $("#editkebtotal").prop("readonly", false);
            $("#editkebharga").prop("readonly", true);
            $("#editkebjumlah").prop("readonly", false);
          }else{
            $("#editkebitem_name").prop("readonly", true);
            $("#editkebtotal").prop("readonly", true);
            $("#editkebharga").prop("readonly", true);
            $("#editkebjumlah").prop("readonly", false);
          }
          if(tipe_keb == 'sbu'){
            if(data.sbu.kali == 1){
              $("#editkebharga").prop("readonly", true);
              $("#editkebjumlah").prop("readonly", false);
            }else if(data.sbu.kali > 1){
              $("#editkebharga").prop("readonly", false);
              $("#editkebjumlah").prop("readonly", true);
            }else if(data.sbu.kali == 0){
              $("#editkebharga").prop("readonly", false);
              $("#editkebjumlah").prop("readonly", false);
            }
          }
          $("#editkebharga").val(harga);
          $("#editkebjumlah").val(jml);
          $("#editkebtotal").val(total);
        }
      });
    });

    //edit jumlah updated
    $("#kebeditmodal #editkebjumlah").keyup(function (e) { 
      e.preventDefault();
      
      var tipe_keb = $("#kebeditmodal #editkebtipe_keb").val();
      var harga = $("#kebeditmodal #editkebharga");
      var jumlah = $(this).val();
      if(tipe_keb == 'other'){
        var total = $("#kebeditmodal #editkebtotal").val();
        $("#kebeditmodal #editkebharga").val(total/jumlah);
      }else{
        $("#kebeditmodal #editkebtotal").val(harga.val()*jumlah);
      }
    });

    //edit harga updated
    $("#kebeditmodal #editkebharga").keyup(function (e) { 
      e.preventDefault();
      
      var harga = $(this).val();
      var jumlah = $("#kebeditmodal #editkebjumlah").val();
      $("#kebeditmodal #editkebtotal").val(harga*jumlah);
    });

    $("#kebeditmodal #editkebtotal").keyup(function (e) {
      var tipe_keb = $("#kebeditmodal #editkebtipe_keb").val();
      var total = $(this).val();
      var jumlah = $("#kebeditmodal #editkebjumlah").val();
      if(tipe_keb == 'other'){
        $("#kebeditmodal #editkebharga").val(total/jumlah);
      }
    });

    $("#tbody #deletekebbutton").click(function (e) { 
      e.preventDefault();
      
      var datakeb = $(this).attr('datakeb');
      var tipe_keb = $(this).attr('tipe_keb');

      $("#kebdeletemodal #deletekebtipe_keb").val(tipe_keb)
      if(tipe_keb != 'ssh' && tipe_keb != 'usulanssh' && tipe_keb != 'sbu' && tipe_keb != 'usulansbu'){
        tipe_keb = '';
      }

      $.ajax({
        type: "GET",
        url: "/getitemedit?with="+tipe_keb+"&kode="+datakeb,
        success: function (data) {
          $("#deletekebform").attr("action", "/kebutuhanakt/"+datakeb);
          
          $("#deletekebtipe_keb").text(tipe_keb);
          if(data.tipe_keb == "ssh"){
            $("#deletekebket").text(data.ssh.ket);
          }else if(data.tipe_keb == "usulanssh"){
            $("#deletekebket").text(data.usulanssh.ket);
          }else if(data.tipe_keb == "sbu"){
            $("#deletekebket").text(data.sbu.ket);
          }else if(data.tipe_keb == "usulansbu"){
            $("#deletekebket").text(data.usulansbu.ket);
          }else{
            $("#deletekebket").text(data.uraian_lain);
          }
          <?php if($periode->sesi == 'rka'){?>
            var harga = data.harga_rka;
            var jml = parseInt(data.jml_rka);
            var total = data.total_rka;
          <?php }else if($periode->sesi == 'kuappas'){?>
            var harga = data.harga_kuappas;
            var jml = parseInt(data.jml_kuappas);
            var total = data.total_kuappas;
          <?php }else if($periode->sesi == 'apbd'){?>
            var harga = data.harga_apbd;
            var jml = parseInt(data.jml_apbd);
            var total = data.total_apbd;
          <?php }else if($periode->sesi == 'final'){?>
            var harga = data.harga_final;
            var jml = parseInt(data.jml_final);
            var total = data.total_final;
          <?php }?>
          $("#deletekebharga").text(harga);
          $("#deletekebjumlah").text(jml);
          $("#deletekebtotal").text(total);
        }
      });
    });


  })
</script>

@endsection