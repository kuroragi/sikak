@extends('layouts.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Program SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

  <form action="/skpdprog" class="mb-3">
    <div class="row justify-content-center">
      <div class="col col-8">
        <div class="input-group">
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

  @if (request('periode'))
  <button class="btn btn-block btn-primary" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i> Print Semua Laporan</button>  
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Kegiatan</th>
          <th scope="col">Nomenklatur Urusan Kabupaten/Kota</th>
          <th scope="col">Kinerja</th>
          <th scope="col">Indikator</th>
          <th scope="col">Satuan</th>
          <th scope="col">Pagu</th>
          @can('admin')
            <th scope="col">Total Anggaran</th>
          @endcan
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          @foreach ($s->biduruses as $bidurus)
            @foreach ($bidurus->progbid as $progbid)
                @php
                  $j=0;
                @endphp

                @foreach ($progbid->kegprog as $kegprog)
                  @foreach ($sksu as $sks)
                    @if($kegprog->kode == substr($sks->kode_subkeg, 0, 11))
                      @php $j += 1; @endphp
                    @endif
                  @endforeach
                @endforeach

                @if($j > 0)
                  <tr class="fw-bold">
                    <th></th>
                    <th>{{ $progbid->kode }}</th>
                    <th colspan="5">{{ $progbid->ket }}</th>
                    @can('admin')
                      <th colspan="2"></th>
                    @endcan
                    <th></th>
                  </tr>
                  @foreach ($progbid->kegprog as $kegprog)
                    @php
                      $kj=0;
                    @endphp

                    @foreach ($sksu as $sks)
                      @if($kegprog->kode == substr($sks->kode_subkeg, 0, 11))
                        @php $kj += 1; @endphp
                      @endif
                    @endforeach
                    
                    @if($kj > 0)
                      <tr class="fw-bold">
                        <th></th>
                        <th>{{ $kegprog->kode }}</th>
                        <th colspan="5">{{ $kegprog->ket }}</th>
                        @can('admin')
                          <th colspan="2"></th>
                        @endcan
                        <th></th>
                      </tr>
                      @foreach ($kegprog->subkeg as $subkeg)

                      @foreach ($sksu as $sks)
                        @if($subkeg->kode == $sks->kode_subkeg)
                        
                          <tr @php
                            $berubah = 0;
                            foreach ($subkeg->kak as $k) {
                              $berubah += $k->kebutuhanakt->sum('berubah');
                            }
                          @endphp @if($berubah == 1) class="bg-yellow" @endif>
                            <td></td>
                            <td class="fs-8">{{ $subkeg->kode }}</td>
                            <td class="fs-8">{{ $subkeg->ket }}</td>
                            <td class="fs-8">{{ $subkeg->kinerja }}</td>
                            <td class="fs-8">{{ $subkeg->indikator }}</td>
                            <td class="fs-8">{{ $subkeg->satuan->satuan }}</td>
                            <td class="fs-8"> 
                              @php
                                $total = 0;
                                  foreach ($subkeg->kak as $k) {
                                    if($_periode->sesi == 'rka'){
                                      $total += $k->kebutuhanakt->sum('total_rka');
                                    }else if($_periode->sesi == 'kuappas'){
                                      $total += $k->kebutuhanakt->sum('total_kuappas');
                                    }else if($_periode->sesi == 'apbd'){
                                      $total += $k->kebutuhanakt->sum('total_apbd');
                                    }else if($_periode->sesi == 'final'){
                                      $total += $k->kebutuhanakt->sum('total_final');
                                    }
                                  }
                                echo str_replace(',', '.', number_format($total));
                              @endphp
                            </td>
                            @can('admin')
                              <td class="fs-8">{{ $subkeg->total_anggaran_subkeg }}</td>
                            @endcan
                            <td>
                              <a title="Detail Subkegiatan" href="/skpdprogkak?kode_skpd={{ auth()->user()->kode_skpd }}&kode={{ $subkeg->kode }}&periode={{ request('periode') }}"><button class="badge bg-primary border-0" id="showsubkeg"><i class="fa fa-eye"></i></button></a>
                              @can('admin')
                                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                              @endcan
                              {{-- <form action="/treatmentunits/" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                              </form> --}}
                            </td>
                          </tr>
                          
                        @endif
                      @endforeach
                      @endforeach
                    @endif
                  @endforeach
                @endif
            @endforeach
          @endforeach
        @endforeach
      </tbody>
    </table>
  @endif

  </div>

  <div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/cetaklaporan?tipe={{ request('tipe') }}&getlaporan=skpd&kode_skpd={{ request('kode_skpd') }}&periode={{ request('periode') }}" class="mb-5">
            @csrf
            <div class="row">
                <div class="col col-xl-12">
                  <div class="mb-3">
                    <label for="jenisdata" class="form-label">Jenis Data</label>
                    <select name="jenisdata" class="form-select" id="jenisdata">
                      <option value="kak">KAK</option>
                      <option value="rekap">Rekap</option>
                      <option value="rka">Pra RKA</option>
                    </select>
                  </div>
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