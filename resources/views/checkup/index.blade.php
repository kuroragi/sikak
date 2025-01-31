@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Check Up Data</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

      <div class="table-responsive col-lg-12">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>Aktivitas</td>
                <td>{{ $aktivitas->count() }}</td>
                <td class="text-end">{{ number_format($aktivitas->sum('total_anggaran')) }}</td>
                <th>Kebutuhan Aktivitas</td>
                <td>{{ $kebutuhanakt->count() }}</td>
                <td class="text-end">{{ number_format($kebutuhanakt->sum('total')) }}</td>
                <td class="text-center">
                  @if ($aktivitas->sum('total_anggaran') === $kebutuhanakt->sum('total'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearaktivitas"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up Aktivitas"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>Tahap</td>
                <td>{{ $tahap->count() }}</td>
                <td class="text-end">{{ number_format($tahap->sum('total_anggaran')) }}</td>
                <th>Aktivitas</td>
                <td>{{ $aktivitas->count() }}</td>
                <td class="text-end">{{ number_format($aktivitas->sum('total_anggaran')) }}</td>
                <td class="text-center">
                  @if ($tahap->sum('total_anggaran') === $aktivitas->sum('total_anggaran'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/cleartahap"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up Aktivitas"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>KAK</td>
                <td>{{ $kak->count() }}</td>
                <td class="text-end">{{ number_format($kak->sum('total_anggaran')) }}</td>
                <th>Tahap</td>
                <td>{{ $tahap->count() }}</td>
                <td class="text-end">{{ number_format($tahap->sum('total_anggaran')) }}</td>
                <td class="text-center">
                  @if ($kak->sum('total_anggaran') === $tahap->sum('total_anggaran'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearkak"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>KAK Gaji</td>
                <td>{{ $kakgaji->count() }}</td>
                <td class="text-end">{{ number_format($kakgaji->sum('total_anggaran')) }}</td>
                <th>Kebutuhan Gaji</td>
                <td>{{ $kebutuhanaktgaji->count() }}</td>
                <td class="text-end">{{ number_format($kebutuhanaktgaji->sum('jumlah')) }}</td>
                <td class="text-center">
                  @if ($kakgaji->sum('total_anggaran') === $kebutuhanaktgaji->sum('jumlah'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearkakgaji"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
                <tr>
                  <th>KAK Rutin</td>
                  <td>{{ $kakrutin->count() }}</td>
                  <td class="text-end">{{ number_format($kakrutin->sum('total_anggaran')) }}</td>
                  <th>Kebutuhan Gaji</td>
                  <td>{{ $kebutuhanaktrutin->count() }}</td>
                  <td class="text-end">{{ number_format($kebutuhanaktrutin->sum('total')) }}</td>
                  <td class="text-center">
                    @if ($kakrutin->sum('total_anggaran') === $kebutuhanaktrutin->sum('total'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearkakrutin"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <th colspan="2">Total</td>
                  <th class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</th>
                  <th colspan="2"></th>
                  <th class="text-end">{{ number_format($kebutuhanakt->sum('total') + $kebutuhanaktgaji->sum('total') + $kebutuhanaktrutin->sum('total')) }}</th>
                  <th colspan="2"></th>
                </tr>
              </tr>
          </tbody>
        </table>
        
        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>Sub Kegiatan</td>
                <td>{{ $subkeg->count() }}</td>
                <td class="text-end">{{ number_format($subkeg->sum('total_anggaran_subkeg')) }}</td>
                <th>KAK</td>
                <td>{{ $kak->count() + $kakgaji->count() + $kakrutin->count() }}</td>
                <td class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</td>
                <td class="text-center">
                  @if ($subkeg->sum('total_anggaran_subkeg') === ($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearsubkeg"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>Sub Kegiatan / Sub Unit</td>
                <td>{{ $subkegunit->count() }}</td>
                <td class="text-end">{{ number_format($subkegunit->sum('total_anggaran_subkeg')) }}</td>
                <th>KAK</td>
                  <td>{{ $kak->count() + $kakgaji->count() + $kakrutin->count() }}</td>
                  <td class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</td>
                <td class="text-center">
                  @if ($subkegunit->sum('total_anggaran_subkeg') === ($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearsubkegunit"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
                <tr>
                  <th colspan="2">Total</td>
                  <th class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</th>
                  <th colspan="2"></th>
                  <th class="text-end">{{ number_format($kebutuhanakt->sum('total') + $kebutuhanaktgaji->sum('total') + $kebutuhanaktrutin->sum('total')) }}</th>
                  <th colspan="2"></th>
                </tr>
              </tr>
          </tbody>
        </table>
        
        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>Kegiatan</td>
                <td>{{ $kegprog->count() }}</td>
                <td class="text-end">{{ number_format($kegprog->sum('total_anggaran_kegprog')) }}</td>
                <th>Sub Kegiatan</td>
                <td>{{ $subkeg->count() }}</td>
                <td class="text-end">{{ number_format($subkeg->sum('total_anggaran_subkeg')) }}</td>
                <td class="text-center">
                  @if ($kegprog->sum('total_anggaran_kegprog') === ($subkeg->sum('total_anggaran_subkeg')))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearkegprog"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up Kegprog"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>Kegiatan / Sub Unit</td>
                <td>{{ $kegprogunit->count() }}</td>
                <td class="text-end">{{ number_format($kegprogunit->sum('total_anggaran_kegprog')) }}</td>
                <th>Sub Kegiatan / Sub Unit</td>
                  <td>{{ $subkegunit->count() }}</td>
                  <td class="text-end">{{ number_format($subkegunit->sum('total_anggaran_subkeg')) }}</td>
                <td class="text-center">
                  @if ($kegprogunit->sum('total_anggaran_kegprog') === ($subkeg->sum('total_anggaran_subkeg') ))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearkegprogunit"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
                <tr>
                  <th colspan="2">Total</td>
                  <th class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</th>
                  <th colspan="2"></th>
                  <th class="text-end">{{ number_format($kebutuhanakt->sum('total') + $kebutuhanaktgaji->sum('total') + $kebutuhanaktrutin->sum('total')) }}</th>
                  <th colspan="2"></th>
                </tr>
              </tr>
          </tbody>
        </table>
        
        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>Program bidang</td>
                <td>{{ $progbid->count() }}</td>
                <td class="text-end">{{ number_format($progbid->sum('total_anggaran_progbid')) }}</td>
                <th>Program</td>
                <td>{{ $kegprog->count() }}</td>
                <td class="text-end">{{ number_format($kegprog->sum('total_anggaran_kegprog')) }}</td>
                <td class="text-center">
                  @if ($progbid->sum('total_anggaran_progbid') === ($kegprog->sum('total_anggaran_kegprog')))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearprogbid"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up Kegprog"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>Program Bidang / Sub Unit</td>
                <td>{{ $progbidunit->count() }}</td>
                <td class="text-end">{{ number_format($progbidunit->sum('total_anggaran_progbid')) }}</td>
                <th>Kegiatan / Sub Unit</td>
                  <td>{{ $kegprogunit->count() }}</td>
                  <td class="text-end">{{ number_format($kegprogunit->sum('total_anggaran_kegprog')) }}</td>
                <td class="text-center">
                  @if ($progbidunit->sum('total_anggaran_progbid') === ($kegprog->sum('total_anggaran_kegprog') ))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearprogbidunit"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
          </tbody>
        </table>
        
        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>SKPD</td>
                <td>{{ $skpd->count() }}</td>
                <td class="text-end">{{ number_format($skpd->sum('total_anggaran_skpd')) }}</td>
                <th>Program Bidang</td>
                  <td>{{ $progbid->count() }}</td>
                  <td class="text-end">{{ number_format($progbid->sum('total_anggaran_progbid')) }}</td>
                <td class="text-center">
                  @if ($skpd->sum('total_anggaran_skpd') === ($progbid->sum('total_anggaran_progbid') ))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearskpd"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>SKPD / Sub Unit</td>
                <td>{{ $skpdunit->count() }}</td>
                <td class="text-end">{{ number_format($skpdunit->sum('total_anggaran_skpd')) }}</td>
                <th>Program / Sub Unit</td>
                  <td>{{ $progbidunit->count() }}</td>
                  <td class="text-end">{{ number_format($progbidunit->sum('total_anggaran_progbid')) }}</td>
                <td class="text-center">
                  @if ($skpdunit->sum('total_anggaran_skpd') === ($progbidunit->sum('total_anggaran_progbid') ))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearskpdunit"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
          </tbody>
        </table>

        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>RekapKAK</td>
                <td>{{ $rekapkak->count() }}</td>
                <td class="text-end">{{ number_format($rekapkak->sum('total')) }}</td>
                <th>Rekap Sub kegiatan</td>
                  <td>{{ $rekapsubkeg->count() }}</td>
                  <td class="text-end">{{ number_format($rekapsubkeg->sum('total')) }}</td>
                <td class="text-center">
                  @if ($rekapkak->sum('total') === ($rekapsubkeg->sum('total') ))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearskpdunit"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
          </tbody>
        </table>

        <table class="table table-striped table-sm mb-3">
          <thead>
            <tr class="text-center">
              <th scope="col">Nama</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Pembanding</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
              <th scope="col">Cocok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th>Rekap Aktivitas</td>
                <td>{{ $rekapaktivitas->count() + $rekapother->count() }}</td>
                <td class="text-end">{{ number_format($rekapaktivitas->sum('total') + $rekapother->sum('total')) }}</td>
                <th>Kebutuhan Aktivitas</td>
                <td>{{ $kebutuhanakt->count() }}</td>
                <td class="text-end">{{ number_format($kebutuhanakt->sum('total')) }}</td>
                <td class="text-center">
                  @if ($rekapaktivitas->sum('total') + $rekapother->sum('total') === $kebutuhanakt->sum('total'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearrekapaktivitas"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
              </tr>
              <tr>
                <th>Rekap Tahap</td>
                <td>{{ $rekaptahap->count() + $rekapother->count() }}</td>
                <td class="text-end">{{ number_format($rekaptahap->sum('total') + $rekapother->sum('total')) }}</td>
                <th>Rekap Aktivitas</td>
                <td>{{ $rekapaktivitas->count()  + $rekapother->count() }}</td>
                <td class="text-end">{{ number_format($rekapaktivitas->sum('total') + $rekapother->sum('total')) }}</td>
                <td class="text-center">
                  @if ($rekaptahap->sum('total') + $rekapother->sum('total') === $rekapaktivitas->sum('total') + $rekapother->sum('total'))
                    Cocok
                  @else
                    Tidak Cocok
                  @endif
                </td>
                <td>
                  <a href="/checkup/clearrekaptahap"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                </td>
                </tr>
                <tr>
                  <th>Rekap KAK</td>
                  <td>{{ $rekapkak->count() }}</td>
                  <td class="text-end">{{ number_format($rekapkak->sum('total')) }}</td>
                  <th>Rekap Tahap</td>
                  <td>{{ $rekaptahap->count()  + $rekapother->count() }}</td>
                  <td class="text-end">{{ number_format($rekaptahap->sum('total') + $rekapother->sum('total')) }}</td>
                  <td class="text-center">
                    @if ($rekaptahap->sum('total') + $rekapother->sum('total') === $rekapkak->sum('total'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearrekapkak"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <th>Rekap KAK Rutin</td>
                  <td>{{ $rekapkakrutin->count() }}</td>
                  <td class="text-end">{{ number_format($rekapkakrutin->sum('total')) }}</td>
                  <th>Kebutuhan Rutin</td>
                  <td>{{ $kebutuhanaktrutin->count() }}</td>
                  <td class="text-end">{{ number_format($kebutuhanaktrutin->sum('total')) }}</td>
                  <td class="text-center">
                    @if ($kebutuhanaktrutin->sum('total') === $rekapkakrutin->sum('total'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearrekapkakrutin"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <th>Rekap KAK Gaji</td>
                  <td>{{ $rekapkakgaji->count() }}</td>
                  <td class="text-end">{{ number_format($rekapkakgaji->sum('jumlah')) }}</td>
                  <th>Kebutuhan Gaji</td>
                  <td>{{ $kebutuhanaktgaji->count() }}</td>
                  <td class="text-end">{{ number_format($kebutuhanaktgaji->sum('jumlah')) }}</td>
                  <td class="text-center">
                    @if ($kebutuhanaktgaji->sum('jumlah') === $rekapkakgaji->sum('jumlah'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearrekapkakgaji"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <th>Rekap Subkegiatan</td>
                  <td>{{ $rekapsubkeg->count() }}</td>
                  <td class="text-end">{{ number_format($rekapsubkeg->sum('total')) }}</td>
                  <th>Rekap KAK</td>
                  <td>{{ $rekapkak->count() + $rekapkakrutin->count() + $rekapkakgaji->count() }}</td>
                  <td class="text-end">{{ number_format($rekapkak->sum('total') + $rekapkakrutin->sum('total') + $rekapkakgaji->sum('jumlah')) }}</td>
                  <td class="text-center">
                    @if ($rekapkak->sum('total') + $rekapkakrutin->sum('total') + $rekapkakgaji->sum('jumlah') === $rekapsubkeg->sum('total'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearrekapsubkeg"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr><tr>
                  <th>Rekap Subkegiatan ASKPD</td>
                  <td>{{ $rekapsubkegaskpd->count() }}</td>
                  <td class="text-end">{{ number_format($rekapsubkegaskpd->sum('total')) }}</td>
                  <th>Rekap KAK</td>
                  <td>{{ $rekapkak->count() + $rekapkakrutin->count() + $rekapkakgaji->count() }}</td>
                  <td class="text-end">{{ number_format($rekapkak->sum('total') + $rekapkakrutin->sum('total') + $rekapkakgaji->sum('jumlah')) }}</td>
                  <td class="text-center">
                    @if ($rekapkak->sum('total') + $rekapkakrutin->sum('total') + $rekapkakgaji->sum('jumlah') === $rekapsubkegaskpd->sum('total'))
                      Cocok
                    @else
                      Tidak Cocok
                    @endif
                  </td>
                  <td>
                    <a href="/checkup/clearrekapsubkegaskpd"><button class="badge bg-secondary border-0" data-bs-placement="top" title="check up KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                  </td>
                </tr>
                <tr>
                  <th colspan="2">Total</td>
                  <th class="text-end">{{ number_format($kak->sum('total_anggaran') + $kakgaji->sum('total_anggaran') + $kakrutin->sum('total_anggaran')) }}</th>
                  <th colspan="2"></th>
                  <th class="text-end">{{ number_format($kebutuhanakt->sum('total') + $kebutuhanaktgaji->sum('total') + $kebutuhanaktrutin->sum('total')) }}</th>
                  <th colspan="2"></th>
                </tr>
              </tr>
          </tbody>
        </table>



      </div>
@endsection