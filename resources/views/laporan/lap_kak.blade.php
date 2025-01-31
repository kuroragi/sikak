@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan KAK</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header text-white bg-info rounded-top"></div>
      <div class="card-body">
        <div class="mb-2">
          <label class="form-label" for="">Jenis Laporan</label>
          <form action="/laporan_kak">
            <div class="input-group">
              <select name="laporan_per" class="form-select" id="getlaporan_per">
                <option @if(request('laporan_per') == 'semua') selected @endif value="semua">Semua</option>
                <option @if(request('laporan_per') == 'Per_skpd') selected @endif value="Per_skpd">Per SKPD</option>
                <option @if(request('laporan_per') == 'Per_program') selected @endif value="Per_program">Per Program</option>
                <option @if(request('laporan_per') == 'Per_kegiatan') selected @endif value="Per_kegiatan">Per Kegiatan</option>
                <option @if(request('laporan_per') == 'Per_subkegiatan') selected @endif value="Per_subkegiatan">Per Sub Kegiatan</option>
                <option @if(request('laporan_per') == 'Per_kak') selected @endif value="Per_kak">Per KAK</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>
        <div class="mb-2">
          <label class="form-label" for="">SKPD</label>
          <form action="/laporan_kak">
            <div class="input-group">
              <input type="hidden" name="laporan_per" value="{{ request('laporan_per') }}">
              <select name="skpd" class="form-select" id="getskpd">
                <option value="semua">Semua</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>
        <div class="mb-2" id="programdiv">
          <label class="form-label" for="">Program</label>
          <select name="program" class="form-select" id="getprogram">
            <option value="semua">Semua</option>
          </select>
        </div>
        <div class="mb-2" id="kegiatandiv">
          <label class="form-label" for="">Kegiatan</label>
          <select name="kegiatan" class="form-select" id="getkegiatan">
            <option value="semua">Semua</option>
          </select>
        </div>
        <div class="mb-2" id="subkegiatandiv">
          <label class="form-label" for="">Sub Kegiatan</label>
          <select name="subkegiatan" class="form-select" id="getsubkegiatan">
            <option value="semua">Semua</option>
          </select>
        </div>
      </div>
      <div class="card-footer bg-info rounded-bottom text-end text-white">
      </div>
    </div>
  </div>
</div>

    
<script>

  $(document).ready(function () {
    $("#getlaporan_per").change(function (e) { 
      e.preventDefault();
      
      var per = $(this).val();
      var pdiv = $("#programdiv");
      var kdiv = $("#kegiatandiv");
      var sdiv = $("#subkegiatandiv");
      if(per == "per_subkegiatan")
    });
  });

</script>

@endsection