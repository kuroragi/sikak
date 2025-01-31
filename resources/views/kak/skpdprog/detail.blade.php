@extends('layouts.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Program SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Kegiatan</th>
          <th scope="col">Nomenklatur Urusan Kabupaten/Kota</th>
          <th scope="col">Kinerja</th>
          <th scope="col">Indikator</th>
          <th scope="col">Satuan</th>
          @can('admin')
            <th scope="col">Total Anggaran</th>
            <th scope="col">Pagu</th>
          @endcan
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($progbid as $pb)
            <tr class="fw-bold">
                <th></th>
                <th>{{ $pb->bidurus->urusan->kode }}.{{ sprintf('%02d', $pb->bidurus->urusan->kode) }}.{{ sprintf('%02d', $pb->kode) }}</th>
                <th colspan="4">{{ $pb->ket }}</th>
                @can('admin')
                <th colspan="2"></th>
                @endcan
                <th></th>
            </tr>
            @foreach ($pb->kegprog as $kp)
                <tr class="fw-bold">
                    <th></th>
                    <th>{{ $pb->bidurus->urusan->kode }}.{{ sprintf('%02d', $pb->bidurus->urusan->kode) }}.{{ sprintf('%02d', $pb->kode) }}.{{ sprintf('%02d', $kp->kode) }}</th>
                    <th colspan="4">{{ $pb->ket }}</th>
                    @can('admin')
                    <th colspan="2"></th>
                    @endcan
                    <th></th>
                </tr>
                @foreach ($kp->subkeg as $sk)
                    <tr>
                        <td></td>
                        <td class="fs-8">{{ $pb->bidurus->urusan->kode }}.{{ sprintf('%02d', $pb->bidurus->urusan->kode) }}.{{ sprintf('%02d', $pb->kode) }}.{{ sprintf('%02d', $kp->kode) }}.{{ sprintf('%02d', $sk->kode) }}</td>
                        <td class="fs-8">{{ $sk->ket }}</td>
                        <td class="fs-8">{{ $sk->kinerja }}</td>
                        <td class="fs-8">{{ $sk->indikator }}</td>
                        <td class="fs-8">{{ $sk->satuan_slug }}</td>
                        @can('admin')
                        <td class="fs-8">{{ $sk->total_anggaran_subkeg }}</td>
                        <td class="fs-8">{{ $sk->pagu }}</td>
                        @endcan
                        <td>
                        <a title="Detail Subkegiatan" href="/subkeg/{{ $sk->id }}"><button class="badge bg-primary border-0" id="showsubkeg"><i class="fa fa-eye"></i></button></a>
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
                @endforeach
            @endforeach
        @endforeach
      </tbody>
    </table>
  </div>



@endsection
