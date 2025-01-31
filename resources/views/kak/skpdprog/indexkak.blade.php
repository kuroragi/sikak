@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">KAK {{ $subkeg->ket }}{{ $periode->periode }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">
  @if (auth()->user()->role_slug == 'askpd')
    <a href="/skpdprog?periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
    @if ($periode->proses == 'berjalan')
      <button class="btn btn-block btn-primary" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><a subkeg="{{ $subkeg->kode }}" indikator="{{ $subkeg->indikator }}" satuan="{{ $subkeg->satuan->satuan }}" prog="{{ substr($subkeg->kode, 0, 7) }}"  keg="{{ substr($subkeg->kode, 0, 11) }}"></a><i class="fa fa-plus"></i> Tambah KAK</button>
    @endif
    <button class="btn btn-block btn-primary" id="printout" data-bs-toggle="modal" data-bs-target="#printoutmodal"><i class="fa fa-print"></i>  Print Semua Laporan {{ strtoupper(request('tipe')) }} {{ $subkeg->ket }}</button>
  @elseif (auth()->user()->role_slug == 'admin' || auth()->user()->role_slug == 'pengampu')
    <a href="/skpdprogs?kode_skpd={{ request('kode_skpd') }}&kode={{ $subkeg->kegprog->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
    <button class="btn btn-block btn-primary" id="addbutton" data-bs-toggle="modal" data-bs-target="#addmodal"><a subkeg="{{ $subkeg->kode }}" indikator="{{ $subkeg->indikator }}" satuan="{{ $subkeg->satuan->satuan??'' }}" prog="{{ substr($subkeg->kode, 0, 7) }}"  keg="{{ substr($subkeg->kode, 0, 11) }}"></a><i class="fa fa-plus"></i> Tambah KAK</button>
  @else
    <a href="/skpdprogs?kode_skpd={{ request('kode_skpd') }}&kode={{ $subkeg->kegprog->kode }}&periode={{ request('periode') }}"><button class="btn btn-block btn-warning"><i class="fa fa-angles-left"></i> Kembali</button></button></a>
  @endif
    <table class="table table-striped table-sm-9 mt-3" id="tbl">
      <thead class="bg-info">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Aktivitas</th>
          <th scope="col">Kelompok Belanja</th>
          <th scope="col">Pencetus</th>
          <th scope="col">Bidang</th>
          <th scope="col" colspan="2">NIlai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($kak as $k)
          <tr class="text-align-center fs-7 @if($k->kebutuhanakt->sum('berubah') > 0) bg-yellow @endif">
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $k->ket }}</td>
              <td>{{ $k->kelompokbelanja->ket }}</td>
              <td>{{ $k->pencetus->pencetus ?? '' }}</td>
              <td class="text-wrap">{{ $k->subunit->name ?? '' }}</td>
              <td class="p-0 m-0">Rp.</td>
              <td class="text-end">
                @if ($periode->sesi == 'rka')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_rka'))) }}
                @elseif ($periode->sesi == 'kuappas')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_kuappas'))) }}
                @elseif ($periode->sesi == 'apbd')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_apbd'))) }}
                @elseif ($periode->sesi == 'final')
                  {{ str_replace(',', '.', number_format($k->kebutuhanakt->sum('total_final'))) }}
                @endif
              </td>
              <td class="text-center"><a href="/kak?kode_skpd={{ request('kode_skpd') }}&kode={{ $k->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih KAK"><i class="fa fa-eye"></i> Lihat KAK</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

