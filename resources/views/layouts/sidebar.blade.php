<nnav class="nnavbar">
    <ul class="nnavbar-nnav flex-column">
        <li class="nnav-item">
            <a href="/dashboard" class="nnav-link">
                <i class="fa fa-home fa-primary"></i>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        @if (auth()->user()->role_slug != 'admin')
            <li class="nnav-item">
                <form action="/user-edit" method="post">
                    @csrf
                    <input type="hidden" name="username" value="{{ auth()->user()->username }}">
                    <button class="bg-transparent btn btn-block nnav-link"><i class="fa fa-edit fa-primary"></i><span class="link-text">Edit Profil</span></button>

                </form>
            </li>
        @endif
        
        @can('admin')
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#data-collapse" aria-expanded="true">
                <i class="fa fa-box-archive fa-primary"></i>
                <span class="link-text">Master Data</span>
            </a>
            <div class="collapse" id="data-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item2 dropdown-item py-0"><a href="/menu" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Data Menus</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/user" class="nnav-link small"><i class="fa fa-user"></i><span class="link-text">Data User</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/role" class="nnav-link small"><i class="fa fa-cubes"></i><span class="link-text">Role User</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/rpjmd" class="nnav-link small"><i class="fa fa-clock"></i><span class="link-text">Periode RPJMD</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/periode" class="nnav-link small"><i class="fa fa-clock"></i><span class="link-text">Periode</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/satuan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Satuan</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/kebe" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Kelompok Belanja</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/kecamatan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Kecamatan</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/kelurahan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Kelurahan</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/lokasi" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Lokasi</span></a></li>
                    <li class="nnav-item2 dropdown-item py-0"><a href="/checkup" class="nnav-link small"><i class="fa fa-magnifying-glass"></i><span class="link-text">Check Data</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#plan-collapse" aria-expanded="true">
                <i class="fa fa-box-archive fa-primary"></i>
                <span class="link-text">Master Perencanaan</span>
            </a>
            <div class="collapse" id="plan-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/urusan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Urusan Pemerintah</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/bidurus" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Bidang Urusan</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/progbid" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Program Bidang</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/kegprog" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Kegiatan Program</span></a></li>
                    <li class="nnav-item dropdown-item py-0 text-wrap"><a href="/subkeg" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Sub Kegiatan Program</span></a></li>
                    <li class="nnav-item dropdown-item py-0 text-wrap"><a href="/indikator" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Indikator</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#act-collapse" aria-expanded="true">
                <i class="fa fa-file-lines fa-primary"></i>
                <span class="link-text">Master Kegiatan</span>
            </a>
            <div class="collapse" id="act-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/personil" class="nnav-link small"><i class="fa fa-user"></i><span class="link-text">Personil</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/instrumen" class="nnav-link small"><i class="fa fa-box"></i><span class="link-text">Instrumen</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/datakeg" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Data Kegiatan</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#hrg-collapse" aria-expanded="true">
                <i class="fa fa-comment-dollar fa-primary"></i>
                <span class="link-text">Master Harga Standar</span>
            </a>
            <div class="collapse" id="hrg-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/ssh" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Standar Satuan Harga</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/sbu" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Standar Biaya Harga</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#skpd-collapse" aria-expanded="true">
                <i class="fa fa-box-archive fa-primary"></i>
                <span class="link-text">SKPD</span>
            </a>
            <div class="collapse" id="skpd-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/skpd" class="nnav-link small"><i class="fa fa-landmark"></i><span class="link-text">SKPD</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/pemekaran" class="nnav-link small"><i class="fa fa-landmark"></i><span class="link-text">Pemekaran</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/subunit" class="nnav-link small"><i class="fa fa-chart-pie"></i><span class="link-text">Sub Unit</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/bidangskpd" class="nnav-link small"><i class="fa fa-sitemap"></i><span class="link-text">Bidang SKPD</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/skpdprog" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Program SKPD</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                <i class="fa fa-file-lines fa-primary"></i>
                <span class="link-text">Laporan</span>
            </a>
            <div class="collapse" id="laporan-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/laporan_skpd?tipe=kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/laporan_kel" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pendekatan Belanja</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/allusulan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Usulan</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/laporan_lokasi" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Per Lokasi</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/laporan_skpd" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan SKPD</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/pilih_lap_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                </ul>
            </div>
        </li>
        @endcan

        @can('kaskpd')
        <li class="nnav-item"><a href="/user" class="nnav-link"><i class="fa fa-user fa-primary"></i><span class="link-text">Anggota SKPD</span></a></li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#skpd-collapse" aria-expanded="true">
                <i class="fa fa-box-archive fa-primary"></i>
                <span class="link-text">Pengaturan SKPD</span>
            </a>
            <div class="collapse" id="skpd-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/subunit" class="nnav-link small"><i class="fa fa-chart-pie"></i><span class="link-text">Sub Unit</span></a></li>
                    <li class="nnav-item dropdown-item py-0"><a href="/skpdprog" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Program SKPD</span></a></li>
                </ul>
            </div>
        </li>
        <li class="nnav-item">
            <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                <i class="fa fa-file-lines fa-primary"></i>
                <span class="link-text">Laporan</span>
            </a>
            <div class="collapse" id="laporan-collapse">
                <ul class="nnavbar-nav flex-column">
                    <li class="nnav-item dropdown-item py-0"><a href="/laporan_skpd?tipe=kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan</span></a></li>
                </ul>
            </div>
        </li>
        @endcan

        @can('askpd')
            <li class="nnav-item py-0"><a href="/skpdprog" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Program SKPD</span></a></li>
        @endcan

        <li class="nnav-item">
            <a class="nnav-link" aria-current="page" href="/logout">
            <i class="fa fa-arrow-right-from-bracket fa-primary"></i> 
            <span class="link-text">Log out</span>
            </a>
        </li>
        
    </ul>
