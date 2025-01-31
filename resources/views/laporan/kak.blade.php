@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">KAK {{ $subkeg->ket }}{{ $periode->periode }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
  @if (auth()->user()->role_slug == 'askpd')
    <a href="/skpdprog?periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
  @else
    <a href="/laporan_subkeg?tipe={{ request('tipe') }}&kode_skpd={{ request('kode_skpd') }}&kode={{ $subkeg->kegprog->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
  @endif
  <button class="btn btn-block btn-primary" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i>  Print Semua Laporan {{ strtoupper(request('tipe')) }} {{ $subkeg->ket }}</button>

  <table class="table table-striped table-sm-9 mt-3" id="tbl">
      <thead class="bg-info">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Kerangka Acuan Kerja</th>
          <th scope="col">Kelompok Belanja</th>
          <th scope="col">Pencetus</th>
          <th scope="col" colspan="2">NIlai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($kak as $k)
          <tr class="text-align-center fs-7">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $k->ket }}</td>
              <td>{{ $k->kelompokbelanja->ket }}</td>
              <td>{{ $k->pencetus->pencetus ?? '' }}</td>
              <td class="p-0 m-0">Rp.</td>
              <td class="text-end">
                @if ($periode->sesi == 'rka')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_rka'))) }}
                @elseif ($periode->sesi == 'kuappas')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_kuappas'))) }}
                @elseif ($periode->sesi == 'apbd')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_apbd'))) }}
                @elseif ($periode->sesi == 'final')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_final'))) }}
                @endif
              </td>
              <td class="text-center">
                <a href="/ceklaporan?tipe={{ request('tipe') }}&getlaporan=kak&kode_skpd={{ request('kode_skpd') }}&kode={{ $k->kode }}&periode={{ request('periode') }}"><button class="badge bg-primary border-0" title="print kak"><i class="fa fa-print"></i></button></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

<div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/cetaksubkeg?tipe={{ request('tipe') }}&getlaporan=subkeg&kode_skpd={{ request('kode_skpd') }}&kode={{ $subkeg->kode }}&periode={{ request('periode') }}" class="mb-5">
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