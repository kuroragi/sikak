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

<div class="row tbold">
  <div class="col col-md-2_5">Nama Aktivitas</div>
  <div class="col col-md-9_5">: {{ $kak->name }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Keluaran Aktivitas</div>
  <div class="col col-md-9_5">: </div>
</div>
<div class="row">
  <div class="col col-md-2_5">Indikator</div>
  <div class="col col-md-9_5">: {{ $kak->outakti }}</div>
</div>
<div class="row mb-">
  <div class="col col-md-2_5">Target</div>
  <div class="col col-md-9_5">: {{ $kak->voloutakti }} {{ $kak->satoutakti }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Pendekatan Perencanaan</div>
  <div class="col col-md-9_5">: {{ $kak->kelompokbelanja->name }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Jumlah Anggaran</div>
  <div class="col col-md-9_5">: Rp {{ number_format($kak->total_anggaran) }},-</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Waktu Pelaksanaan</div>
  <div class="col col-md-9_5">: {{ $kak->dari }} - {{ $kak->sampai }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Lokasi</div>
  <div class="col col-md-9_5">: {{ $kak->lokasi }}</div>
</div>
<div class="row mb-3">
  <div class="col col-md-2_5">Deskripsi Aktivitas</div>
  <div class="col col-md-9_5">: {{ $kak->deskrip }}</div>
</div>
<div class="row">
  <div class="col col-md-2_5">Bagian/Bidang/Sekretariat/UPTD</div>
  <div class="col col-md-9_5">: {{ $kak->bidang_sekretariat }}</div>
</div>
<div class="row mb-3">
  <div class="col col-md-2_5">Subbag/Seksi/Sub-koordinator</div>
  <div class="col col-md-9_5">: {{ $kak->subbagdkk }}</div>
</div>

<div class="table-responsive col-lg-12">
    <a href="/subkeg/{{ $kak->subkeg->id }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>

    <!--button class="btn btn-block btn-primary mb-3" id="addthpbutton" data-bs-toggle="modal" data-bs-target="#addthpmodal"><a href="{{ $kak->kode_kak }}"></a><i class="fa fa-plus"></i> Tambah Tahap</button-->

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="3" class="align-middle">No</th>
          <th scope="col" rowspan="3" class="text-wrap align-middle">Rincian Aktivitas</th>
          <th scope="col" colspan="5">Kebutuhan Sumber Daya</th>
          <th scope="col" colspan="5">Kebutuhan Belanja</th>
          <th scope="col" rowspan="3" class="align-middle">Action</th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" colspan="2">Personil</th>
          <th scope="col" colspan="2">Alat</th>
          <th scope="col" rowspan="2" class="text-wrap align-middle">Data/ Dokumen</th>
          <th scope="col" rowspan="2" class="text-wrap align-middle">Uraian Kebutuhan</th>
          <th scope="col" rowspan="2" class="align-middle">Vol</th>
          <th scope="col" rowspan="2" class="align-middle">Satuan</th>
          <th scope="col" rowspan="2" class="text-wrap align-middle">Harga Satuan</th>
          <th scope="col" rowspan="2" class="align-middle">Jumlah</th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col">Rincian</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Rincian</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tr class="fs-8">
          <th colspan="11">Total Anggaran</th>
          <th colspan="11">{{ number_format($kak->total_anggaran) }}</th>
        </tr>
        @foreach ($kak->tahap as $thp)
          <tr class="fs-7">
              <th>{{ $loop->iteration }}</th>
              <th colspan="11">{{ $thp->name }}</th>
              <th>
              </th>
          </tr>
          @foreach ($thp->aktivitas as $akt)
            <tr class="fs-8">
                <td></td>
                <td>{{ $akt->name }}</td>
                <td>
                  @foreach ($akt->personalakt as $p)
                    @if ($p->personil_slug != null)
                        {{ $p->personil->name }} 
                    @else
                      {{ ucwords($p->otherpersonil) }}
                    @endif
                    <br>
                  @endforeach
                </td>
                <td class="text-center">
                  @foreach ($akt->personalakt as $p)
                  {{ $p->jumlah }}
                  <br>
                  @endforeach
                </td>
                <td class="text-wrap">
                  @foreach ($akt->instruakt as $i)
                    @if ($i->instruakt_slug != null)
                        {{ $i->instrumen->name }}
                    @else
                      {{ ucwords($i->otherinstru) }}
                    @endif
                    <br>
                  @endforeach
                </td>
                <td class="text-wrap">
                  @foreach ($akt->instruakt as $i)
                    {{ $i->jumlah }}
                    <br>
                  @endforeach
                </td>
                <td class="text-wrap">
                  @foreach ($akt->dataakt as $d)
                    @if ($d->datakeg_slug != null)
                      {{ $d->datakeg->name }}
                    @else
                      {{ ucwords($d->otherdata) }}
                    @endif
                    <br>
                  @endforeach
                </td>
                <td>
                  @foreach ($akt->kebutuhanakt as $keb)
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
                    <br>
                  @endforeach
                </td>
                <td class="text-right">
                  @foreach ($akt->kebutuhanakt as $keb)
                    {{ $keb->jumlah }}
                    <br>
                  @endforeach
                </td>
                <td class="text-center">
                  @foreach ($akt->kebutuhanakt as $keb)
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
                      {{ $keb->satuan }}
                    @endif
                    <br>
                  @endforeach
                </td>
                <td class="text-right">
                  @foreach ($akt->kebutuhanakt as $keb)
                    @if ($keb->tipe_keb != 'other')
                      {{ $keb->harga }}
                    @endif
                    <br>
                  @endforeach
                </td>
                <td class="text-right">
                  @foreach ($akt->kebutuhanakt as $keb)
                    {{ $keb->total }}
                    <br>
                  @endforeach
                </td>
                <td>
                </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>

    
</div>



@endsection