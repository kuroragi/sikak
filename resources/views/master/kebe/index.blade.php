@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelompok Belanja</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-9">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Kelompok Belanja</button>

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
          <th scope="col">Kelompok Belanja</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($kebe as $k)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->ket }}</td>
              <td class="text-center">@if ($k->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" kebe="{{ $k->id }}" data-bs-target="#editmodal"><i class="fa fa-edit"></i></button>
                <form action="/kebe/" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kebutuhan Belanja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/kebe" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="name" class="form-label">Kebutuhan Belanja</label>
                      <input type="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" id="addket" value="{{ old('ket') }}" autofocus required>
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan</label>
                    <select name="urutan" class="form-select" id="addurutan">
                      @for ($i = 1; $i < 21; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="addstatus">
                      <option value="1" class="bg-green">Aktif</option>
                      <option value="0" class="bg-danger">Non Aktif</option>
                    </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Kelompok Belanja</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Edit Data -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kebutuhan Belanja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/kebe" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Kebutuhan Belanja</label>
                    <input type="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" id="editket" value="{{ old('ket') }}" autofocus required>
                    @error('ket')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="urutan" class="form-label">Urutan</label>
                  <select name="urutan" class="form-select" id="editurutan">
                    @for ($i = 1; $i < 21; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" class="form-select" id="editstatus">
                    <option value="1" class="bg-green">Aktif</option>
                    <option value="0" class="bg-danger">Non Aktif</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">edit Kelompok Belanja</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal edit -->
    
<script>

    $("#addgenbtn").click(function(){
      var name = $("#addname").val();
      $.ajax({
        url: '/getslug?name='+name,
        type: 'GET',
        success: function(data){
          $("#addslug").val(data.slug)
        }
      });
    });

    $("#editgenbtn").click(function(){
      var name = $("#editname").val();
      $.ajax({
        url: '/getslug?name='+name,
        type: 'GET',
        success: function(data){
          $("#editslug").val(data.slug)
        }
      });
    });

    $("#tbody #editbutton").click(function(){
      var id = $(this).attr("kebe");
        $.ajax({
        url: '/getdataedit?tbl=kelompokbelanjas&whr=id&id='+id,
        type: 'GET',
        success: function(data){
          $("#editform").attr("action", "/kebe/"+id);
          $("#editket").val(data.ket);
          $("#editurutan").val(data.urutan).change();
          $("#editstatus").val(data.status).change();
        }
      });
    });
</script>

@endsection