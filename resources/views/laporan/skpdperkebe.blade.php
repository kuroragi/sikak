@extends('layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SKPD</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        <form action="{{ route('laporan.skpd_per_kebe') }}" class="mb-3">
            <div class="row justify-content-center">
                <div class="col col-8">
                    <div class="input-group">
                        <input type="hidden" name="tipe" value="{{ request('tipe') }}">
                        <select name="periode" id="getperiode" class="form-select">
                            <option value="">Pilih Periode</option>
                            @foreach ($periode as $p)
                                <option value="{{ $p->periode }}" @if (request('periode') == $p->periode) selected @endif>
                                    {{ $p->periode }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </div>
        </form>


        @if (request('periode'))
            <a href="" class="my-3"><button class="btn btn-primary"><i class="fa fa-print"></i> Print Rekap Semua
                    Kelompok Belanja
                    {{ strtoupper(request('tipe')) }}</button></a>
            <table class="table table-striped table-sm-9" id="tbl">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelompok Belanja</th>
                        <th scope="col" colspan="2">Nilai Pagu (Rp.)</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($kebes as $kebe)
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($kebe->kak as $kak)
                            @foreach ($kak->kebutuhanakt as $kebutuhanakt)
                                @php
                                    $total += $kebutuhanakt->total_final;
                                @endphp
                            @endforeach
                        @endforeach
                        <tr class="text-align-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kebe->ket }}</td>
                            <td class="p-0 m-0">Rp.</td>
                            <td class="text-end">
                                {{ str_replace(',', '.', number_format($total)) }}</td>
                            <td>
                                <a
                                    href="{{ route('cetak.skpd_per_kebe', ['id' => $kebe->id, 'periode' => $_periode->periode]) }}"><button
                                        class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Cetak
                                        Laporan Kelompok Belanja</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
