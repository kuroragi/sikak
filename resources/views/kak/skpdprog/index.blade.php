@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SKPD</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="table-responsive col-lg-12">

    <form action="/skpdprog" class="mb-3">
      <div class="row justify-content-center">
        <div class="col col-8">
          <div class="input-group">
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

    @if(request('periode'))
    <table class="table table-striped table-sm-9" id="tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama SKPD</th>
          <th scope="col" colspan="2">Nilai Pagu (Rp.)</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($skpd as $s)
          <tr @php
            $berubah = 0;
            foreach ($s->biduruses as $sb){
              foreach ($sb->progbid as $p){
                foreach ($p->kegprog as $kp) {
                  foreach ($kp->subkeg as $sk) {
                    foreach ($sk->kak as $k) {
                      $berubah += $k->kebutuhanakt->sum('berubah');
                    }
                  }
                }
              }
            }
          @endphp class="text-align-center @if($berubah > 0) bg-yellow @endif">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $s->name }}</td>
              <td class="p-0 m-0">Rp.</td>
              <td class="text-end">
                @php
                    $total = 0;
                @endphp
                @foreach ($s->biduruses as $sb)
                    @foreach ($sb->progbid as $p)
                      @foreach ($p->kegprog as $kp)
                        @php
                          foreach ($kp->subkeg as $sk) {
                            foreach ($sk->kak->where('kode_skpd', $s->kode) as $k) {
                              if($_periode->sesi == 'rka'){
                                $total += $k->kebutuhanakt->sum('total_rka');
                              }else if($_periode->sesi == 'kuappas'){
                                $total += $k->kebutuhanakt->sum('total_kuappas');
                              }else if($_periode->sesi == 'apbd'){
                                $total += $k->kebutuhanakt->sum('total_apbd');
                              }else if($_periode->sesi == 'final'){
                                $total += $k->kebutuhanakt->sum('total_final');
                              }
                            }
                          }
                        @endphp
                      @endforeach
                    @endforeach
                @endforeach
                {{ str_replace(',', '.', number_format($total)) }}
              </td>
              <td><a href="/skpdprogp?kode_skpd={{ $s->kode }}&periode={{ request('periode') }}"><button class="badge bg-info border-0" title="Pilih SKPD"><i class="fa fa-eye"></i> Lihat SKPD</button></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
</div>

@endsection