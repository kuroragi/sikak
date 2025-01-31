@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub Kegiatan {{ $sub_unit->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
    
  <div class="row">
    <form action="/storesubkeg" method="post" class="mb-5">
      @csrf
      <label for="subkeg" class="form-label">Cari Sub-kegiatan</label>
      <input type="text" name="kode_sub" value="{{ $sub_unit->kode_sub }}" hidden>
      <div class="input-group">
        <select name="subkeg_id" id="addsubkeg_id" class="form-control fs-7">
          @foreach ($progbid as $p)
            @foreach ($p->kegprog as $k)
              @foreach ($k->subkeg as $s)
                <option value="{{ $s->id }}" class="form-control">{{ $s->ket }}</option>
              @endforeach
            @endforeach
          @endforeach
        </select>
        <button class="btn btn-primary" id="simpan" type="submit" id="button-addon2"><i class="fa fa-plus"></i> Tambah</button>
      </div>
    </form>
  </div>

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
          <th scope="col">Subkegiatan</th>
          <th scope="col">Kinerja</th>
          <th scope="col">Indikator</th>
          <th scope="col">Satuan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($susubkegs as $ss)
          <tr class="text-align-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $ss->subkeg->ket }}</td>
              <td>{{ $ss->subkeg->kinerja }}</td>
              <td>{{ $ss->subkeg->indikator }}</td>
              <td>{{ $ss->subkeg->satuan_slug }}</td>
              <td>
                <form action="/sub_unit/deletesubkeg/{{ $ss->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Subkegiatan?')"><i class="fa fa-trash"></i></button>
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
          <form method="post" action="/sub_unit" class="mb-5">
            @csrf
            <div class="row">
                <div class="col col-xl-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Sub Unit</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}" autofocus required>
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/sub_unit" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Sub Unit</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editname" required>
                    @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

      $("#tbody #editbutton").click(function(){
        var kode_sub = $(this).find("a").attr("href");
        $("#editform").attr('action', '/sub_unit/update/'+kode_sub);
        $.ajax({
          type: 'GET',
          url: '/getdataedit?tbl=sub_units&whr=kode_sub&id='+kode_sub,
          success: function(data){
            $("#editname").val(data.name);
          }
        });
      });

</script>

@endsection