@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Periode</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-9">
  <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Periode</button>

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
  <table class="table table-striped table-sm" id="tbl">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Periode</th>
        <th scope="col">Sesi Berjalan</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($periode as $p)
        <tr class="align-middle text-center">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $p->periode }}</td>
            <td>
              <select id="_sesi" periode="{{ $p->id }}">
                <option value="rka" @if($p->sesi == 'rka') selected @endif>RKA</option>
                <option value="kuappas" @if($p->sesi == 'kuappas') selected @endif>KUAPPAS</option>
                <option value="apbd" @if($p->sesi == 'apbd') selected @endif>APBD</option>
                <option value="final" @if($p->sesi == 'final') selected @endif>Pergeseran</option>
              </select>
            </td>
            <td>
              <select id="_proses" periode="{{ $p->id }}">
                <option value="berjalan" @if($p->proses == 'berjalan') selected @endif>Berjalan</option>
                <option value="selesai" @if($p->proses == 'selesai') selected @endif>Selesai</option>
              </select>
            </td>
            <td>@if ($p->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
            <td>
              <button class="btn btn-warning btn-sm" title="Edit Urusan" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a id="{{ $p->id }}"></a><i class="fa fa-edit"></i></button>
              {{-- <form action="/treatmentunits/" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm" title="Non Aktifkan Urusan" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
              </form> --}}
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/periode" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="periode" class="form-label">Periode</label>
                      <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="addperiode" value="{{ old('periode') }}">
                      @error('periode')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah Periode</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Periode</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="post" id="editform" action="/supliers" class="mb-5">
        @csrf
        @method("put")
        <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="periode" class="form-label">Periode</label>
                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="editperiode" value="{{ old('periode') }}">
                    @error('periode')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
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
      <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah Program</button>
    </form>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- End Modal Edit -->
  
<script>

    $("#tbody #_sesi").change(function(){
      var id = $(this).attr("periode");
      var sesi = $(this).val();
        $.ajax({
        url: '/editsesi?id='+id+'&sesi='+sesi,
        type: 'GET',
        success: function(data){
          //
        }
      });
    });

  $("#tbody #_proses").change(function(){
    var id = $(this).attr("periode");
    var proses = $(this).val();
      $.ajax({
      url: '/editproses?id='+id+'&proses='+proses,
      type: 'GET',
      success: function(data){
        //
      }
    });
  });

    $("#tbody #editbutton").click(function(){
      var id = $(this).find("a").attr("id");
        $.ajax({
        url: '/getdataedit?tbl=periodes&whr=id&id='+id,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/periode/"+id);
          $("#editperiode").val(data.periode);
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