<!-- Modal Add KAK -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah KAK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="addkakform" action="/kak" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                  <input type="text" name="kode_subkeg" class="form-control @error('kode_subkeg') is-invalid @enderror" id="addkode_subkeg" value="{{ old('kode_subkeg') }}" hidden>
                  <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" id="addperiode" value="{{ old('periode', request('periode')) }}" hidden>
                  <input type="text" name="kode_skpd" class="form-control @error('kode_skpd') is-invalid @enderror" id="addkode_skpd" value="{{ old('kode_skpd', request('kode_skpd')) }}" hidden>
                  <div class="mb-3">
                    <label for="kelompokbelanja_id" class="form-label">Kelompok Belanja</label>
                    <select name="kelompokbelanja_id" class="form-control" id="addkelompokbelanja_id">
                      @foreach ($kelompokbelanja as $kebe)
                          <option value="{{ $kebe->id }}">{{ $kebe->ket }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3" id="formpencetus" style="display: none;">
                      <label for="pencetuskebe_id" class="form-label">Pengusul</label>
                      <select name="pencetuskebe_id" class="form-control" size="5" id="addpencetuskebe_id">
                      </select>
                  </div>
                  <h6>Program</h6>
                  <div class="row mb-3">
                    <div class="col-md-12 mb-1">
                      <label for="name" class="form-label">Capaian Program <i class="fa fa-question-circle" title="Intermediate outcome level Bidang pada cascading"></i> <small class="text-danger">*Jika indikator atau target tidak sesuai bisa diubah</small></label>
                      <input type="text" name="icapaianprog" class="form-control @error('icapaianprog') is-invalid @enderror" id="addicapaianprog" value="{{ old('icapaianprog') }}" placeholder="Indikator">
                      @error('icapaianprog')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="volcapprog" class="form-control @error('volcapprog') is-invalid @enderror" id="addvolcapprog" value="{{ old('volcapprog') }}" placeholder="Volume">
                        @error('volcapprog')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="satcapprog" class="form-control @error('satcapprog') is-invalid @enderror" id="addsatcapprog" value="{{ old('satcapprog') }}" placeholder="Satuan">
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
                        <label for="name" class="form-label">Hasil kegiatan <i class="fa fa-question-circle" title="Intermediate outcome level eselon 4 pada cascading"></i> <small class="text-danger">*Jika indikator atau target tidak sesuai bisa diubah</small></label>
                        <input type="text" name="ihaskeg" class="form-control @error('ihaskeg') is-invalid @enderror" id="addihaskeg" value="{{ old('ihaskeg') }}" placeholder="Indikator">
                        @error('ihaskeg')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="volhaskeg" class="form-control @error('volhaskeg') is-invalid @enderror" id="addvolhaskeg" value="{{ old('volhaskeg') }}" placeholder="Volume">
                          @error('volhaskeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="sathaskeg" class="form-control @error('sathaskeg') is-invalid @enderror" id="addsathaskeg" value="{{ old('sathaskeg') }}" placeholder="Satuan">
                          @error('sathaskeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-1">
                          <label for="name" class="form-label">Keluaran kegiatan <i class="fa fa-question-circle" title="Intermediate outcome level eselon 4 pada cascading"></i> <small class="text-danger">*Jika indikator atau target tidak sesuai bisa diubah</small></label>
                          <input type="text" name="ikeluarankeg" class="form-control @error('ikeluarankeg') is-invalid @enderror" id="addikeluarankeg" value="{{ old('ikeluarankeg') }}" placeholder="Indikator">
                          @error('ikeluarankeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="volkelkeg" class="form-control @error('volkelkeg') is-invalid @enderror" id="addvolkelkeg" value="{{ old('volkelkeg') }}" placeholder="Volume">
                          @error('volkelkeg')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="col-xl-6">
                          <input type="text" name="satkelkeg" class="form-control @error('satkelkeg') is-invalid @enderror" id="addsatkelkeg" value="{{ old('satkelkeg') }}" placeholder="Satuan">
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
                        <label for="name" class="form-label" id="addisubkeg">{{ $subkeg->indikator }} <i class="fa fa-question-circle" title="Diambil dari output subkegiatan pada kemendagri 050-5889 th. 2021/ perubahan permendagri 90 th 2020"></i> </label>
                      </div>
                      <div class="input-group">
                        <input type="text" name="tarsubkeg" class="form-control" placeholder="Volume" aria-label="Recipient's username" aria-describedby="satsubkkeg">
                        <span class="input-group-text" id="satsubkeg"></span>
                      </div>
                    </div>
                  <div class="mb-3" id="kakform">
                    <h6>Aktivitas</h6>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Nama Aktivitas <i class="fa fa-question-circle" title="Aktivitas yang dilaksanakan dalam pelaksanaan subkegiatan seperti: pembangunan sekolah..., pelatihan..., sosialisasi...)"></i> </label>
                        <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" id="addkakket" value="{{ old('ket') }}" autofocus>
                        @error('ket')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-1">
                        <label for="name" class="form-label">Output Aktivitas <i class="fa fa-question-circle" title="Barang, jasa, dan orang yang dihasilkan dari aktivitas subkegiatan"></i> </label>
                        <input type="text" name="outakti" class="form-control @error('outakti') is-invalid @enderror" id="addoutakti" value="{{ old('outakti') }}" placeholder="Indikator">
                        @error('outakti')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="voloutakti" class="form-control @error('voloutakti') is-invalid @enderror" id="addvoloutakti" value="{{ old('voloutakti') }}" placeholder="Volume">
                        @error('voloutakti')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <input type="text" name="satoutakti" class="form-control @error('satoutakti') is-invalid @enderror" id="addsatoutakti" value="{{ old('satoutakti') }}" placeholder="Satuan">
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
                          <input type="text" name="dari" class="form-control @error('dari') is-invalid @enderror" id="adddari" value="{{ old('dari') }}">
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
                          <input type="text" name="sampai" class="form-control @error('sampai') is-invalid @enderror" id="addsampai" value="{{ old('sampai') }}">
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
                      <textarea name="deskrip" class="form-control @error('deskrip') is-invalid @enderror" id="adddeskrip" rows="3">{{ old('deskrip') }}</textarea>
                      @error('deskrip')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="lokasi" class="form-label">Lokasi</label>
                      <select name="lokasi" id="" class="form-control @error('lokasi') is-invalid @enderror" id="addlokasi">
                          <option value="">Pilih Lokasi</option>
                          @foreach ($lokasi as $lok)
                            <option value="{{ $lok->id }}">{{ $lok->ket }}</option>
                          @endforeach
                      </select>
                      @error('lokasi')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="bidang_sekretariat" class="form-label">Bagian/Bidang/Sekretariat/UPTD</label>
                      <input type="text" name="bidang_sekretariat" class="form-control @error('bidang_sekretariat') is-invalid @enderror" id="addbidang_sekretariat" @if(auth()->user()->role_slug == 'askpd') value="{{ old('bidang_sekretariat', auth()->user()->kode_sub) }}" @else value="{{ old('bidang_sekretariat') }}" @endif hidden>
                      <select class="form-control @error('bidang_sekretariat') is-invalid @enderror" id="addselectbidang_sekretariat" @if(auth()->user()->role_slug == 'askpd') disabled @endif>
                          <option value="{{ $subunit[0]->kode }}">Pilih Bidang</option>
                        @foreach ($subunit as $sub)
                          <option value="{{ $sub->kode }}" @if($sub->kode == auth()->user()->kode_sub) selected @endif>{{ $sub->name }}</option>
                        @endforeach
                      </select>
                      @error('bidang_sekretariat')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="subbagdkk" class="form-label">Subbag/Seksi/Sub-koordinator</label>
                      <input type="text" name="subbagdkk" class="form-control @error('subbagdkk') is-invalid @enderror" id="addsubbagdkk" value="{{ old('subbagdkk') }}">
                      @error('subbagdkk')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->


<div class="modal fade" id="printoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Data Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/cetaklaporan?tipe={{ request('tipe') }}&getlaporan=subkeg&kode_skpd={{ request('kode_skpd') }}&kode={{ $subkeg->kode }}&periode={{ request('periode') }}" class="mb-5">
          @csrf
          <div class="row">
              <div class="col col-xl-12">
                <div class="mb-3">
                  <label for="jenisdata" class="form-label">Jenis Data</label>
                  <select name="jenisdata" class="form-select" id="jenisdata">
                    <option value="kak">KAK</option>
                    <option value="rekap">Rekap</option>
                    <option value="rka">Pra RKA</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jenisprint" class="form-label">Jenis Print Out</label>
                  <select name="jenisprint" class="form-select" id="jenisprint">
                      <option value="pdf">PDF</option>
                      <option value="excel">Excel</option>
                  </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Cetak</button>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  $("#adddari").datepicker({format: "yyyy/mm/dd"});
  $("#addsampai").datepicker({format: "yyyy/mm/dd"});

  $("#addbutton").click(function(){
    var id = $(this).find("a").attr("subkeg");
    var ind = $(this).find("a").attr("indekator");
    var sat = $(this).find("a").attr("satuan");
    $("#addkode_subkeg").val(id);
    $("#addisubkeg").text(ind);
    $("#satsubkeg").text(sat);

    var idrpjmd = '';

    $.ajax({
      type: 'GET',
      async: false,
      url: '/getprpjmd?tahun='+{{ request('periode') }},
      success: function (data) {
        idrpjmd = data.id;
      }
    });

    var prog = $(this).find("a").attr("prog");
    var icap = $("#addmodal #addicapaianprog");
    var tarcap = $("#addmodal #addvolcapprog");
    var satcap = $("#addmodal #addsatcapprog");

    console.log(prog);

    $.ajax({
      type: 'GET',
      url: '/getdataedit2?tbl=indikators&whr=kode_perencanaan&id='+prog+'&whr2=id_rpjmd&id2='+idrpjmd,
      success: function (data) {

        icap.val(data.indikator);
        tarcap.val(data.target);
        satcap.val(data.satuan);
      }
    });

    var keg = $(this).find("a").attr("keg");
    var ikeg = $("#addmodal #addihaskeg");
    var ikkeg = $("#addmodal #addikeluarankeg");
    var tarkeg = $("#addmodal #addvolhaskeg");
    var tarkkeg = $("#addmodal #addvolkelkeg");
    var satkeg = $("#addmodal #addsathaskeg");
    var satkkeg = $("#addmodal #addsatkelkeg");

    $.ajax({
      type: 'GET',
      url: '/getdataedit?tbl=indikators&whr=kode_perencanaan&id='+keg+'&whr2=id_rpjmd&id2='+idrpjmd,
      success: function (data) {
        ikeg.val(data.indikator);
        ikkeg.val(data.indikator);
        tarkeg.val(data.target);
        tarkkeg.val(data.target);
        satkeg.val(data.satuan);
        satkkeg.val(data.satuan);
      }
    });

  });

  $("#addkelompokbelanja_id").change(function(){
    var kebe = $("#addkelompokbelanja_id").val();
    var pekebe = $("#addpencetuskebe_id");
    var nkak = $("#kakform");
    console.log(kebe);

    if(kebe == '2'){
      nkak.css("display", "none");
    }else if(kebe == '3'){
      nkak.css("display", "none");
    }else{
      if(kebe == '7'){
        $("#formpencetus").css('display', 'block');
      }else if(kebe == '8'){
        $("#formpencetus").css('display', 'block');
      }else{
        $("#formpencetus").css('display', 'none');
      }
      nkak.css("display", "block");
    }

    $.ajax({
      type: 'GET',
      url: '/getdata?tbl=pencetuskebes&whr=kebe_id&id='+kebe,
      success: function(data){
        if(data.length > 0){
          var item = [];
          item += "<option value=''>--- Pilih Pencetus ---</option>";
          $.each(data, function(index, value){
            var i = "<option value='"+value.id+"'>"+value.pencetus+"</option>";
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

  $("#addselectbidang_sekretariat").change(function (e) { 
    e.preventDefault();

    var bidangselect = $(this).val();
    var bidang = $("#addbidang_sekretariat");

    bidang.val(bidangselect);
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