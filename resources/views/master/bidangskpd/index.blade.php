@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bidang Satuan kerja Perangkat Daerah</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive" id="allrow">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session()->has('warning'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @foreach ($skpd as $s)
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{ $s->id }}">
            <button class="accordion-button collapsed bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $s->id }}" aria-expanded="false" aria-controls="collapseTwo">
              {{ $s->kode }} - {{ $s->name }}
            </button>
          </h2>
          <div id="collapse{{ $s->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $s->id }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <button class="btn btn-block btn-primary btn-sm" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><a kode="{{ $s->kode }}"></a><i class="fa fa-plus"></i> Tambah Bidang Urusan Yang Diampu</button>
              <table class="table table-striped table-sm" id="tbl">
                <thead>
                  <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Bidang Urusan</th>
                    <th scope="col">Tahun Berjalan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  @foreach ($s->bidangskpd as $sb)
                    <tr class="align-middle">
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $sb->kode_bidurus }} - {{ $sb->bidurus->ket??'' }}</td>
                      <td class="text-center">{{ $sb->thn_awal??2022 }} - {{ $sb->thn_akhir??'Sekarang' }}</td>
                      <td class="text-center">@if ($sb->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
                      <td class="text-center">
                        <button class="btn btn-warning btn-sm" title="Edit SKPD" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $sb->id }}"></a><i class="fa fa-edit"></i></button>
                        <form action="/bidangskpd/{{ $sb->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm" title="Non Aktifkan Urusan" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Urusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/bidangskpd" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="addkode_skpd" value="{{ old('kode_skpd') }}" hidden>
                  <div class="mb-3">
                    <label for="kode_bidurus" class="form-label">Bidang Urusan</label>
                    <select name="kode_bidurus" class="form-select" id="addkode_bidurus">
                      @foreach ($bidurus as $b)
                          <option value="{{ $b->kode }}">[{{ $b->kode }}] {{ $b->ket }}</option>
                      @endforeach
                    </select>
                </div>
                  <div class="mb-3">
                    <label for="ket" class="form-label">Status</label>
                    <select name="status" class="form-select" id="addstatus">
                      <option value="1" class="bg-green">Aktif</option>
                      <option value="0" class="bg-danger">Non Aktif</option>
                    </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah Bidang Urusan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Edit SKPD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/subunit" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                    <label for="kode_bidurus" class="form-label">Bidang Urusan</label>
                    <select name="kode_bidurus" class="form-select" id="editkode_bidurus">
                      @foreach ($bidurus as $b)
                          <option value="{{ $b->kode }}">[{{ $b->kode }}] {{ $b->ket }}</option>
                      @endforeach
                    </select>
                </div>
                  <div class="mb-3">
                    <label for="ket" class="form-label">Status</label>
                    <select name="status" class="form-select" id="editstatus">
                      <option value="1" class="bg-green">Aktif</option>
                      <option value="0" class="bg-danger">Non Aktif</option>
                    </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Edit Sub Unit</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

    $("#allrow #addbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
      $("#addkode_skpd").val(kode);
    });
    
    $("#tbody #editbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
        $.ajax({
        url: '/getdataedit?tbl=bidang_skpds&whr=id&id='+kode,
        type: 'GET',
        success: function(data){
          $("#editform").attr("action", "/bidangskpd/"+kode);
          $("#editkode_bidurus").val(data.kode_bidurus).change();
          $("#editstatus").val(data.status).change();
        }
      });
    });

      $("#addname").change(function(){
        var name = $("#addname").val();
        $.ajax({
          url: '/treatmentunits/getslug?name='+name,
          type: 'GET',
          success: function(data){
            $("#addslug").val(data.slug)
          }
        });
      });

      $("#editname").change(function(){
        var name = $("#editname").val();
        $.ajax({
          url: '/treatmentunits/getslug?name='+name,
          type: 'GET',
          success: function(data){
            $("#editslug").val(data.slug)
          }
        });
      });
</script>

@endsection