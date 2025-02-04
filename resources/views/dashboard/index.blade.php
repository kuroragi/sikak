@extends('layouts.main')

@section('container')


    <h4 class="mt-3">{{ ucwords(auth()->user()->skpd->name ?? auth()->user()->role_slug) }}</h4>

    @can('admin')
        <div class="row">
            {{-- Berita User --}}
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-white bg-info rounded-top">User</div>
                    <div class="card-body bg-primary">
                        <div class="d-flex justify-content-end text-white">
                            <h1> {{ $user->count() }} <i class="fa fa-user"></i></h1>
                        </div>
                        <table class="table table-borderless text-light m-0 p-0">
                            <tr>
                                <td>PPTK</td>
                                <td>: 0</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer bg-info rounded-bottom text-end text-white">
                        Lihat Detail <i class="fa fa-play"></i>
                    </div>
                </div>
            </div>

            {{-- Berita KAK --}}
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-white bg-green rounded-top">KAK</div>
                    <div class="card-body bg-success">
                        <div class="d-flex justify-content-end text-white">
                            <h1> {{ $kak->count() }} <i class="fa fa-file"></i></h1>
                        </div>
                    </div>
                    <div class="card-footer bg-green rounded-bottom text-end text-white">
                        Lihat Detail <i class="fa fa-play"></i>
                    </div>
                </div>
            </div>

        </div>
    @endcan


    @can('askpd')
        <div class="row">
            {{-- Berita KAK --}}
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-white bg-green rounded-top">KAK</div>
                    <div class="card-body bg-success">
                        <div class="d-flex justify-content-end text-white">
                            <h1> {{ $kak->count() }} <i class="fa fa-file"></i></h1>
                        </div>
                    </div>
                    <div class="card-footer bg-green rounded-bottom text-end text-white">
                        Lihat Detail <i class="fa fa-play"></i>
                    </div>
                </div>
            </div>

        </div>
    @endcan



    <div class="row pt-3">
        <div class="graphbox">
            <div class="box"><canvas id="newChart"></canvas></div>
            <div class="box"></div>
        </div>
    </div>

    <form action="/dashboard" class="my-3">
        <div class="row justify-content-center">
            <div class="col col-8">
                <div class="input-group">
                    <select name="periode" id="getperiode" class="form-select">
                        <option value="">Pilih Periode</option>
                        @foreach ($periode as $p)
                            <option value="{{ $p->periode }}" @if (request('periode') == $p->periode) selected @endif>
                                {{ $p->periode }}</option>
                        @endforeach
                    </select>
                    <select name="sesi" id="getsesi" class="form-select">
                        <option value="rka">RKA</option>
                        <option value="kuappas">KUAPPAS</option>
                        <option value="apbd">APBD</option>
                    </select>
                    <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </form>

    @if (request('periode') && request('sesi'))
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center fs-8">
                                <th>#</th>
                                <th class="text-wrap">SKPD</th>
                                @foreach ($kebe as $kb)
                                    <th class="text-wrap w-9" colspan="2">{{ $kb->ket }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skpd as $s)
                                <tr class="text-align-center fs-8">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->name }}</td>
                                    @foreach ($kebe as $kb)
                                        <td class="p-0 m-0">Rp.</td>
                                        <td class="text-end">
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($s->biduruses as $bi)
                                                @foreach ($bi->progbid as $p)
                                                    @foreach ($p->kegprog as $kp)
                                                        @foreach ($kp->subkeg as $sk)
                                                            @foreach ($sk->kak as $k)
                                                                @if ($kb->id == $k->kelompokbelanja_id)
                                                                    @php
                                                                        foreach ($k->kebutuhanakt as $keb) {
                                                                            if ($_periode->sesi == 'rka') {
                                                                                $total += $keb->total_rka;
                                                                            } elseif ($_periode->sesi == 'kuappas') {
                                                                                $total += $keb->total_kuappas;
                                                                            } elseif ($_periode->sesi == 'apbd') {
                                                                                $total += $keb->total_apbd;
                                                                            } elseif ($_periode->sesi == 'final') {
                                                                                $total += $keb->total_final;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            {{ str_replace(',', '.', number_format($total)) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif


    {{-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-warning" id="exampleModalLabel">Pengumuman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-center">Mohon maaf atas ketidaknyamanannya,<br>Aplikasi saat ini sedang dalam proses maintenance, sehingga proses penginputan KAK tidak dapat dilanjutkan.<br>Proses inputan dapat dilanjutkan siang nanti<br>Atas Pengertiannya kami ucapkan terimakasih.</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function(){
        $("#modal").modal('show');
    });
</script> --}}

    <script>
        const ctx = document.getElementById('newChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($graph as $g) {
                    echo "'" . $g->tahun . "',";
                } ?>],
                datasets: [{
                    label: '# Dana Yang Direncanakan Rp',
                    data: [<?php foreach ($graph as $g) {
                        echo "'" . $g->total . "',";
                    } ?>],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>

@endsection

@push('js')
    <script src="/js/chart.js"></script>
    <script src="/js/dashboard.js"></script>
@endpush
