@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub Unit Satuan kerja Perangkat Daerah</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive" id="allrow">
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
    @foreach ($skpd as $s)
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{ $s->id }}">
            <button class="accordion-button @if(auth()->user()->role_slug == 'admin') collapsed @endif bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $s->id }}" aria-expanded="false" aria-controls="collapseTwo">
              {{ $s->kode }} - {{ $s->name }}
            </button>
          </h2>
          <div id="collapse{{ $s->id }}" class="accordion-collapse @if(auth()->user()->role_slug == 'admin') collapse @endif" aria-labelledby="heading{{ $s->id }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              @if ($s->pemekaran != '')
              <button class="btn btn-block btn-primary btn-sm" id="importbutton" data-bs-toggle="modal" data-bs-target="#importmodal"><a kode="{{ $s->kode }}" pemekaran="{{ $s->pemekaran }}" tbl="{{ $s->id }}"></a><i class="fa fa-download"></i> Import Sub Unit dari SKPD Sebelumnya</button>    
              @endif
              <button class="btn btn-block btn-primary btn-sm" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><a kode="{{ $s->kode }}" tbl="{{ $s->id }}"></a><i class="fa fa-plus"></i> Tambah Sub Unit</button>
              <table class="table table-striped table-sm" id="tbl{{ $s->id }}">
                <thead>
                  <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Sub Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  @foreach ($s->subunit as $ss)
                    @if ($ss->status == 1)
                      <tr class="align-middle">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $ss->name }}</td>
                        <td class="text-center">@if ($ss->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
                        <td class="text-center">
                          <a href="/sksu?kode={{ $ss->kode }}"><button class="btn btn-info btn-sm" title="Sub Kegiatan Yang Diampu"><i class="fa fa-eye"></i></button></a>
                          <button class="btn btn-warning btn-sm" title="Edit SKPD" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $ss->kode }}"></a><i class="fa fa-edit"></i></button>
                          {{-- <form action="/treatmentunits/" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" title="Non Aktifkan Urusan" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                          </form> --}}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>

              <div class="accordion" id="accordionnonactive{{ $s->id }}Example">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="nonactive{{ $s->id }}-headingOne">
                    <button class="accordion-button collapsed bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#nonactive{{ $s->id }}-collapseOne" aria-expanded="true" aria-controls="nonactive{{ $s->id }}-collapseOne">
                      Bidang Non Aktif
                    </button>
                  </h2>
                  <div id="nonactive{{ $s->id }}-collapseOne" class="accordion-collapse collapse" aria-labelledby="nonactive{{ $s->id }}-headingOne">
                    <div class="accordion-body">
                      
                      <table class="table table-striped table-sm" id="tblnonactive{{ $s->id }}">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Sub Unit</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">
                          @foreach ($s->subunit as $ss)
                            @if ($ss->status == 0)
                              <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $ss->name }}</td>
                                <td class="text-center">@if ($ss->status == 1) <i class="text-green fa fa-square"></i> @else <i class="text-red fa fa-square"></i> @endif</td>
                                <td class="text-center">
                                  <a href="/sksu?kode={{ $ss->kode }}"><button class="btn btn-info btn-sm" title="Sub Kegiatan Yang Diampu"><i class="fa fa-eye"></i></button></a>
                                  <button class="btn btn-warning btn-sm" title="Edit SKPD" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a kode="{{ $ss->kode }}"></a><i class="fa fa-edit"></i></button>
                                  {{-- <form action="/treatmentunits/" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" title="Non Aktifkan Urusan" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                                  </form> --}}
                                </td>
                              </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>


              
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- <form method="post" action="/subunit" class="mb-5">
          @csrf --}}
          <div class="row">
              <div class="col col-xl-12">
                  <input type="text" name="kode_skpd" id="addkode_skpd" hidden>
                  <input type="text" id="addtbl" hidden>
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama Sub Unit</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}">
                      @error('name')
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
        <button type="submit" class="btn btn-success" id="addsubunit"><i class="fa fa-floppy-disk"></i> Tambah Sub Unit</button>
      {{-- </form> --}}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Modal Create -->
<div class="modal fade" id="importmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/imsubunit" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <input type="text" name="kode_skpd" id="importkode_skpd" hidden>
                  <input type="text" id="importtbl" hidden>
                  <div class="mb-3">
                      <label for="pemekaran" class="form-label">Nama SKPD</label>
                      <select name="dataskpd" class="form-select" id="importdataskpd">
                      </select>
                      @error('pemekaran')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="pemekaran" class="form-label">Nama Sub Unit</label>
                      <select name="pemekaran" class="form-select" id="importpemekaran">
                      </select>
                      @error('pemekaran')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="importsubunit"><i class="fa fa-floppy-disk"></i> Import Sub Unit</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit SKPD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/subunit" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Sub Unit</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editname" value="{{ old('name') }}">
                    @error('name')
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
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-disk"></i> Edit Sub Unit</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
    
<script>

    $("#allrow #addbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
      var tbl = "tbl"+$(this).find("a").attr("tbl");
      $("#addkode_skpd").val(kode);
      $("#addtbl").val(tbl);
    });
    
    $("#addsubunit").click(function(){
      $.ajaxSetup({
          headers: {
              // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
      var kode_skpd = $("#addkode_skpd").val();
      var name = $("#addname").val();
      var status = $("#addstatus").val();
      var tbl = $("#addtbl").val();
      $.ajax({
        url: '/subunit',
        type: 'POST',
        data: {kode_skpd:kode_skpd, name:name, status:status},
        dataType: 'json',
        success: function(data){
          $("#"+tbl).load(location.href + " #"+tbl);
          $("#addmodal").modal('hide');
          $("#addkode_skpd").val('');
          $("#addname").val('');
          $("#addtbl").val('');
        }
      })
    });

    $("#allrow #importbutton").click(function (e) { 
      e.preventDefault();
      
      var kode = $(this).find("a").attr("kode");
      var pemekaran = $(this).find("a").attr("pemekaran");
      $("#importdataskpd").empty();
      $("#importkode_skpd").val(kode);
      $.ajax({
        type: "GET",
        url: "/getdatawiths?tbl=App\\Pemekaranskpd&with=skpd&whr=kode_skpd&id="+kode,
        success: function (data) {
          var select = "<option value=''>Pilih SKPD Pemekaran</option>";
          $.each(data, function (index, value) { 
            select += "<option value='"+data[index].skpd.kode+"'>"+data[index].skpd.name+"</option>"
          });
          $("#importdataskpd").html(select);
        }
      });
    });

    $("#importdataskpd").change(function (e) { 
      e.preventDefault();
      
      var kode = $(this).val();
      $("#importpemekaran").empty();
      $.ajax({
        type: "GET",
        url: "/getdatawiths?tbl=App\\SKPD&with=subunit&whr=kode&id="+kode,
        success: function (data) {
          var select = "";
          $.each(data, function (index, value) {
            $.each(data[index].subunit, function (index1, value1) { 
               select += "<option value='"+data[index].subunit[index1].kode+"'>"+data[index].subunit[index1].name+"</option>";
            });
            
          });
          $("#importpemekaran").html(select);
        }
      });
    });
    
    $("#tbody #editbutton").click(function(){
      var kode = $(this).find("a").attr("kode");
        $.ajax({
        url: '/getdataedit?tbl=sub_units&whr=kode&id='+kode,
        type: 'GET',
        success: function(data){
          $("#editform").attr("action", "/subunit/"+kode);
          $("#editname").val(data.name);
          $("#editstatus").val(data.status).change();
        }
      });
    });
</script>

@endsection