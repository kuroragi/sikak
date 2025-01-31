@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub Kegiatan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive">
  <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Sub-Kegiatan</button>

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
        <th scope="col">Kode Kegiatan</th>
        <th scope="col">Kode</th>
        <th scope="col">Kegiatan</th>
        <th scope="col">Sub Kegiatan</th>
        <th scope="col">Kinerja</th>
        <th scope="col">Indikator</th>
        <th scope="col">Satuan</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($subkeg as $s)
        <tr class="fs-7">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $s->kode_kegprog }}</td>
            <td>{{ $s->kode }}</td>
            <td class="w-20">{{ $s->kegprog->ket ?? '' }}</td>
            <td>{{ $s->ket }}</td>
            <td>{{ $s->kinerja }}</td>
            <td>{{ $s->indikator }}</td>
            <td>{!! $s->satuan->satuan !!}</td>
            <td class="text-center">@if ($s->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm" title="Edit Urusan" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $s->kode }}"></a><i class="fa fa-edit"></i></button>
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
  {{ $subkeg->onEachSide(3)->links() }}
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/subkeg" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="kode_kegprog" class="form-label">Kegiatan</label>
                      <select name="kode_kegprog" class="form-select" id="addkode_kegprog">
                        @foreach ($kegprog as $k)
                          <option value="{{ $k->kode }}">[{{ $k->kode }}] {{ $k->ket }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode Sub Kegiatan</label>
                      <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="addkode" value="{{ old('kode') }}" autofocus required>
                      @error('kode')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="ket" class="form-label">Numenklatur</label>
                    <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="addket" value="{{ old('ket') }}">
                    @error('ket')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="kinerja" class="form-label">Kinerja</label>
                    <input type="text" name="kinerja" class="form-control @error('kinerja') is-invalid @enderror" id="addkinerja" value="{{ old('kinerja') }}">
                    @error('kinerja')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="indikator" class="form-label">Indikator</label>
                    <input type="text" name="indikator" class="form-control @error('indikator') is-invalid @enderror" id="addindikator" value="{{ old('indikator') }}">
                    @error('indikator')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="satuan_id" class="form-label">Satuan</label>
                      <select name="satuan_id" class="form-control" id="addsatuan_id">
                        @foreach ($satuan as $sat)
                          <option value="{{ $sat->id }}">{!! $sat->satuan !!}</option>
                        @endforeach
                      </select>
                      @error('satuan_id')
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah Sub Kegiatan</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Sub Kegiatan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="post" id="editform" action="/subkeg" class="mb-5">
        @csrf
        @method("put")
        <div class="row">
          <div class="col col-xl-12">
              <div class="mb-3">
                  <label for="kode_kegprog" class="form-label">Kegiatan</label>
                  <select name="kode_kegprog" class="form-select" id="editkode_kegprog">
                    @foreach ($kegprog as $k)
                          <option value="{{ $k->kode }}">[{{ $k->kode }}] {{ $k->ket }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="kode" class="form-label">Kode Sub Kegiatan</label>
                  <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="editkode" value="{{ old('kode') }}" autofocus required>
                  @error('kode')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="ket" class="form-label">Numenklatur</label>
                  <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="editket" value="{{ old('ket') }}">
                  @error('ket')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="kinerja" class="form-label">Kinerja</label>
                  <input type="text" name="kinerja" class="form-control @error('kinerja') is-invalid @enderror" id="editkinerja" value="{{ old('kinerja') }}">
                  @error('kinerja')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="indikator" class="form-label">Indikator</label>
                  <input type="text" name="indikator" class="form-control @error('indikator') is-invalid @enderror" id="editindikator" value="{{ old('indikator') }}">
                  @error('indikator')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="satuan_id" class="form-label">Satuan</label>
                  <select name="satuan_id" class="form-control" id="editsatuan_id">
                    @foreach ($satuan as $sat)
                      <option value="{{ $sat->id }}">{!! $sat->satuan !!}</option>
                    @endforeach
                  </select>
                  @error('satuan_id')
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
      <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah Sub Kegiatan</button>
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
        url: '/getdataedit?tbl=subkegs&whr=kode&id='+kode,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/subkeg/"+kode);
          $("#editkode_kegprog").val(data.kode_kegprog).change();
          $("#editkode").val(data.kode);
          $("#editket").val(data.ket);
          $("#editkinerja").val(data.kinerja);
          $("#editindikator").val(data.indikator);
          $("#editsatuan_id").val(data.satuan_id).change();
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