@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Indikator</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive">
  <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Program</button>

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
        <th scope="col">Kode Program</th>>
        <th scope="col">Numenklatur</th>
        <th scope="col">indikator</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($progbid as $p)
        <tr class="align-middle">
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $p->kode }}</td>
            <td>{{ $p->ket }}</td>
            <td>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Indikator</th>
                    <th>Target</th>
                    <th>Satuan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($p->indikator as $in)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $in->indikator }}</td>
                      <td>{{ $in->target }}</td>
                      <td>{{ $in->satuan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
            <td class="text-center">@if ($p->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm" title="Edit Urusan" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $p->kode }}"></a><i class="fa fa-edit"></i></button>
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

{{-- <!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/progbid" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="kode_bidurus" class="form-label">Bidang bidurus</label>
                      <select name="kode_bidurus" class="form-select" id="addkode_bidurus">
                        @foreach ($bidurus as $b)
                          <option value="{{ $b->kode }}">[{{ $b->kode }}] {{ $b->ket }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode Program</label>
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambah Program</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Urusan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form method="post" id="editform" action="/supliers" class="mb-5">
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
                  <label for="kode" class="form-label">Kode Program</label>
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
<!-- End Modal Edit --> --}}
  
<script>

    $("#tbody #editbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
        $.ajax({
        url: '/getdataedit?tbl=progbids&whr=kode&id='+kode,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/progbid/"+kode);
          $("#editkode_bidurus").val(data.kode_bidurus).change();
          $("#editkode").val(data.kode);
          $("#editket").val(data.ket);
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