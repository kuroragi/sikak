@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Perlokasi</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <form action="/laporan_lokasi" class="mb-3">
      <div class="row justify-content-center">
        <div class="col col-8">
          <div class="input-group">
            <input type="hidden" name="tipe" value="{{ request('tipe') }}">
            <select name="periode" id="getperiode" class="form-select">
              <option value="">Pilih Periode</option>
              @foreach ($periode as $p)
                  <option value="{{ $p->periode }}" @if(request('periode') == $p->periode) selected @endif>{{ $p->periode }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
          </div>
        </div>
      </div>
    </form>

    
    @if(request('periode'))
    <form action="/cetaklokasi" class="mb-3" method="post">
      @csrf
      <input type="hidden" name="tipe" value="semua">
      <input type="hidden" name="periode" value="{{ request('periode') }}">
      <button class="btn btn-primary"><i class="fa fa-print"></i> Print Semua Pagu Lokasi</button>
    </form>
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Pagu</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tbody id="tbody">
        @php
            $no = 1;
        @endphp
        <tr>
          <td class="text-center">{{ $no }}</td>
          <td>Bukittinggi</td>
          <td class="text-end">@php
              $totalbkt = 0;
              foreach ($lokasilv1 as $kak) {
                if($_periode->sesi == 'rka'){
                  $totalbkt += $kak->kebutuhanakt->sum('total_rka');
                }else if($_periode->sesi == 'kuappas'){
                  $totalbkt += $kak->kebutuhanakt->sum('total_kuappas');
                }else if($_periode->sesi == 'apbd'){
                  $totalbkt += $kak->kebutuhanakt->sum('total_apbd');
                }else if($_periode->sesi == 'final'){
                  $totalbkt += $kak->kebutuhanakt->sum('total_final');
                }
              }
              echo str_replace(',', '.', number_format($totalbkt));
          @endphp</td>
          <td class="text-center"><a href="/laporan_lokasiskpd?lokasi=1&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
        </tr>
        @foreach ($lokasilv2 as $lokasi2)
            <tr>
              <td class="text-center">{{ $no+=1 }}</td>
              <td>{{ $lokasi2->ket }}</td>
              <td class="text-end">
                @php
                    $totallv2 = 0;
                    foreach ($lokasi2->kak as $kak) {
                      if($_periode->sesi == 'rka'){
                        $totallv2 += $kak->kebutuhanakt->sum('total_rka');
                      }else if($_periode->sesi == 'kuappas'){
                        $totallv2 += $kak->kebutuhanakt->sum('total_kuappas');
                      }else if($_periode->sesi == 'apbd'){
                        $totallv2 += $kak->kebutuhanakt->sum('total_apbd');
                      }else if($_periode->sesi == 'final'){
                        $totallv2 += $kak->kebutuhanakt->sum('total_final');
                      }
                    }
                    foreach ($lokasi2->clokasi as $clokasi) {
                      foreach ($clokasi->kak as $kak) {
                        if($_periode->sesi == 'rka'){
                          $totallv2 += $kak->kebutuhanakt->sum('total_rka');
                        }else if($_periode->sesi == 'kuappas'){
                          $totallv2 += $kak->kebutuhanakt->sum('total_kuappas');
                        }else if($_periode->sesi == 'apbd'){
                          $totallv2 += $kak->kebutuhanakt->sum('total_apbd');
                        }else if($_periode->sesi == 'final'){
                          $totallv2 += $kak->kebutuhanakt->sum('total_final');
                        }
                      }
                    }
                    echo str_replace(',', '.', number_format($totallv2));
                @endphp
              </td>
              <td class="text-center"><a href="/laporan_lokasiskpd?lokasi={{ $lokasi2->id }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
            </tr>
        @endforeach
        @foreach ($lokasilv3 as $lokasi3)
            <tr>
              <td class="text-center">{{ $no+=1 }}</td>
              <td>{{ $lokasi3->ket }}</td>
              <td class="text-end">
                @php
                    $totallv3 = 0;
                    foreach ($lokasi3->kak as $kak) {
                      if($_periode->sesi == 'rka'){
                        $totallv3 += $kak->kebutuhanakt->sum('total_rka');
                      }else if($_periode->sesi == 'kuappas'){
                        $totallv3 += $kak->kebutuhanakt->sum('total_kuappas');
                      }else if($_periode->sesi == 'apbd'){
                        $totallv3 += $kak->kebutuhanakt->sum('total_apbd');
                      }else if($_periode->sesi == 'final'){
                        $totallv3 += $kak->kebutuhanakt->sum('total_final');
                      }
                    }
                    echo str_replace(',', '.', number_format($totallv3));
                @endphp
              </td>
              <td class="text-center"><a href="/laporan_lokasiskpd?lokasi={{ $lokasi3->id }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
</div>

@endsection