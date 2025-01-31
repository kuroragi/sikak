@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Periode RPJMD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah RPJMD</button>

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
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Periode</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($rpjmd as $r)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $r->judul }}</td>
              <td>{{ $r->tahun_awal }} ~ {{ $r->tahun_akhir }}</td>
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href="{{ $r->id }}"></a><i class="fa fa-edit"></i></button>
                <form action="/rpjmd/{{ $r->id }}" method="post" class="d-inline">
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
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Periode RPJMD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/rpjmd" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="addjudul" value="{{ old('judul') }}" autofocus required>
                      @error('judul')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="tahun_awal" class="form-label">Tahun Awal</label>
                      <input type="text" name="tahun_awal" class="form-control @error('tahun_awal') is-invalid @enderror" id="addtahun_awal" value="{{ old('tahun_awal') }}" autofocus required>
                      @error('tahun_awal')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="tahun_akhir" class="form-label">Tahun akhir</label>
                      <input type="text" name="tahun_akhir" class="form-control @error('tahun_akhir') is-invalid @enderror" id="addtahun_akhir" value="{{ old('tahun_akhir') }}" autofocus required>
                      @error('tahun_akhir')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Periode</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Personil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/personil" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama Personil</label>
                      <div class="input-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editname" value="{{ old('name') }}" autofocus required>
                        <button class="btn btn-outline-secondary" id="editgenbtn" type="button" id="button-addon2"><i class="fa fa-circle-exclamation"></i> Generate SLug</button>
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="editslug" value="{{ old('slug') }}" readonly>
                  </div>

                  <small class="mt-2">Mohon tombol generate slug ditekan dan tunggu hingga slug berisi</small>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Personil</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
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
        var id = $(this).find("a").attr("href");
          $.ajax({
          url: 'getdataedit?id='+id+'&tbl=personils&whr=slug',
          type: 'GET',
          success: function(data){
            $("#editform").attr("action", "/personil/"+id);
            $("#editname").val(data.name);
            $("#editslug").val(data.slug);
          }
        });
      });
</script>

@endsection