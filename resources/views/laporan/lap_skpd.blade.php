@extends('layouts.main')

@section('container')

<div class="col col-xl-12">
  <a href="/cetakskpd"><button class="btn btn-success">Print</button></a>
</div>

@foreach ($skpd as $s)
        
    <h2 class="text-center">DAFTAR KAK SKPD</h2>

    <h5>{{ strtoupper($s->name) }}</h5>
    <table class="table table-striped table-sm" id="tbl">
        <tr>
            <td class="tbold">Total Pagu {{ $s->name }}</td>
            <td class="tbold text-end">{{ number_format($s->total_anggaran_skpd) }}</td>
        </tr>
    </table>
        <table class="table table-striped table-sm" id="tbl">
            <thead>
              <tr class="text-center fs-7 text-wrap">
                <th scope="col" class="align-center w-1">No</th>
                <th scope="col" class="text-wrap text-center w-20">Program Bidang/Kegiatan/Sub Kegiatan</th>
                <th scope="col" class="w-19">Indikator</th>
                <th scope="col" colspan="7" class="w-60">
                  <table class="w-100">
                    <thead>
                      <tr class="bb-0">
                        <th scope="col" class="w-5">Target</th>
                        <th scope="col" class="w-5">Satuan</th>
                        <th class="w-20 text-center">Sub Unit</th>
                        <th class="w-20 text-center">KAK</th>
                        <th class="w-20 text-center">Indikator</th>
                        <th class="w-10 text-center">Target</th>
                        <th class="w-20 text-center">Pagu</th>
                      </tr>
                    </thead>
                  </table>
                </th>
              </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($s->progbid as $pb)
                    <tr class="fs-7">
                      <td></td>
                      <td class="tbold" colspan="8">{{ $pb->ket }}</td>
                      <td class="tbold text-end" colspan="1">{{ number_format($pb->total_anggaran_progbid) }}</td>
                    </tr>
                    @foreach ($pb->kegprog as $kp)
                        <tr class="fs-7">
                          <td></td>
                          <td class="tbold" colspan="8">{{ $kp->ket }}</td>
                          <td class="tbold text-end" colspan="1">{{ number_format($kp->total_anggaran_kegprog) }}</td>
                        </tr>
                        @foreach ($kp->subkeg as $sb)
                        <tr class="fs-7">
                          <td></td>
                          <td class="text-wrap">{{ $sb->ket }}</td>
                          <td class="text-wrap" colspan="7">{{ $sb->indikator }}</td>
                          <td class="text-wrap text-end">{{ number_format($sb->total_anggaran_subkeg) }}</td>
                        </tr>
                        <tr class="fs-9">
                            <td colspan="3"></td>
                            <td colspan="7">
                                <table class="w-100">
                                <tbody>
                                    @foreach ($sb->kakgaji as $kakg)
                                    <tr class="bb-0">
                                        <td class="text-wrap text-center w-5">{{ $kakg->tarsubkeg ?? '' }}</td>
                                        <td class="text-wrap text-center w-5">{{ $sb->satuan->name }}</td>
                                        <td class="text-wrap w-20">{{ $kakg->sub_unit ?? '' }}</td>
                                        <td class="w-20">KAK Gaji</td>
                                        <td class="text-wrap w-20"></td>
                                        <td class="text-wrap w-10"></td>
                                        <td class="w-20 text-end">{{ number_format($kakg->total_anggaran) }}</td>
                                    </tr>
                                    @endforeach
                                    @foreach ($sb->kakrutin as $kakr)
                                    <tr class="bb-0">
                                        <td class="text-wrap text-center w-5">{{ $kakr->tarsubkeg ?? '' }}</td>
                                        <td class="text-wrap text-center w-5">{{ $sb->satuan->name }}</td>
                                    <td class="w-20"{{ $kakr->sub_unit ?? '' }}</td>
                                    <td class=" w-20">KAK Rutin</td>
                                    <td class="text-wrap w-20"></td>
                                    <td class="text-wrap w-10"></td>
                                    <td class="w-20 text-end">{{ number_format($kakr->total_anggaran) }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($sb->kak as $kak)
                                    <tr class="bb-0">
                                        <td class="text-wrap text-center w-5">{{ $kak->tarsubkeg }}</td>
                                        <td class="text-wrap text-center w-5">{{ $sb->satuan->name }}</td>
                                        <td class="text-wrap w-20">{{ $kak->subunit->name ?? '' }}</td>
                                        <td class="text-wrap w-20">{{ $kak->name }}</td>
                                        <td class="text-wrap w-20">{{ $kak->outakti }}</td>
                                        <td class="text-wrap w-10 text-center">{{ $kak->voloutakti }} {{ $kak->satoutakti }}</td>
                                        <td class="w-20 text-end">{{ number_format($kak->total_anggaran) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </td>
                        </tr>
                      @endforeach
                    @endforeach
                @endforeach
                <tr>
                  <td class="tbold" colspan="9">Total Pagu</td>
                  <td class="tbold" colspan="9">{{ $s->total_anggaran_skpd }}</td>
                </tr>
            </tbody>
        </table>
        
        <div class="page-break"></div>
    @endforeach


@endsection