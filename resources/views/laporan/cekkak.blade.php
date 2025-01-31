@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-center">Kerangka Acuan Kerja Aktivitas Subkegiatan</h1>
    <div class="row "></div>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<table class="table table-borderless fs-8 m-0 p-0 align-middle mb-3">
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Urusan Pemerintah</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->kode }} {{ $kak->subkeg->kegprog->progbid->bidurus->urusan->ket }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">bidang Urusan</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->kegprog->progbid->bidurus->kode }}{{ $kak->subkeg->kegprog->progbid->bidurus->ket }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Organisasi</td>
        <td class="p-0 m-0">: {{ $skpd->kode }} {{ $skpd->name }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Program</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->kegprog->progbid->kode }} {{ $kak->subkeg->kegprog->progbid->ket }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Capaian Program</td>
        <td class="p-0 m-0">:</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Indikator</td>
        <td class="p-0 m-0">: {{ $kak->icapaianprog }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Target</td>
        <td class="p-0 m-0">: {{ $kak->volcapprog }} {{ $kak->satcapprog }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Kegiatan</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->kegprog->kode }} {{ $kak->subkeg->kegprog->ket }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Hasil Kegiatan</td>
        <td class="p-0 m-0">:</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Indikator</td>
        <td class="p-0 m-0">: {{ $kak->ihaskeg }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Target</td>
        <td class="p-0 m-0">: {{ $kak->volhaskeg }} {{ $kak->sathaskeg }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Keluaran Kegiatan</td>
        <td class="p-0 m-0">:</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Indikator</td>
        <td class="p-0 m-0">: {{ $kak->ikeluarankeg }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Target</td>
        <td class="p-0 m-0">: {{ $kak->volkelkeg }} {{ $kak->subkeg->satuan->satuan }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Subkegiatan</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->kode }} {{ $kak->subkeg->ket }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Output Subkegiatan</td>
        <td class="p-0 m-0">:</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Indikator</td>
        <td class="p-0 m-0">: {{ $kak->subkeg->indikator }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Target</td>
        <td class="p-0 m-0">: {{ $kak->tarsubkeg }} {{ $subkeg->satuan->satuan }}</td>
    </tr>
    <tr class="tbold p-0 m-1">
        <td class="w-1 p-0 m-0" colspan="2">Aktivitas</td>
        <td class="p-0 m-0">: {{ $kak->name }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Keluaran Aktivitas</td>
        <td class="p-0 m-0">:</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Indikator</td>
        <td class="p-0 m-0">: {{ $kak->outakti }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Target</td>
        <td class="p-0 m-0">: {{ $kak->voloutakti }} {{ $kak->satoutakti }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Pendekatan Belanja</td>
        <td class="p-0 m-0">: {{ $kak->kelompokbelanja->ket }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Jumlah Anggaran</td>
        <td class="p-0 m-0">: Rp. 
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
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Waktu Pelaksanaan</td>
        <td class="p-0 m-0">: {{ $kak->dari }} - {{ $kak->sampai }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Lokasi</td>
        <td class="p-0 m-0">: {{ $kak->lokasi }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Deskripsi Aktivtas</td>
        <td class="p-0 m-0">: {{ $kak->deskrip }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Bagian/Bidang/Sekretariat/UPTD</td>
        <td class="p-0 m-0">: {{ $kak->bidang_sekretariat }}</td>
    </tr>
    <tr class="p-0 m-1">
        <td class="w-1 p-0 m-0"></td>
        <td class="w-10 p-0 m-0">Subbag/Seksi/Sub-koordinator</td>
        <td class="p-0 m-0">: {{ $kak->subbagdkk }}</td>
    </tr>
</table>

 
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
  <a href="/laporan_kak?tipe=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>
  <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    
  <div class="table-responsive col-lg-12">
      
      <table class="table table-striped table-sm" id="tbl">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Rincian Gaji</th>
            <th scope="col" colspan="2">Anggaran</th>
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
          @endforeach
        </tbody>
      </table>
  </div>

@elseif($kak->kelompokbelanja_id == 3)

  <div class="table-responsive col-lg-12">
    <a href="/laporan_kak?tipe=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>
    <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    
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
        </tr>
        @foreach ($kak->kebutuhanakt as $keb)
          <tr>
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
          </tr>
        @endforeach
      </tbody>
    </table>

  @else

  <div class="table-responsive col-lg-12">
    <a href="/laporan_kak?tipe=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->subkeg->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning mb-3" id="backbutton"><i class="fa fa-angles-left"></i> Kembali</button></a>
    <button class="btn btn-block btn-primary mb-3" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print</button>
    
    <table class="table bg-white table-sm" id="tblkak">
      <thead>
        <tr class="text-center fs-7 text-wrap">
          <th scope="col" rowspan="3" class="align-middle">No</th>
          <th scope="col" colspan="5">Kebutuhan Sumber Daya</th>
          <th scope="col" colspan="5">Kebutuhan Belanja</th>
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
        </tr>
        {{-- tahap --}}
        @foreach ($kak->tahap as $thp)
          <tr class="fs-8 bg-orange">
              <th class="text-center">{{ chr(64+$loop->iteration) }}</th>
              <th colspan="8">{{ $thp->ket }}</th>
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
          </tr>
          {{-- aktivitas --}}
          @foreach ($thp->aktivitas as $akt)
            <tr class="fs-8 bg-info">
                <th class="text-center">{{ $loop->iteration }}</th>
                <th colspan="8">{{ $akt->ket }}</th>
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
            </tr>
  
            {{-- data aktivitas --}}
            <tr class="fs-8 border-dark">
              <td></td>
              {{-- personalakt --}}
              <td colspan="2">
                <table class="table table-borderless m-0 p-0">
                  @foreach ($akt->personalakt as $p)
                    <tr>
                      <td class="w-70 m-0 p-0 text-wrap">
                        @if ($p->personil_slug != null)
                        {{ $p->personil->name }} 
                        @else
                          {{ ucwords($p->otherpersonil) }}
                        @endif
                      </td>
                      <td class="w-30 m-0 p-0 text-center">
                        {{ $p->jumlah }}
                      </td>
                    </tr>
                  @endforeach
                </table>
              </td>
              {{-- end personalakt --}}
  
              {{-- instruakt --}}
              <td colspan="2">
                <table class="table table-borderless p-0 m-0">
                  @foreach ($akt->instruakt as $i)
                  <tr>
                    <td class="w-70 m-0 p-0 text-wrap">
                      @if ($i->instruakt_slug != null)
                      {{ $i->instrumen->name??'' }}
                      @else
                      {{ ucwords($i->otherinstru) }}
                      @endif
                    </td>
                    <td class="w-30 m-0 p-0 text-center">
                      {{ $i->jumlah }}
                    </td>
                  </tr>
                  @endforeach
                </table>
              </td>
              {{-- instruakt --}}
  
              {{-- dataakt --}}
              <td class="text-wrap">
                @foreach ($akt->dataakt as $d)
                  @if ($d->datakeg_slug != null)
                    {{ $d->datakeg->name }}
                  @else
                    {{ ucwords($d->otherdata) }}
                  @endif
                @endforeach
              </td>
              {{-- dataakt --}}

              {{-- kebutuhanakt --}}
              <td colspan="5">
                <table class="table table-borderless p-0 m-0">
                  @foreach ($akt->kebutuhanakt as $keb)
                    <tr>
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
                      <td class="w-5 p-0 m-0 text-center align-middle">
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
                      <td class="w-15 p-0 m-0 text-center align-middle">
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
                      <td class="w-15 p-0 m-0 text-end align-middle">
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
                      <td class="w-15 p-0 m-0 text-end align-middle">
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
                  @endforeach
                </table>
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


  <div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/cetaklaporan?tipe={{ request('tipe') }}&getlaporan=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ $kak->kode }}&periode={{ request('periode') }}" class="mb-5">
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

@endsection