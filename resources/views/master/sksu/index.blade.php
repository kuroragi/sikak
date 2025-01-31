@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub Kegiatan yang Diampu {{ $subunit->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive">
    <form action="/sksu" class="mb-3">
      <div class="row justify-content-center">
        <div class="col col-8">
          <div class="input-group">
            <input type="hidden" name="kode" value="{{ request('kode') }}">
            <select name="periode" id="getperiode" class="form-select">
              <option value="">Pilih Periode</option>
              @foreach ($periode as $p)
                  <option value="{{ $p->periode }}" @if(request('periode') == $p->periode) selected @endif>{{ $p->periode }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-info"><i class="fa fa-magnifying-glass"></i></button>
          </div>
        </div>
      </div>
    </form>

    <a href="/subunit"><button class="btn btn-block btn-warning mb-3"><< Kembali</button></a>

    @if (request('periode'))

    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Sub Kegiatan</button>

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
          <th scope="col">Sub Kegiatan</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($sksu as $s)
          <tr class="align-middle">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>[{{ $s->subkeg->kode }}] {{ $s->subkeg->ket }}</td>
              <td></td>
              {{-- <td class="text-center">@if ($s->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td> --}}
              <td class="text-center">
                  <button class="btn btn-warning btn-sm" sksu="{{ $s->id }}" title="Edit SKPD" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><i class="fa fa-edit"></i></button>
                 <form action="/sksu/{{ $s->id }}" method="post" id="deleteform"> 
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('apakah maksud anda menon-aktifkan? Anda yakin hapus subkegiatan ini?')"><i class="fa fa-circle-xmark"></i></button>
                </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    @endif
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Subkegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/sksu" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <input type="hidden" name="kode_subunit" value="{{ request('kode') }}">
                  <input type="hidden" name="periode" value="{{ request('periode') }}">
                  <div class="mb-3">
                    <label for="subkeg" class="form-label">Sub Kegiatan</label>
                    <select name="kode_subkeg" class="form-select" id="addkode_subkeg">
                      @foreach ($subkeg as $s)
                          <option value="{{ $s->kode }}">[{{ $s->kode }}] {{ $s->ket }}</option>
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Tambahkan Subkegiatan</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Subkegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/sksu" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
              <div class="col col-xl-12">
                  <input type="hidden" name="kode_subunit" value="{{ request('kode') }}">
                  <input type="hidden" name="periode" value="{{ request('periode') }}">
                  <div class="mb-3">
                    <label for="subkeg" class="form-label">Sub Kegiatan</label>
                    <select name="kode_subkeg" class="form-select" id="editkode_subkeg">
                      @foreach ($subkeg as $s)
                          <option value="{{ $s->kode }}">[{{ $s->kode }}] {{ $s->ket }}</option>
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
        <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Subkegiatan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

    $("#tbody #editbutton").click(function(){
      var id = $(this).attr("sksu");
        $.ajax({
        url: '/getdataedit?tbl=sksus&whr=id&id='+id,
        type: 'GET',
        success: function(data){
        console.log(data);
          $("#editform").attr("action", "/sksu/"+id);
          $("#editkode_subkeg").val(data.kode_subkeg).change();
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