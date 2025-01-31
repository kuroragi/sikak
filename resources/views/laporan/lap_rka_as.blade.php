@extends('layouts.main')

@section('container')

<div class="col col-xl-12">
  <a href="/cetakrka"><button class="btn btn-success">Print</button></a>
</div>

  @foreach($skpd as $s)
  @foreach ($s->progbid as $pb)
  @foreach ($pb->kegprog as $kp)
  @foreach ($kp->subkeg as $sb)
    @if(count($sb->rekapsubkegaskpd) > 0)
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center">RINCIAN BELANJA SUB KEGIATAN SATUAN KERJA PERANGKAT  DAERAH</h1>
        <div class="row "></div>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row tbold">
      <div class="col col-md-2_5">URUSAN</div>
      <div class="col col-md-9_5">: {{ $pb->bidurus->urusan->kode }} {{ $pb->bidurus->urusan->ket }}</div>
    </div>
    <div class="row tbold">
      <div class="col col-md-2_5">UNIT ORGANISASI</div>
      <div class="col col-md-9_5">: {{ $pb->bidurus->urusan->kode }} {{ $s->kode }} {{ $s->name }}</div>
    </div>
    <div class="row tbold mb-3">
      <div class="col col-md-2_5">PROGRAM</div>
      <div class="col col-md-9_5">: {{ $pb->ket }}</div>
    </div>

    <div class="row tbold mb-3">
      <div class="col col-md-2_5">KEGIATAN</div>
      <div class="col col-md-9_5">: {{ $kp->ket }}</div>
    </div>

    <div class="row tbold mb-3">
      <div class="col col-md-2_5">SUBKEGIATAN</div>
      <div class="col col-md-9_5">: {{ $sb->ket }}</div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 20%;">Indikator</th>
          <th colspan="2">
            <table style="width: 100%;">
              <tr>
                <th style="width: 80%;" class="text-center">Tolak Ukur Kinerja</th>
                <th style="width: 20%;" class="text-center">Target</th>
              </tr>
            </table>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="fs-7 py-0">
          <td>Capaian Program</td>
          <td colspan="2">
            <table style="width: 100%;">
              @foreach ($sb->kak as $kak)
                <tr>
                  <td style="width: 80%;">{{ $kak->icapaianprog }}</td>
                  <td style="width: 20%;" class="text-center">{{ $kak->volcapprog }} {{ $kak->satcapprog }}</td>
                </tr>
              @endforeach
            </table>
          </td>
        </tr>
        <tr class="fs-7 py-0">
          <td>Masukan</td>
          <td colspan="2">
            <table style="width: 100%;">
              <tr>
                <td style="width: 80%;">Dana Yang Dibutuhkan</td>
                <td style="width: 20%;" class="text-end">{{ number_format($sb->rekapsubkegaskpd->sum('total')) }}</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr class="fs-7 py-0">
          <td>Keluaran</td>
          <td colspan="2">
            <table style="width: 100%;">
              @foreach ($sb->kak as $kak)
                <tr>
                  <td style="width: 80%;">{{ $kak->ikeluarankeg }}</td>
                  <td style="width: 20%;" class="text-center">{{ $kak->volkelkeg }} {{ $kak->satkelkeg }}</td>
                </tr>
              @endforeach
            </table>
          </td>
        </tr>
        <tr class="fs-7 py-0">
          <td>Hasil</td>
          <td colspan="2">
            <table style="width: 100%;">
              @foreach ($sb->kak as $kak)
                <tr>
                  <td style="width: 80%;">{{ $kak->ihaskeg }}</td>
                  <td style="width: 20%;" class="text-center">{{ $kak->volhaskeg }} {{ $kak->sathaskeg }}</td>
                </tr>
              @endforeach
            </table>
          </td>
        </tr>
      </tbody>
    </table>

    <table class="table table-striped table-sm" id="tbl">
        <thead>
          <tr class="text-center fs-7 text-wrap">
            <th scope="col" rowspan="2" class="text-wrap align-middle">Kode Rekening</th>
            <th scope="col" rowspan="2" class="text-wrap align-middle">Uraian</th>
            <th scope="col" colspan="5">Rincian Perhitungan</th>
          </tr>
          <tr class="text-center fs-7 text-wrap">
            <th scope="col" class="align-middle">Koefisien</th>
            <th scope="col" class="align-middle">Satuan</th>
            <th scope="col" class="align-middle">Harga</th>
            <th scope="col" class="align-middle">Ppn</th>
            <th scope="col" class="align-middle">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tbold">5.</td>
            <td class="tbold" colspan="5">Belanja Daerah</td>
            <td style="width: 20%;" class="tbold text-end">{{ number_format($sb->rekapsubkegaskpd->sum('total')) }}</td>
          </tr>
          <tr>
            <td class="tbold">5.1.</td>
            <td class="tbold" colspan="5">Belanja Operasi</td>
            <td style="width: 20%;" class="tbold text-end">{{ number_format($sb->rekapsubkegaskpd->sum('total')) }}</td>
          </tr>
          <tr>
            <td class="tbold">5.1.02</td>
            <td class="tbold" colspan="5">Belanja Barang dan Jasa</td>
            <td style="width: 20%;" class="tbold text-end">{{ number_format($sb->rekapsubkegaskpd->sum('total')) }}</td>
          </tr>
          </tr>
          <tr>
            <td class="tbold">5.1.02.01</td>
            <td class="tbold" colspan="6">Belanja Barang</td>
          </tr>
          @foreach ($sb->rekapsubkegaskpd as $rs)
            @if ($rs->tipe_keb == 'ssh')
              <tr>
                <td>{{ $rs->item->bajeketibajeno->jeketibajeno->ketibajeno->tibajeno->bajeno->jeno->object->ket ?? $rs->item->bajeketibajeno_slug ?? '' }}</td>
                <td>{{ $rs->item->name ?? '' }}</td>
                <td class="text-center">{{ $rs->jumlah }}</td>
                <td>{{ $rs->item->satuan->name ?? '' }}</td>
                <td class="text-end">{{ number_format($rs->harga) }}</td>
                <td></td>
                <td class="text-end">{{ number_format($rs->total) }}</td>
              </tr>
              <tr></tr>
            @endif
          @endforeach
          <tr>
            <td class="tbold">5.1.02.02</td>
            <td class="tbold" colspan="6">Belanja Jasa</td>
          </tr>
          @foreach ($sb->rekapsubkegaskpd as $rs)
            @if ($rs->tipe_keb == 'sbu')
              <tr>
                <td>{{ $rs->sbu->sbuhead->sbuhead->sbuhead->ket ?? $rs->sbu->sbuhead->sbuhead->ket ?? $rs->sbu->sbuhead->ket ?? '' }}</td>
                <td>{{ $rs->sbu->ket }} // {{ $rs->sbu->sbuhead->ket ?? '' }} // {{ $rs->sbu->sbuhead->sbuhead->ket ?? '' }}</td>
                <td class="text-center">{{ $rs->jumlah }}</td>
                <td>{{ $rs->sbu->satuan->name ?? '' }}</td>
                <td class="text-end">{{ number_format($rs->harga) }}</td>
                <td></td>
                <td class="text-end">{{ number_format($rs->total) }}</td>
              </tr>
              <tr></tr>
              <tr></tr>
            @endif
          @endforeach
          <tr>
            <td colspan="7"></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6" class="tbold">Usulan SSH dan SBU</td>
          </tr>
          @foreach ($sb->rekapsubkegaskpd as $rs)
            @if ($rs->tipe_keb == 'usulan ssh' || $rs->tipe_keb == 'usulan sbu')
              <tr>
                <td></td>
                <td>
                  @if ($rs->tipe_keb == 'usulan ssh')
                    {{ $rs->usulanssh->name }}
                  @elseif ($rs->tipe_keb == 'usulan sbu')
                    {{ $rs->usulansbu->ket }}
                  @endif
                </td>
                <td class="text-center">{{ $rs->jumlah }}</td>
                <td>
                  @if ($rs->tipe_keb == 'usulan ssh')
                    {{ $rs->usulanssh->satuan->name ?? $rs->usulanssh->satuan_slug }} 
                  @elseif ($rs->tipe_keb == 'usulan sbu')
                    {{ $rs->usulansbu->satuan->name ?? $rs->usulansbu->satuan_slug }}
                  @endif
                </td>
                <td class="text-end">{{ number_format($rs->harga) }}</td>
                <td></td>
                <td class="text-end">{{ number_format($rs->total) }}</td>
              </tr>
              <tr></tr>
            @endif
          @endforeach
          <tr>
            <td colspan="7"></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6" class="tbold">Hibah</td>
          </tr>
          @foreach ($sb->rekapsubkegaskpd as $rs)
            @if ($rs->tipe_keb == 'other')
              <tr>
                <td></td>
                <td>{{ $rs->uraian }}</td>
                <td class="text-center">{{ $rs->jumlah }}</td>
                <td>{{ $rs->satuan->name ?? $rs->satuan_slug }}</td>
                <td class="text-end">{{ number_format($rs->harga) }}</td>
                <td></td>
                <td class="text-end">{{ number_format($rs->total) }}</td>
              </tr>
              <tr></tr>
            @endif
          @endforeach
          <tr>
            <td colspan="7"></td>
          </tr>
          <tr>
            <td></td>
            <td colspan="6" class="tbold">Gaji</td>
          </tr>
          @foreach ($sb->rekapsubkegaskpd as $rs)
            @if ($rs->tipe_keb == 'gaji')
              <tr>
                <td></td>
                <td>{{ $rs->ket }}</td>
                <td></td>
                <td></td>
                <td class="text-end"></td>
                <td></td>
                <td class="text-end">{{ number_format($rs->total) }}</td>
              </tr>
            @endif
          @endforeach
          <tr>
            <td colspan="7"></td>
          </tr>
        </tbody>
    </table>
    @endif
  @endforeach
  @endforeach
  @endforeach
  @endforeach

@endsection