</nnav>



{{-- <nnav class="nnavbar">
        <ul class="nnavbar-nnav flex-column">
            <li class="nnav-item">
                <a href="/dashboard" class="nnav-link">
                    <i class="fa fa-home fa-primary"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>
            @can('admin')

            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#data-collapse" aria-expanded="true">
                    <i class="fa fa-box-archive fa-primary"></i>
                    <span class="link-text">Master Data</span>
                </a>
                <div class="collapse" id="data-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item2 dropdown-item py-0"><a href="/menu" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Data Menus</span></a></li>
                        <li class="nnav-item2 dropdown-item py-0"><a href="/user" class="nnav-link small"><i class="fa fa-user"></i><span class="link-text">Data User</span></a></li>
                        <li class="nnav-item2 dropdown-item py-0"><a href="/roleuser" class="nnav-link small"><i class="fa fa-cubes"></i><span class="link-text">Role USer</span></a></li>
                        <li class="nnav-item2 dropdown-item py-0"><a href="/sub_unit" class="nnav-link small"><i class="fa fa-chart-pie"></i><span class="link-text">Sub Unit</span></a></li>
                        <li class="nnav-item2 dropdown-item py-0"><a href="/checkup" class="nnav-link small"><i class="fa fa-magnifying-glass"></i><span class="link-text">Check Data</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#plan-collapse" aria-expanded="true">
                    <i class="fa fa-box-archive fa-primary"></i>
                    <span class="link-text">Master Perencanaan</span>
                </a>
                <div class="collapse" id="plan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/urusan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Urusan Pemerintah</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/bidurus" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Bidang Urusan</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/progbid" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Program Bidang</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/kegprog" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Kegiatan Program</span></a></li>
                        <li class="nnav-item dropdown-item py-0 text-wrap"><a href="/subkeg" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Sub Kegiatan Program</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#act-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Master Kegiatan</span>
                </a>
                <div class="collapse" id="act-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/personil" class="nnav-link small"><i class="fa fa-user"></i><span class="link-text">Personil</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/instrumen" class="nnav-link small"><i class="fa fa-box"></i><span class="link-text">Instrumen</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/datakeg" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Data Kegiatan</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#hrg-collapse" aria-expanded="true">
                    <i class="fa fa-comment-dollar fa-primary"></i>
                    <span class="link-text">Master Harga Standar</span>
                </a>
                <div class="collapse" id="hrg-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/itemstd" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Standar Harga Barang</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#skpd-collapse" aria-expanded="true">
                    <i class="fa fa-box-archive fa-primary"></i>
                    <span class="link-text">SKPD</span>
                </a>
                <div class="collapse" id="skpd-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/skpd" class="nnav-link small"><i class="fa fa-landmark"></i><span class="link-text">SKPD</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/skpdprog" class="nnav-link small"><i class="fa fa-file-lines"></i><span class="link-text">Program SKPD</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_kel" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pendekatan Belanja</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/allusulan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Usulan</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_skpd" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan SKPD</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/pilih_lap_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('kaskpd')
            <li class="nnav-item"><a href="/user" class="nnav-link"><i class="fa fa-user fa-primary"></i><span class="link-text">Anggota SKPD</span></a></li>
            <li class="nnav-item"><a href="/sub_unit" class="nnav-link"><i class="fa fa-chart-pie fa-primary"></i><span class="link-text">Sub Unit</span></a></li>
            <li class="nnav-item"><a href="/skpdprog" class="nnav-link"><i class="fa fa-file-lines fa-primary"></i><span class="link-text">Program SKPD</span></a></li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_skpd" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan SKPD</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan
            
            @can('askpd')
            <li class="nnav-item"><a href="/skpdprog" class="nnav-link"><i class="fa fa-file-lines fa-primary"></i><span class="link-text">Program SKPD</span></a></li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan
            
            @can('sekretaris')
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan?jl=laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="laporan_kel" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pendekatan Belanja</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/allusulan" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Usulan</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan?jl=laporan_skpd" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan SKPD</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/pilih_lap_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('pengampu')
            <li class="nnav-item"><a class="nnav-link" aria-current="page" href="/skpdprog"><i class="fa fa-file fa-primary"></i><span class="link-text">Program SKPD</span></a></li>
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/plaporan_skpd" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan SKPD</span></a></li>
                        <li class="nnav-item dropdown-item py-0"><a href="/laporan_rka" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan Pra RKA</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('inspektorat')
            <li class="nnav-item">
                <a class="nnav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-collapse" aria-expanded="true">
                    <i class="fa fa-file-lines fa-primary"></i>
                    <span class="link-text">Laporan</span>
                </a>
                <div class="collapse" id="laporan-collapse">
                    <ul class="nnavbar-nav flex-column">
                        <li class="nnav-item dropdown-item py-0"><a href="/pilih_laporan_kak" class="nnav-link small"><i class="fa fa-file"></i><span class="link-text">Laporan KAK</span></a></li>
                    </ul>
                </div>
            </li>
            @endcan

            <li class="nnav-item">
                <a class="nnav-link" aria-current="page" href="/logout">
                <i class="fa fa-arrow-right-from-bracket fa-primary"></i> 
                <span class="link-text">Log out</span>
                </a>
            </li>
            
        </ul>
    </nnav> --}}