@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Standar Biaya Umum</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
    <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa fa-plus"></i> Tambah SBU</button>
    @if ($changedsbu > 0)
      <a href="/updatekebsbu" class="btn btn-block btn-primary mb-3" id="updatekebsbu"><i class="fa fa-arrow-rotate-left"></i> Update Data Kebutuhan KAK</a>
    @endif
    <div class="row d-flex justify-content-center">
      <div class="col col-8">
        <form action="/sbu">
          <div class="input-group">
            <input type="text" name="barang" class="form-control" value="{{ old('barang', request('barang')) }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-magnifying-glass"></i></button>
          </div>
        </form>
      </div>
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
      <thead class="text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-40">Barang</th>
          <th scope="col">Harga</th>
          <th scope="col">Satuan</th>
          <th scope="col">Aktif</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($sbus as $s)
          <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $s->ket }}</td>
              <td class="text-end">{{ str_replace(',', '.', number_format($s->harga)) }}</td>
              <td class="text-center">{{ $s->satuan->satuan??'' }}</td>
              <td>{{ $s->satuan->satuan??'' }}</td>
              <td>
                <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-target="#editmodal"><a href="{{ $s->id }}"></a><i class="fa fa-edit"></i></button>
                <form action="/satuan/{{ $s->id }}" method="post" class="d-inline">
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

<div class="d-flex justify-content-center">
  {{ $sbus->appends(['barang' => request('barang')])->links() }}
</div>

<!-- Modal Create -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah SBU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/sbu" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode Biaya</label>
                      <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="addkode" value="{{ old('kode') }}" autofocus required>
                      @error('kode')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="ket" class="form-label">Nama Biaya</label>
                      <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="addket" value="{{ old('ket') }}" required>
                      @error('ket')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="addharga" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan</label>
                      <input type="text" name="satuan_slug" class="form-control @error('satuan') is-invalid @enderror" id="addsatuan" value="{{ old('satuan') }}" required>
                      @error('satuan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="satuan" class="form-label">Kali</label>
                      <input type="text" name="satuan_slug" class="form-control @error('satuan') is-invalid @enderror" id="addsatuan" value="{{ old('satuan', 1) }}" required>
                      @error('satuan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="1" @if (old('status') === '1') selected @endif>Active</option>
                        <option value="0" @if (old('status') === '0') selected @endif>Non Active</option>
                    </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Personil</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit SBU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editform" action="/sbu" class="mb-5">
          @csrf
          @method('put')
          <div class="row">
            <div class="col col-xl-12">
                <div class="mb-3">
                    <label for="kode_sbuhead" class="form-label">Kode Biaya</label>
                    <input type="text" name="kode_sbuhead" class="form-control @error('kode_sbuhead') is-invalid @enderror" id="editkode_sbuhead" value="{{ old('kode_sbuhead') }}" autofocus required>
                    @error('kode_sbuhead')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ket" class="form-label">Nama Biaya</label>
                    <textarea name="ket" class="form-control @error('ket') is-invalid @enderror" id="editket" rows="3"></textarea>
                    @error('ket')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-editon1">Rp.</span>
                      <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="editharga" value="{{ old('harga') }}" required>
                      @error('harga')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="satuan_slug" class="form-label">Satuan</label>
                    <select name="satuan_slug"class="form-control @error('satuan_slug') is-invalid @enderror" id="editsatuan_slug" >
                      @foreach ($satuan as $sat)
                        <option value="{{ $sat->id }}">{!! $sat->satuan !!}</option>
                      @endforeach
                    </select>
                    @error('satuan_slug')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Kali</label>
                    <input type="text" name="satuan_slug" class="form-control @error('satuan') is-invalid @enderror" id="editsatuan" value="{{ old('satuan', 1) }}" required>
                    @error('satuan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_rek" class="form-label">Rekening</label>
                    <input type="text" name="id_rek" class="form-control @error('id_rek') is-invalid @enderror" id="editid_rek" value="{{ old('id_rek', 1) }}" required>
                    @error('id_rek')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" name="status">
                      <option value="1" @if (old('status') === '1') selected @endif>Active</option>
                      <option value="0" @if (old('status') === '0') selected @endif>Non Active</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit Biaya</button>
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
          url: 'getdataedit?id='+id+'&tbl=sbus&whr=id',
          type: 'GET',
          success: function(data){
            $("#editform").attr("action", "/sbu/"+id);
            $("#editkode_sbuhead").val(data.kode_sbuhead);
            $("#editket").val(data.ket);
            $("#editketsbu").val(data.ketsbu);
            $("#editharga").val(data.harga);
            $("#editsatuan_slug").val(data.satuan_slug).change();
            $("#editkali").val(data.kali);
            $("#editstatus").val(data.status);
            $("#editid_rek").val(data.id_rek);
          }
        });
      });
</script>

@endsection