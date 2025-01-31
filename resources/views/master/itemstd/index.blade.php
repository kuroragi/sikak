@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah Layanan</button>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <table class="table table-striped table-sm rotate-table-grid" id="tbl">
      <thead class="fs-7">
        <tr>
          <th scope="col" colspan="8">Kode Akun</th>
          <th scope="col">Rincian</th>
          <th scope="col">spesifikasi/Merek/Ukuran</th>
          <th scope="col">Satuan</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($data as $d)
          <tr>
            <td class="fs-8">{{ $d->kode_object }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="fs-8">{{ $d->ket }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="fs-7">
              <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
              <form action="/treatmentunits/" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
              </form>
            </td>
          </tr>
          @foreach ($d->jeno as $j)
            <tr>
              <td class="fs-8">{{ $d->kode_object }}</td>
              <td class="fs-8">{{ $j->kode_jeno }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="fs-8">{{ $j->ket }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                <form action="/treatmentunits/" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                </form>
              </td>
            </tr>
            @foreach ($j->bajeno as $bj)
              <tr>
                <td class="fs-8">{{ $d->kode_object }}</td>
                <td class="fs-8">{{ $j->kode_jeno }}</td>
                <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="fs-8">{{ $bj->ket }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                  <form action="/treatmentunits/" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                  </form>
                </td>
              </tr>
              @foreach ($bj->tibajeno as $tbj)
                <tr>
                  <td class="fs-8">{{ $d->kode_object }}</td>
                  <td class="fs-8">{{ $j->kode_jeno }}</td>
                  <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                  <td class="fs-8">{{ sprintf('%02d', $tbj->kode_tibajeno) }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="fs-8">{{ $tbj->ket }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                    <form action="/treatmentunits/" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                    </form>
                  </td>
                </tr>
                @foreach ($tbj->ketibajeno as $ktbj)
                  <tr>
                    <td class="fs-8">{{ $d->kode_object }}</td>
                    <td class="fs-8">{{ $j->kode_jeno }}</td>
                    <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                    <td class="fs-8">{{ sprintf('%02d', $tbj->kode_tibajeno) }}</td>
                    <td class="fs-8">{{ sprintf('%02d', $ktbj->kode_ketibajeno) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="fs-8">{{ $ktbj->ket }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                      <form action="/treatmentunits/" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                      </form>
                    </td>
                  </tr>
                  @foreach ($ktbj->jeketibajeno as $jktbj)
                    <tr>
                      <td class="fs-8">{{ $d->kode_object }}</td>
                      <td class="fs-8">{{ $j->kode_jeno }}</td>
                      <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                      <td class="fs-8">{{ sprintf('%02d', $tbj->kode_tibajeno) }}</td>
                      <td class="fs-8">{{ sprintf('%02d', $ktbj->kode_ketibajeno) }}</td>
                      <td class="fs-8">{{ sprintf('%02d', $jktbj->kode_jeketibajeno) }}</td>
                      <td></td>
                      <td></td>
                      <td class="fs-8">{{ $jktbj->ket }}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                        <form action="/treatmentunits/" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                        </form>
                      </td>
                    </tr>
                    @foreach ($jktbj->bajeketibajeno as $bjktbj)
                      <tr>
                        <td class="fs-8">{{ $d->kode_object }}</td>
                        <td class="fs-8">{{ $j->kode_jeno }}</td>
                        <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                        <td class="fs-8">{{ sprintf('%02d', $tbj->kode_tibajeno) }}</td>
                        <td class="fs-8">{{ sprintf('%02d', $ktbj->kode_ketibajeno) }}</td>
                        <td class="fs-8">{{ sprintf('%02d', $jktbj->kode_jeketibajeno) }}</td>
                        <td class="fs-8">{{ sprintf('%03d', $bjktbj->kode_bajeketibajeno) }}</td>
                        <td></td>
                        <td class="fs-8">{{ $bjktbj->ket }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                          <form action="/treatmentunits/" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                          </form>
                        </td>
                      </tr>
                      @foreach ($bjktbj->ditems as $item)
                        <tr>
                          <td class="fs-8">{{ $d->kode_object }}</td>
                          <td class="fs-8">{{ $j->kode_jeno }}</td>
                          <td class="fs-8">{{ $bj->kode_bajeno }}</td>
                          <td class="fs-8">{{ sprintf('%02d', $tbj->kode_tibajeno) }}</td>
                          <td class="fs-8">{{ sprintf('%02d', $ktbj->kode_ketibajeno) }}</td>
                          <td class="fs-8">{{ sprintf('%02d', $jktbj->kode_jeketibajeno) }}</td>
                          <td class="fs-8">{{ sprintf('%03d', $bjktbj->kode_bajeketibajeno) }}</td>
                          <td class="fs-8">{{ sprintf('%02d', $item->kode_item) }}</td>
                          <td class="fs-8">{{ $item->name }}</td>
                          <td class="fs-8">{{ $item->spek }}</td>
                          <td class="fs-8">{{ $item->satuan->name }}</td>
                          <td class="fs-8">{{ $item->harga_std }}</td>
                          <td>
                            <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href=""></a><i class="fa fa-edit"></i></button>
                            <form action="/treatmentunits/" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    @endforeach
                  @endforeach
                @endforeach
              @endforeach
            @endforeach
          @endforeach
        @endforeach
      </tbody>
    </table>
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/treatmentunits" class="mb-5">
            @csrf
            <div class="row">
                <div class="col col-xl-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Satuan</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}" autofocus required>
                        @error('name')
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
          <button type="submit" class="btn btn-primary">Tambah Satuan</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Satuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/supliers" class="mb-5">
          @csrf
          @method("put")
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Satuan</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editname" required>
                    @error('name')
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
        <button type="submit" class="btn btn-primary">Ubah Data Satuan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Add Aktivitas -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/aktivitas" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="name" class="form-label">Aktivitas</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="addname" value="{{ old('name') }}" autofocus required>
                      @error('name')
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
        <button type="submit" class="btn btn-primary">Tambah Satuan</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->
    
<script>

      $("#editbutton").click(function(){
        var id = $(this).find("a").attr("href");
          $.ajax({
          url: '/treatmentunits/getdataedit?id='+id,
          type: 'GET',
          success: function(data){
            $("#editform").attr("action", "/treatmentunits/"+id);
            $("#editname").val(data.item[0].name);
            $("#editslug").val(data.item[0].slug);
          }
        });
      });

      $("#addname").change(function(){
        var name = $("#addname").val();
        $.ajax({
          url: '/getslug?name='+name,
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