@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->role_slug }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="card border-info">
                <div class="card-header text-white bg-info rounded-top">Pengunjung bulan ini</div>
                <div class="card-body bg-primary">
                    <div class="d-flex justify-content-end text-white">
                        <h1> {{ $patient->count() }} <i class="fa fa-user"></i></h1>
                    </div>
                </div>
                <div class="card-footer bg-info rounded-bottom"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border-teal">
                <div class="card-header text-white bg-teal rounded-top">Pengunjung hari ini</div>
                <div class="card-body bg-success">
                    <div class="d-flex justify-content-end text-white">
                        <h1 class="card-title"> {{ $patient->count() }} <i class="fa fa-user"></i></h1>
                    </div>
                </div>
                <a href="#" class="text-decoration-none text-white">
                    <div class="card-footer text-white bg-teal rounded-bottom text-center p-1">
                        Check
                    </div>
                </a>    
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card border-warning">
                <div class="card-header text-dark bg-warning rounded-top">Jumlah Dokter</div>
                <div class="card-body bg-orange">
                    <div class="d-flex justify-content-end text-white">
                        <h1 class="card-title"> {{ $patient->count() }} <i class="fa fa-user-doctor"></i></h1>
                    </div>
                </div>
                <a href="#" class="text-decoration-none text-white">
                    <div class="card-footer text-white bg-warning rounded-bottom text-center p-1">
                        Check
                    </div>
                </a>    
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <h3>Grafik Pengunjung</h3>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </div>

    <script>

    </script>
@endsection