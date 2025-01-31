@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sub-kegiatan {{ $subkeg->ket }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-11">
    <!-- <button class="btn btn-block btn-primary mb-3" id="addbutton" data-bs-toggle="modal" data-bs-target="#addkakmodal"><a href="{{ $subkeg->id }}"></a><i class="fa fa-plus"></i> Tambah KAK</button> --> <a href="/skpdprog"><button class="btn btn-block btn-warning border-0 mb-3"><i class="fa fa-angles-left"></i> Kembali</button></a>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kerangka Acuan Kerja</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pencetus</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kak as $kak)
          @if($kak->sub_unit == auth()->user()->kode_sub || $kak->sub_unit == '')
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kak->name }}</td>
                <td>{{ $kak->kelompokbelanja->name }}</td>
                <td>@if($kak->pencetuskebe_id != ''){{ $kak->pencetuskebe->name }}@endif</td>
                <td>Rp. {{ number_format($kak->total_anggaran) }}</td>
                <td>
                    <a href="/kak/{{ $kak->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
                    <a href="/kak/salinkak/{{ $kak->kode_kak }}"><button class="badge bg-info border-0" id="showsubkeg" data-bs-placement="top" title="Salin KAK"><i class="fa fa-copy"></i></button></a>
                    <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit KAK" data-bs-target="#editkakmodal"><a href="{{ $kak->kode_kak }}"></a><a1 href="{{ $kak->subkeg_id }}"></a1><a2 href="kak"></a2><i class="fa fa-edit"></i></button>
                    @if(auth()->user()->role_slug == 'admin')
                    <a href="/kak/checkupdate/{{ $kak->kode_kak }}"><button class="badge bg-secondary border-0" data-bs-placement="top" title="update KAK"><i class="fa fa-magnifying-glass"></i></button></a>
                    @endif
                    <!--form action="/kak/{{ $kak->kode_kak }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" data-bs-placement="top" title="Hapus KAK" onclick="return confirm('Yakin Hapus KAK?')"><i class="fa fa-circle-xmark"></i></button>
                    </form-->
                </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>

    <h5>KAK Gaji STTP</h5>

    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kakgaji as $kakg)
          @if($kakg->sub_unit == auth()->user()->kode_sub)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kakg->kelompokbelanja->name }}</td>
                <td>Rp. {{ number_format($kakg->total_anggaran) }}</td>
                <td>
                    <a href="/kakgaji/{{ $kakg->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
                    <a href="/kakgaji/salinkak/{{ $kakg->kode_kak }}"><button class="badge bg-info border-0" id="showsubkeg" data-bs-placement="top" title="Salin KAK"><i class="fa fa-copy"></i></button></a>
                    <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit KAK" data-bs-target="#editkakmodal"><a href="{{ $kakg->kode_kak }}"></a><a1 href="{{ $kakg->subkeg_id }}"></a1><a2 href="gaji"></a2><i class="fa fa-edit"></i></button>
                    <form action="/kakgaji/{{ $kakg->kode_kak }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" data-bs-placement="top" title="Hapus KAK" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                    </form>
                </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>

    <h5>KAK Rutin Kantor Wajib</h5>

    <table class="table table-striped table-sm" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kelompok Kerja</th>
          <th scope="col">Pagu</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($subkeg->kakrutin as $kakr)
          @if($kakr->sub_unit == auth()->user()->kode_sub)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kakr->kelompokbelanja->name }}</td>
                  <td>Rp. {{ number_format($kakr->total_anggaran) }}</td>
                  <td>
                      <a href="/kakrutin/{{ $kakr->kode_kak }}"><button class="badge bg-primary border-0" id="showsubkeg" data-bs-placement="top" title="Detail KAK"><i class="fa fa-eye"></i></button></a>
                      <a href="/kakgaji/salinkak/{{ $kakr->kode_kak }}"><button class="badge bg-info border-0" id="showsubkeg" data-bs-placement="top" title="Salin KAK"><i class="fa fa-copy"></i></button></a>
                      <button class="badge bg-warning border-0" id="editbutton" data-bs-toggle="modal" data-bs-placement="top" title="Edit KAK" data-bs-target="#editkakmodal"><a href="{{ $kakr->kode_kak }}"></a><a1 href="{{ $kakr->subkeg_id }}"></a1><a2 href="rutin"></a2><i class="fa fa-edit"></i></button>
                      <form action="/kakrutin/{{ $kakr->kode_kak }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" data-bs-placement="top" title="Hapus KAK" onclick="return confirm('Are you sure?')"><i class="fa fa-circle-xmark"></i></button>
                      </form>
                  </td>
              </tr>
            @endif
        @endforeach
      </tbody>
    </table>
