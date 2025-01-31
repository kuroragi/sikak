@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Satuan kerja Perangkat Daerah</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah SKPD</button>

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
          <th scope="col">Kode</th>
          <th scope="col">SKPD</th>
          <th scope="col">Singkatan</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          <tr class="align-middle">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $s->kode }}</td>
              <td>{{ $s->name }}</td>
              <td class="text-center">{{ $s->singkatan }}</td>
              <td class="text-center">@if ($s->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm" title="Edit SKPD" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $s->kode }}"></a><i class="fa fa-edit"></i></button>
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
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah SKPD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/skpd" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode SKPD</label>
                      <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="addkode" value="{{ old('kode') }}" autofocus required>
                      @error('kode')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama SKPD</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}">
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="singkatan" class="form-label">Singkatan</label>
                      <input type="text" name="singkatan" class="form-control @error('singkatan') is-invalid @enderror" id="addsingkatan" value="{{ old('singkatan') }}">
                      @error('singkatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="pemekaran" class="form-label">Pemekaran</label>
                    <select name="pemekaran" class="form-select" id="addpemekaran">
                      <option value="">Bukan Pemekaran</option>
                      @foreach ($skpd as $s)
                        <option value="{{ $s->kode }}">{{ $s->singkatan }}</option>
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah SKPD</button>
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
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah SKPD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/skpd" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode SKPD</label>
                      <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="editkode" value="{{ old('kode') }}" autofocus required>
                      @error('kode')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama SKPD</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editname" value="{{ old('name') }}">
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="singkatan" class="form-label">Singkatan</label>
                      <input type="text" name="singkatan" class="form-control @error('singkatan') is-invalid @enderror" id="editsingkatan" value="{{ old('singkatan') }}">
                      @error('singkatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="pemekaran" class="form-label">Pemekaran</label>
                    <select name="pemekaran" class="form-select" id="editpemekaran">
                      <option value="">Bukan Pemekaran</option>
                      @foreach ($skpd as $s)
                        <option value="{{ $s->kode }}">{{ $s->singkatan }}</option>
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Edit SKPD</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

    $("#tbody #editbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
        $.ajax({
        url: '/getdataedit?tbl=s_k_p_d_s&whr=kode&id='+kode,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/skpd/"+kode);
          $("#editkode").val(data.kode);
          $("#editname").val(data.name);
          $("#editsingkatan").val(data.singkatan);
          $("#editpemekaran").val(data.pemekaran).change();
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