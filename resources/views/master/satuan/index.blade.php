@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Satuan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-9">
  <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Satuan</button>

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
        <th scope="col">Satuan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($satuan as $s)
        <tr class="align-middle">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{!! $s->satuan !!}</td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm" title="Edit Urusan" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a id="{{ $s->id }}"></a><i class="fa fa-edit"></i></button>
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
  <div class="text-center w-100">
    {{ $satuan->links() }}
  </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/satuan" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan</label>
                      <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="addsatuan" value="{{ old('satuan') }}">
                      @error('satuan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah Satuan</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Satuan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="post" id="editform" action="/satuan" class="mb-5">
        @csrf
        @method("put")
        <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="editsatuan" value="{{ old('satuan') }}">
                    @error('satuan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah Satuan</button>
    </form>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- End Modal Edit -->
  
<script>

    $("#tbody #editbutton").click(function(){
      var id = $(this).find("a").attr("id");
        $.ajax({
        url: '/getdataedit?tbl=satuans&whr=id&id='+id,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/satuan/"+id);
          $("#satuan").val(data.satuan);
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