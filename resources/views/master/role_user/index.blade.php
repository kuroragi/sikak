@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Role User</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-9">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Role</button>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($role as $r)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $r->role }}</td>
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href="{{ $r->slug }}"></a><i class="fa fa-edit"></i></button>
                <form action="/role_user/" method="post" class="d-inline">
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

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Role User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/role" class="mb-5">
            @csrf
            <div class="row">
                <div class="col col-xl-12">
                    <div class="mb-3">
                        <label for="role" class="form-label">Nama Role</label>
                        <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="addrole" value="{{ old('role') }}" autofocus required>
                        @error('role')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="addslug" value="{{ old('slug') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Role</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Create -->

<!-- Modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/role" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="role" class="form-label">Nama Role</label>
                    <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="editrole" required>
                    @error('role')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="editslug" value="{{ old('slug') }}" readonly>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah Data Role</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

      $("#tbody #editbutton").click(function(){
        var id = $(this).find("a").attr("href");
          $.ajax({
          url: 'getdataedit?id='+id+'&tbl=roleusers&whr=slug',
          type: 'GET',
          success: function(data){
            $("#editform").attr("action", "/roleuser/"+id);
            $("#editrole").val(data.role);
            $("#editslug").val(data.slug);
          }
        });
      });

      $("#addrole").change(function(){
        var role = $("#addrole").val();
        $.ajax({
          url: '/getslug?name='+role,
          type: 'GET',
          success: function(data){
            $("#addslug").val(data.slug)
          }
        });
      });

      $("#editrole").change(function(){
        var role = $("#editrole").val();
        $.ajax({
          url: '/getslug?name='+role,
          type: 'GET',
          success: function(data){
            $("#editslug").val(data.slug)
          }
        });
      });
</script>

@endsection