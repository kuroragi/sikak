@extends('layouts.main')

@section('container')

<div class="col col-xl-12">
  @if (auth()->user()->role_slug == 'inspektorat')
    <a href="/cetakkak?kode_skpd={{ request('kode_skpd') }}"><button class="btn btn-success">Print</button></a>
  @else
    <a href="/cetakkak"><button class="btn btn-success">Print</button></a>
  @endif
</div>

@foreach($kaks as $kak)
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

<table class="table table-striped table-sm" id="tbl">
    <thead>
      <tr class="text-center fs-7 text-wrap">
        <th scope="col" rowspan="3" class="align-middle">No</th>
        <th scope="col" rowspan="3" class="text-wrap align-middle">Rincian Aktivitas</th>
        <th scope="col" colspan="5">Kebutuhan Sumber Daya</th>
        <th scope="col" colspan="5">Kebutuhan Belanja</th>
      </tr>
      <tr class="text-center fs-7 text-wrap">
        <th scope="col" colspan="2">Personil</th>
        <th scope="col" colspan="2">Alat</th>
        <th scope="col" rowspan="2" class="align-middle">Data</th>
        <th scope="col" colspan="5" rowspan="2" class="text-wrap align-middle">
          <table class="table table-borderless">
            <tr>
              <th style="width: 45%;" class="text-wrap align-middle">Uraian Kebutuhan</th>
              <th style="width: 5%;" class="align-middle">Vol</th>
              <th style="width: 10%;" class="align-middle">Satuan</th>
              <th style="width: 20%;" class="text-wrap align-middle">Harga Satuan</th>
              <th style="width: 20%;" class="align-middle">Jumlah</th>
            </tr>
          </table>
        </th>
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
        </tr>
        @foreach ($thp->aktivitas as $akt)
          <tr class="fs-9">
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
              <td colspan="5">
                <table class="w-100">
                  <tbody>
                    @foreach ($akt->kebutuhanakt as $keb)
                    <tr>
                      <td class="w-45">
                        @if ($keb->tipe_keb == 'ssh')
                          @if($keb->item)
                            {{ $keb->item->name }}
                          @else
                            {{ $keb->usulanssh->name }}
                          @endif
                        @elseif ($keb->tipe_keb == 'usulan ssh')
                          {{ $keb->usulanssh->name }}
                        @elseif ($keb->tipe_keb == 'sbu')
                          @if($keb->sbu)
                            {{ $keb->sbu->ket }}
                          @else
                            {{ $keb->usulansbu->ket }}
                          @endif
                        @elseif ($keb->tipe_keb == 'usulan sbu')
                          {{ $keb->usulansbu->ket }}
                        @elseif ($keb->tipe_keb == 'other')
                          {{ $keb->otheruraian }}
                        @endif
                      </td>
                      <td class="w-5 text-center">{{ $keb->jumlah }}</td>
                      <td class="w-10 text-center">
                        @if ($keb->tipe_keb == 'ssh')
                          @if($keb->item)
                            {{ $keb->item->satuan->name ?? $keb->item->satuan_slug }} 
                          @else
                            {{ $keb->usulanssh->satuan->name ?? $keb->usulanssh->satuan_slug }}
                          @endif
                        @elseif ($keb->tipe_keb == 'usulan ssh')
                          {{ $keb->usulanssh->satuan->name ?? $keb->usulanssh->satuan_slug }}
                        @elseif ($keb->tipe_keb == 'sbu')
                          @if($keb->sbu)
                            {{ $keb->sbu->satuan->name ?? $keb->sbu->satuan_slug }}
                          @else
                            {{ $keb->usulansbu->satuan->name ?? $keb->usulansbu->satuan_slug }}
                          @endif
                        @elseif ($keb->tipe_keb == 'usulan sbu')
                          {{ $keb->usulansbu->satuan->name ?? $keb->usulansbu->satuan_slug }}
                        @elseif ($keb->tipe_keb == 'other')
                          {{ $keb->satuan }}
                        @endif
                      </td>
                      <td class="w-20 text-end">
                        @if ($keb->tipe_keb != 'other')
                          {{ $keb->harga }}
                        @endif
                      </td>
                      <td class="w-20 text-end">{{ $keb->total }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
          </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
@endforeach

@foreach($kakgajis as $kak)
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

<hr>

<div class="table-responsive col-lg-12">

  
  <table class="table table-striped table-sm" id="tbl">
    <thead>
        <tr class="">
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Rincian Gaji</th>
            <th scope="col" class="text-center">Jumlah</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <tr class="fs-7 tbold">
          <th></th>
          <th class="text-start">Total</th>
          <th class="text-end">{{ number_format($kak->total_anggaran) }}</th>
        </tr>
        @foreach ($kak->kebutuhanaktgaji as $k)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->ket }}</td>
              <td class="text-end">{{ number_format($k->jumlah) }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

</div>
@endforeach

@foreach($kakrutins as $kak)
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

<hr>

<div class="table-responsive col-lg-12">

  
  <table class="table table-striped table-sm" id="tbl">
    <thead>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="2" class="align-middle">No</th>
          <th scope="col" colspan="5">Kebutuhan Belanja</th>
        </tr>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" class="text-wrap align-middle">Uraian Kebutuhan</th>
          <th scope="col" class="align-middle">Vol</th>
          <th scope="col" class="align-middle">Satuan</th>
          <th scope="col" class="text-wrap text-right">Harga Satuan</th>
          <th scope="col" class="align-middle">Jumlah</th>
        </tr>
    </thead>
    <tbody id="tbody">
      <tr class="fs-7">
        <th></th>
        <th colspan="4" class="text-start">Total Anggaran</th>
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
                {{ $keb->item->name }}
              @else
                {{ $keb->usulanssh->name }}
              @endif
            @elseif ($keb->tipe_keb == 'usulan ssh')
              {{ $keb->usulanssh->name }}
            @elseif ($keb->tipe_keb == 'sbu')
              @if($keb->sbu)
                {{ $keb->sbu->ket }}
              @else
                {{ $keb->usulansbu->ket }}
              @endif
            @elseif ($keb->tipe_keb == 'usulan sbu')
              {{ $keb->usulansbu->ket }}
            @elseif ($keb->tipe_keb == 'other')
              {{ $keb->otheruraian }}
            @endif
          </td>
          <td class="text-center">
            {{ $keb->jumlah }}
          </td>
          <td class="text-center">
            @if ($keb->tipe_keb == 'ssh')
              @if($keb->item)
                {{ $keb->item->satuan->name ?? $keb->item->satuan_slug }} 
              @else
                {{ $keb->usulanssh->satuan->name ?? $keb->usulanssh->satuan_slug }}
              @endif
            @elseif ($keb->tipe_keb == 'usulan ssh')
              {{ $keb->usulanssh->satuan->name ?? $keb->usulanssh->satuan_slug }}
            @elseif ($keb->tipe_keb == 'sbu')
              @if($keb->sbu)
                {{ $keb->sbu->satuan->name ?? $keb->sbu->satuan_slug }}
              @else
                {{ $keb->usulansbu->satuan->name ?? $keb->usulansbu->satuan_slug }}
              @endif
            @elseif ($keb->tipe_keb == 'usulan sbu')
              {{ $keb->usulansbu->satuan->name ?? $keb->usulansbu->satuan_slug }}
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
        </tr>
        @endforeach
    </tbody>
  </table>

</div>
@endforeach


@endsection