</div>

<!-- Modal Edit KAK -->
<div class="modal fade" id="editkakmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Detail KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="editkakform" action="/kak" class="mb-5">
          @method('put')
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <input type="text" name="subkeg_id" class="form-control @error('subkeg_id') is-invalid @enderror" id="editsubkeg_id" value="{{ old('subkeg_id') }}" hidden>
                  <input type="text" name="kode_kak" class="form-control @error('kode_kak') is-invalid @enderror" id="editkode_kak" value="{{ old('kode_kak') }}" hidden>
                  <div class="mb-3">
                    <label for="kelompokbelanja_slug" class="form-label">Kelompok Belanja</label>
                    <select name="kelompokbelanja_slug" class="form-control" id="editkelompokbelanja_slug">
                      @foreach ($kelompokbelanja as $kebe)
                        <option value="{{ $kebe->slug }}">{{ $kebe->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3" id="formpencetus" style="display: none;">
                      <label for="pencetuskebe_id" class="form-label">Pengusul <small>(Jika Tidak Ada Perubahan tidak perlu di pilih)</small></label>
                      <select name="pencetuskebe_id" class="form-control" size="5" id="editpencetuskebe_id">
                      </select>
                  </div>
                  <h6>Program</h6>
                  <div class="row mb-3">
                    <div class="col-md-12 mb-1">
                      <label for="name" class="form-label">Capaian Program</label>
                      <input type="text" name="icapaianprog" class="form-control @error('icapaianprog') is-invalid @enderror" id="editicapaianprog" value="{{ old('icapaianprog') }}" placeholder="Indikator">
                      @error('icapaianprog')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="volcapprog" class="form-control @error('volcapprog') is-invalid @enderror" id="editvolcapprog" value="{{ old('volcapprog') }}" placeholder="Volume">
                        @error('volcapprog')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="satcapprog" class="form-control @error('satcapprog') is-invalid @enderror" id="editsatcapprog" value="{{ old('satcapprog') }}" placeholder="Satuan">
                        @error('satcapprog')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                    </div>
                    <h6>Kegiatan</h6>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-1">
                        <label for="name" class="form-label">Hasil kegiatan</label>
                        <input type="text" name="ihaskeg" class="form-control @error('ihaskeg') is-invalid @enderror" id="editihaskeg" value="{{ old('ihaskeg') }}" placeholder="Indikator">
                        @error('ihaskeg')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="volhaskeg" class="form-control @error('volhaskeg') is-invalid @enderror" id="editvolhaskeg" value="{{ old('volhaskeg') }}" placeholder="Volume">
                          @error('volhaskeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="sathaskeg" class="form-control @error('sathaskeg') is-invalid @enderror" id="editsathaskeg" value="{{ old('sathaskeg') }}" placeholder="Satuan">
                          @error('sathaskeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-1">
                          <label for="name" class="form-label">Keluaran kegiatan</label>
                          <input type="text" name="ikeluarankeg" class="form-control @error('ikeluarankeg') is-invalid @enderror" id="editikeluarankeg" value="{{ old('ikeluarankeg') }}" placeholder="Indikator">
                          @error('ikeluarankeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="volkelkeg" class="form-control @error('volkelkeg') is-invalid @enderror" id="editvolkelkeg" value="{{ old('volkelkeg') }}" placeholder="Volume">
                          @error('volkelkeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="satkelkeg" class="form-control @error('satkelkeg') is-invalid @enderror" id="editsatkelkeg" value="{{ old('satkelkeg') }}" placeholder="Satuan">
                          @error('satkelkeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <h6>Subkegiatan</h6>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-1">
                        <label for="name" class="form-label" id="editisubkeg">Indikator Subkegiatan</label>
                      </div>
                      <div class="input-group">
                        <input type="text" name="tarsubkeg" class="form-control" id="edittarsubkeg" placeholder="Volume" aria-label="Recipient's username" aria-describedby="satsubkkeg">
                        <span class="input-group-text" id="satsubkeg"></span>
                      </div>
                    </div>
                  <div class="mb-3" id="kakform">
                    <h6>Aktivitas</h6>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Aktivitas</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editkakname" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-1">
                        <label for="name" class="form-label">Output Aktivitas</label>
                        <input type="text" name="outakti" class="form-control @error('outakti') is-invalid @enderror" id="editoutakti" value="{{ old('outakti') }}" placeholder="Indikator">
                        @error('outakti')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="voloutakti" class="form-control @error('voloutakti') is-invalid @enderror" id="editvoloutakti" value="{{ old('voloutakti') }}" placeholder="Volume">
                        @error('voloutakti')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="satoutakti" class="form-control @error('satoutakti') is-invalid @enderror" id="editsatoutakti" value="{{ old('satoutakti') }}" placeholder="Satuan">
                        @error('satoutakti')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                    </div>
                    <label for="dari" class="form-label">Waktu pelaksanaan</label>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="dari" class="form-label">Dari</label>
                          <input type="text" name="dari" class="form-control @error('dari') is-invalid @enderror" id="editdari" value="{{ old('dari') }}">
                          @error('dari')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="sampai" class="form-label">Sampai</label>
                          <input type="text" name="sampai" class="form-control @error('sampai') is-invalid @enderror" id="editsampai" value="{{ old('sampai') }}">
                          @error('sampai')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="deskrip" class="form-label">Deskripsi Aktivitas</label>
                      <textarea name="deskrip" class="form-control @error('deskrip') is-invalid @enderror" id="editdeskrip" rows="3">{{ old('deskrip') }}</textarea>
                      @error('deskrip')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="bidang_sekretariat" class="form-label">Bagian/Bidang/Sekretariat/UPTD</label>
                      <input type="text" name="bidang_sekretariat" class="form-control @error('bidang_sekretariat') is-invalid @enderror" id="editbidang_sekretariat" value="{{ old('bidang_sekretariat') }}">
                      @error('bidang_sekretariat')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="subbagdkk" class="form-label">Subbag/Seksi/Sub-koordinator</label>
                      <input type="text" name="subbagdkk" class="form-control @error('subbagdkk') is-invalid @enderror" id="editsubbagdkk" value="{{ old('subbagdkk') }}">
                      @error('subbagdkk')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
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
<!-- End Modal Edit -->

    
<script>
      
      $("#editdari").datepicker({format: "yyyy/mm/dd"});
      $("#editsampai").datepicker({format: "yyyy/mm/dd"});

      $("#tbody #editbutton").click(function(){
        var kode_kak = $(this).find("a").attr("href");
        var subkeg_id = $(this).find("a1").attr("href");
        var jeniskak = $(this).find("a2").attr("href");
        console.log(jeniskak);
        var dataurl = '';
        $("#editsubkeg_id").val(subkeg_id);
        $("#editkode_kak").val(kode_kak);

        if(jeniskak == 'gaji'){
          console.log('halo gaji');
          $("#editkakform").attr("action","/kakgaji/"+kode_kak);
          $("#kakform").css('display', 'none');
          dataurl = '/getdataedit?tbl=k_a_kgajis&whr=kode_kak&id='+kode_kak;
        }else if(jeniskak == 'rutin'){
          console.log('halo rutin');
          $("#editkakform").attr("action","/kakrutin/"+kode_kak);
          $("#kakform").css('display', 'none');
          dataurl = '/getdataedit?tbl=k_a_krutins&whr=kode_kak&id='+kode_kak;
        }else{
          console.log('halo kak');
          $("#editkakform").attr("action","/kak/"+kode_kak);
          dataurl = '/getdataedit?tbl=k_a_k_s&whr=kode_kak&id='+kode_kak;
        }

        $.ajax({
          type: 'GET',
          url: dataurl,
          success: function(data){
            console.log(data);

            var pekebe = $("#editpencetuskebe_id");

            if(data.kelompokbelanja_slug == 'pokir'){
              $("#formpencetus").css('display', 'block');

              $.ajax({
                type: 'GET',
                url: '/getpekebe?slug=pokir',
                success: function(data){
                  console.log(data);
                  if(data.length > 0){
                    var item = [];
                    item += "<option value=''>--- Pilih Pencetus ---</option>";
                    $.each(data, function(index, value){
                      var i = "<option value='"+value.id+"'>"+value.name+"</option>";
                      item += i;
                    });
                    pekebe.html(item);
                  }
                }
              });

            }else if(data.kelompokbelanja_slug == 'musrenbang'){
              $("#formpencetus").css('display', 'block');
              
              $.ajax({
                type: 'GET',
                url: '/getpekebe?slug=musrenbang',
                success: function(data){
                  console.log(data);
                  if(data.length > 0){
                    var item = [];
                    item += "<option value=''>--- Pilih Pencetus ---</option>";
                    $.each(data, function(index, value){
                      var i = "<option value='"+value.id+"'>"+value.name+"</option>";
                      item += i;
                    });
                    pekebe.html(item);
                  }
                }
              });
            }

            $("#editihaskeg").val(data.ihaskeg);
            $("#editvolhaskeg").val(data.volhaskeg);
            $("#editsathaskeg").val(data.sathaskeg);
            $("#editikeluarankeg").val(data.ikeluarankeg);
            $("#editvolkelkeg").val(data.volkelkeg);
            $("#editsatkelkeg").val(data.satkelkeg);
            $("#editicapaianprog").val(data.icapaianprog);
            $("#editvolcapprog").val(data.volcapprog);
            $("#editsatcapprog").val(data.satcapprog);
            $("#edittarsubkeg").val(data.tarsubkeg);
            $("#editkakname").val(data.name);
            $("#editoutakti").val(data.outakti);
            $("#editvoloutakti").val(data.voloutakti);
            $("#editsatoutakti").val(data.satoutakti);
            $("#editdari").val(data.dari);
            $("#editsampai").val(data.sampai);
            $("#editdeskrip").text(data.deskrip);
            $("#editbidang_sekretariat").val(data.bidang_sekretariat);
            $("#editsubbagdkk").val(data.subbagdkk);
          }
        });
      });

      $("#editkelompokbelanja_slug").change(function(){
        var kode_kak = $("#editkode_kak").val();
        var subkeg_id = $("#editsubkeg_id").val();
        var kebe = $("#editkelompokbelanja_slug").val();
        var pekebe = $("#editpencetuskebe_id");
        var nkak = $("#kakform");
        console.log(kebe);
        if(kebe == 'gaji-sttp'){
          nkak.css("display", "none");
          $("#formpencetus").css('display', 'none');
          $("#tarsubkeg").val("");
          $("#editihaskeg").val("");
          $("#editvolhaskeg").val("");
          $("#editsathaskeg").val("");
          $("#editikeluarankeg").val("");
          $("#editvolkelkeg").val("");
          $("#editsatkelkeg").val("");
          $("#editicapaianprog").val("");
          $("#editvolcapprog").val("");
          $("#editsatcapprog").val("");
          $("#editisubkeg").val("");
          $("#edittarsubkeg").val("");
          $("#editoutakti").val("");
          $("#editvoloutakti").val("");
          $("#editsatoutakti").val("");
          $("#editdari").val("");
          $("#editsampai").val("");
          $("#editdeskrip").val("");
          $("#editbidang_sekretariat").val("");
          $("#editsubbagdkk").val("");
        }else if(kebe == 'rutin-kantor-wajib'){
          nkak.css("display", "none");
          $("#formpencetus").css('display', 'none');
          $("#tarsubkeg").val("");
          $("#editihaskeg").val("");
          $("#editvolhaskeg").val("");
          $("#editsathaskeg").val("");
          $("#editikeluarankeg").val("");
          $("#editvolkelkeg").val("");
          $("#editsatkelkeg").val("");
          $("#editicapaianprog").val("");
          $("#editvolcapprog").val("");
          $("#editsatcapprog").val("");
          $("#edittarsubkeg").val("");
          $("#editkakname").val("");
          $("#editoutakti").val("");
          $("#editvoloutakti").val("");
          $("#editsatoutakti").val("");
          $("#editdari").val("");
          $("#editsampai").val("");
          $("#editdeskrip").val("");
          $("#editbidang_sekretariat").val("");
          $("#editsubbagdkk").val("");
        }else{
          if(kebe == 'pokir'){
            $("#formpencetus").css('display', 'block');
          }else if(kebe == 'musrenbang'){
            $("#formpencetus").css('display', 'block');
          }else{
            $("#formpencetus").css('display', 'none');
          }
          nkak.css("display", "block");
          $("#tarsubkeg").val("");
          $("#editihaskeg").val("");
          $("#editvolhaskeg").val("");
          $("#editsathaskeg").val("");
          $("#editikeluarankeg").val("");
          $("#editvolkelkeg").val("");
          $("#editsatkelkeg").val("");
          $("#editicapaianprog").val("");
          $("#editvolcapprog").val("");
          $("#editsatcapprog").val("");
          $("#edittarsubkeg").val("");
          $("#editkakname").val("");
          $("#editoutakti").val("");
          $("#editvoloutakti").val("");
          $("#editsatoutakti").val("");
          $("#editdari").val("");
          $("#editsampai").val("");
          $("#editdeskrip").val("");
          $("#editbidang_sekretariat").val("");
          $("#editsubbagdkk").val("");
        }

        $.ajax({
          type: 'GET',
          url: '/getpekebe?slug='+kebe,
          success: function(data){
            if(data.length > 0){
              var item = [];
              item += "<option value=''>--- Pilih Pencetus ---</option>";
              $.each(data, function(index, value){
                var i = "<option value='"+value.id+"'>"+value.name+"</option>";
                item += i;
              });
              pekebe.html(item);
            }else{
              var item = [];
              item += "<option value=''>--- Pilih Pencetus ---</option>";
              pekebe.html(item);
            }
          }
        });
      });
</script>

@endsection