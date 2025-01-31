<?php

namespace App\Http\Controllers;

use App\BidangSkpd;
use App\Bidurus;
use App\Datakeg;
use App\Exports\LaporanSkpdExportView;
use App\Exports\LaporanProgbidExportView;
use App\Exports\LaporanKegprogExportView;
use App\Exports\LaporanSubkegExportView;
use App\Exports\LaporanKAKExportView;
use App\Instrumen;
use App\Kak;
use App\Kegprog;
use App\Kelompokbelanja;
use App\Lokasi;
use App\Periode;
use App\Personil;
use App\Progbid;
use App\Satuan;
use App\SKPD;
use App\Sksu;
use App\Subkeg;
use App\Urusan;
use App\Usulansbu;
use App\Usulanssh;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function skpd()
    {
        $_periode = Periode::where('periode', request('periode'))->first();
        if($_periode == ''){
            $sesi = 'tipe_rka';
        }else if ($_periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($_periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($_periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($_periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }

        if(auth()->user()->kode_skpd != ''){
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function ($query) {
                        $query->where('kode_skpd', auth()->user()->kode_skpd);
                    },'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', auth()->user()->kode_skpd)->get();
        }else{
            $skpd =SKPD::with(['biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
             }])->get();
        }
        return view('laporan.skpd', [
            'periode' => Periode::all(),
            'skpd' => $skpd,
            '_periode' => $_periode,
        ]);
    }

    public function usulanskpd()
    {
        $skpd = SKPD::with(['usulanssh' => function($query){$query->where('periode', request('periode'));}, 'usulansbu' => function($query){$query->where('periode', request('periode'));}])->get();
        $ttssh = Usulanssh::where('kode_skpd', '')->where('periode', request('periode'))->get();
        $ttsbu = Usulansbu::where('kode_skpd', '')->where('periode', request('periode'))->get();

        return view('laporan.usulanskpd', [
            'periode' => Periode::all(),
            'skpd' => $skpd,
            'ttsbu' => $ttsbu,
            'ttssh' => $ttssh,
        ]);
    }

    public function lokasi(){
        $lokasilv1 = Kak::with(['kebutuhanakt'])->where('periode', request('periode'))->get();
        $lokasilv2 = Lokasi::with(['kak' => function($query){$query->with(['kebutuhanakt'])->where('periode', request('periode'));}, 'clokasi' => function($query){$query->with(['kak'=>function($query){$query->with(['kebutuhanakt'])->where('periode', request('periode'));}]);}])->where('lv', 2)->get();
        $lokasilv3 = Lokasi::with(['kak' => function($query){$query->with(['kebutuhanakt'])->where('periode', request('periode'));}])->where('lv', 3)->get();
        $nonlokasi = Kak::with(['kebutuhanakt'])->WhereNull('lokasi')->where('periode', request('periode'))->get();
        $allkak = Kak::with(['kebutuhanakt'])->where('periode', request('periode'))->get();
        $periode = Periode::all();
        $_periode = Periode::where('periode', request('periode'))->first();

        return view('laporan.lokasi', [
            'lokasilv1' => $lokasilv1,
            'lokasilv2' => $lokasilv2,
            'lokasilv3' => $lokasilv3,
            'nonlokasi' => $nonlokasi,
            'allkak' => $allkak,
            'periode' => $periode,
            '_periode' => $_periode
        ]);
    }

    public function lokasiSkpd(Request $request)
    {
        $lokasi = lokasi::where('id', request('lokasi'))->first();
        $lokasichild = lokasi::where('parent', request('lokasi'))->get();
        if($lokasi->lv == 1){
            $skpd = SKPD::with(['kak' => function($query){$query->with(['kebutuhanakt', 'kelompokbelanja'])->where('periode', request('periode'))->where('lokasi', 1)->orderBy('kelompokbelanja_id');}])->get();
        }else if($lokasi->lv == 2){
            $clokasi = lokasi::where('parent', $lokasi->id)->get();
            $clokasiid = collect([2]);
            foreach($clokasi as $c){
                $clokasiid->push($c->id);
            }
            $skpd = SKPD::with(['kak' => function($query) use ($clokasiid){$query->with(['kebutuhanakt', 'kelompokbelanja'])->where('periode', request('periode'))->whereIn('lokasi', $clokasiid)->orderBy('kelompokbelanja_id');}])->get();
        }else if($lokasi->lv == 3){
            $skpd = SKPD::with(['kak' => function($query){$query->with(['kebutuhanakt', 'kelompokbelanja'])->where('periode', request('periode'))->where('lokasi', request('lokasi'))->orderBy('kelompokbelanja_id');}])->get();
        }
        $kebe = Kelompokbelanja::orderBy('urutan')->get();
        $_periode = Periode::where('periode', request('periode'))->first();

        return view('laporan.lokasiskpd', [
            'lokasi' => $lokasi,
            'lokasichild' => $lokasichild,
            'skpd' => $skpd,
            'kebe' => $kebe,
            '_periode' => $_periode
        ]);
    }

    public function program()
    {
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }

        $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function($query){
                    $query->where('kode_skpd', request('kode_skpd'));
                }, 'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                    $query->where('periode', request('periode'))->where($sesi, '<', 3);
                }])->where('kode', request('kode_skpd'))->first();

        return view('laporan.program', [
            'skpd' => $skpd,
            'periode' => Periode::where('periode', request('periode'))->first()
        ]);
    }

    public function kegiatan(){
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }

        return view('laporan.kegiatan', [
            'progbid' => Progbid::where('kode', request('kode'))->first(),
            'kegprog' => Kegprog::with(['subkeg.kak' => function($query){
                        $query->where('kode_skpd', request('kode_skpd'));
                    },'subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode_progbid', request('kode'))->get(),
            'periode' => $periode,
        ]);
    }

    public function subkeg(){
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }

        return view('laporan.subkeg', [
            'kegprog' => Kegprog::with(['progbid'])->where('kode', request('kode'))->first(),
            'subkeg' => Subkeg::with(['kak' => function($query){
                        $query->where('kode_skpd', request('kode_skpd'));
                    },'kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode_kegprog', request('kode'))->get(),
            'periode' => $periode,
        ]);
    }

    public function kak(){
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }

        return view('laporan.kak', [
            'subkeg' => Subkeg::with(['satuan', 'kegprog'])->where('kode', request('kode'))->first(),
            'kak' => Kak::with(['kebutuhanakt' => function ($query) use ($sesi) {
                    $query->where('periode', request('periode'))->where($sesi, '<', 3);
                }])->where('kode_subkeg', request('kode'))->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'))->orderBy('kelompokbelanja_id')->get(),
            'periode' => $periode,
            'kelompokbelanja' => Kelompokbelanja::all()
        ]);
    }

    public function cek(){
        $kak = Kak::with(['subkeg.satuan'])->where('kode', request('kode'))->first();
        $subkeg = Subkeg::where('kode', $kak->kode_subkeg)->first();
        $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
        $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
        $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
        $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
        $skpd = SKPD::where('kode', request('kode_skpd'))->first();
        return view('laporan.cekkak', [
            'kak' => $kak->load([
                'tahap.aktivitas.personalakt' => function ($query) {
                    $query->with('personil');
                },
                'tahap.aktivitas.instruakt' => function ($query) {
                    $query->with('instrumen');
                },
                'tahap.aktivitas.dataakt' => function ($query) {
                    $query->with('datakeg');
                },
                'tahap.aktivitas.kebutuhanakt' => function ($query) {
                    $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                }
            ]),
            'subkeg' => $subkeg,
            'skpd' => $skpd,
            'periode' => Periode::where('periode', request('periode'))->first()
        ]);
    }

    public function cetak(Request $request){
        if(request('getlaporan') == 'skpd'){
            if ($request->jenisdata == 'kak') {
                if(auth()->user()->role_slug == 'askpd'){
                    $skpd = SKPD::with(['biduruses.urusan', 'biduruses.progbid.kegprog.subkeg.kak' => function($query){$query->with([
                        'tahap.aktivitas.personalakt' => function ($query) {
                        $query->with('personil');
                        },
                        'tahap.aktivitas.instruakt' => function ($query) {
                            $query->with('instrumen');
                        },
                        'tahap.aktivitas.dataakt' => function ($query) {
                            $query->with('datakeg');
                        },
                        'tahap.aktivitas.kebutuhanakt' => function ($query) {
                            $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                        }])->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', auth()->user()->kode_skpd)->first();
                }else{
                    $skpd = SKPD::with(['biduruses.urusan', 'biduruses.progbid.kegprog.subkeg.kak' => function($query){$query->with([
                        'tahap.aktivitas.personalakt' => function ($query) {
                        $query->with('personil');
                        },
                        'tahap.aktivitas.instruakt' => function ($query) {
                            $query->with('instrumen');
                        },
                        'tahap.aktivitas.dataakt' => function ($query) {
                            $query->with('datakeg');
                        },
                        'tahap.aktivitas.kebutuhanakt' => function ($query) {
                            $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                        }])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode_skpd'))->first();
                }
                $periode = Periode::where('periode', request('periode'))->first();
                if($request->jenisprint == 'excel'){
                    return Excel::download(new LaporanSkpdExportView([
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'jenis' => $request->jenisprint]),
                        'cetaklaporan.xlsx');
                }else if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakkakskpd', [
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                    return $pdf->download('LaporanKAK.pdf');
                }
            }else if ($request->jenisdata == 'rka') {
                //
            }else if ($request->jenisdata == 'rekap') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                if(auth()->user()->role_slug == 'askpd'){
                    $skpd = SKPD::with(['biduruses.urusan', 'biduruses.progbid.kegprog.subkeg.kak' => function($query){$query->with(['kebutuhanakt'])->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', auth()->user()->kode_skpd)->first();
                    
                    $data = [ 
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'sesi' => $sesi,
                        'sksu' => Sksu::with(['subkeg.satuan'])->where('kode_subunit', auth()->user()->kode_sub)->get(),
                        'jenis' => $request->jenisprint
                    ];
                }else{
                    $skpd = SKPD::with(['biduruses.urusan', 'biduruses.progbid.kegprog.subkeg.kak' => function($query){$query->with(['kebutuhanakt'])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode_skpd'))->first();
                
                    $data = [ 
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'sesi' => $sesi,
                        'jenis' => $request->jenisprint
                    ];
                }
                            
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrekapskpd', $data)->setPaper('A4', 'landscape');
    
                    return $pdf->download('LaporanRekapSKPD.pdf');
                }
            }

        }else if(request('getlaporan') == 'progbid'){

            if ($request->jenisdata == 'kak') {
                $progbid = Progbid::with(['kegprog.subkeg.kak' => function($query){$query->with([
                        'tahap.aktivitas.personalakt' => function ($query) {
                        $query->with('personil');
                        },
                        'tahap.aktivitas.instruakt' => function ($query) {
                            $query->with('instrumen');
                        },
                        'tahap.aktivitas.dataakt' => function ($query) {
                            $query->with('datakeg');
                        },
                        'tahap.aktivitas.kebutuhanakt' => function ($query) {
                            $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                        }])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', request('kode_skpd'))->first();
                $periode = Periode::where('periode', request('periode'))->first();

                if($request->jenisprint == 'excel'){
                    return Excel::download(new LaporanSkpdExportView([
                        'progbid' => $progbid, 
                        'bidurus' => $bidurus, 
                        'urusan' => $urusan, 
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'jenis' => $request->jenisprint]),
                        'cetaklaporan.xlsx');
                }else if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakkakprogbid', [
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                    return $pdf->download('LaporanKAK.pdf');
                }
            }else if ($request->jenisdata == 'rka') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                
                $progbid = Progbid::with(['kegprog.subkeg.kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();

                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', request('kode_skpd'))->first();

                $indikator_penanda = 'a.kode_skpd';
                $kode_penanda = request('kode_skpd');

                $kodesubkeg = [];

                foreach($progbid->kegprog as $kegprog){
                    foreach($kegprog->subkeg as $s){
                        array_push($kodesubkeg, $s->kode);
                    }
                }

                $rekap = DB::table('kaks as a')
                            ->selectRaw('a.kode_subkeg, a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, sum(b.'.$sesi['jml'].') as jumlah, sum(b.'.$sesi['total'].') as total, c.ket as sshket, c.id_rek as sshrek, c.spek as sshspek, d.ket as sbuket, d.id_rek as sburek, e.ket as usshket, f.ket as usbuket, g.satuan as satkeb, h.satuan as satssh, i.satuan as satsbu, j.satuan as satussh, k.satuan as satusbu')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('sshes as c', 'b.kode_item', 'c.id')
                            ->leftJoin('sbus as d', 'b.kode_item', 'd.id')
                            ->leftJoin('usulansshes as e', 'b.kode_item', 'e.id')
                            ->leftJoin('usulansbus as f', 'b.kode_item', 'f.id')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->leftJoin('satuans as h', 'c.satuan_id', 'h.id')
                            ->leftJoin('satuans as i', 'd.satuan_slug', 'i.id')
                            ->leftJoin('satuans as j', 'e.satuan_id', 'j.id')
                            ->leftJoin('satuans as k', 'f.satuan_id', 'k.id')
                            ->whereIn('a.kode_subkeg', $kodesubkeg)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->groupBy('kode_subkeg')
                            ->groupBy('tipe_keb')
                            ->groupBy('kode_item')
                            ->get();
                $rekapother = DB::table('kaks as a')
                            ->selectRaw('a.kode_subkeg, a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, b.'.$sesi['jml'].' as jumlah, b.'.$sesi['total'].' as total, g.satuan as satkeb')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->whereIn('a.kode_subkeg', $kodesubkeg)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->whereRaw('(b.tipe_keb = "other" OR b.tipe_keb = "gaji")')
                            ->get();
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrkaprogbid', [ 
                    'rekap' => $rekap,
                    'rekapother' => $rekapother,
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4');

                    return $pdf->download('LaporanPraRKASubkegiatan.pdf');
                }

            }else if ($request->jenisdata == 'rekap') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                $progbid = Progbid::with(['kegprog.subkeg.kak' => function($query){$query->with(['kebutuhanakt'])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();

                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', request('kode_skpd'))->first();
                            
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrekapprogbid', [ 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'sesi' => $sesi,
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');
    
                    return $pdf->download('LaporanRekapProgram.pdf');
                }
            } 

        }else if(request('getlaporan') == 'kegprog'){

            if ($request->jenisdata == 'kak') {
                $kegprog = Kegprog::with(['subkeg.kak' => function($query){$query->with([
                        'tahap.aktivitas.personalakt' => function ($query) {
                        $query->with('personil');
                        },
                        'tahap.aktivitas.instruakt' => function ($query) {
                            $query->with('instrumen');
                        },
                        'tahap.aktivitas.dataakt' => function ($query) {
                            $query->with('datakeg');
                        },
                        'tahap.aktivitas.kebutuhanakt' => function ($query) {
                            $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                        }])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', $bu->kode_skpd)->first();
                $periode = Periode::where('periode', request('periode'))->first();

                if($request->jenisprint == 'excel'){
                    return Excel::download(new LaporanKegprogExportView([
                        'kegprog' => $kegprog, 
                        'progbid' => $progbid, 
                        'bidurus' => $bidurus, 
                        'urusan' => $urusan, 
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'jenis' => $request->jenisprint]),
                        'cetaklaporan.xlsx');
                }else if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakkakkegprog', [
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                    return $pdf->download('LaporanKAK.pdf');
                }
            }else if ($request->jenisdata == 'rka') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                
                $kegprog = Kegprog::with(['subkeg.kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();

                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', request('kode_skpd'))->first();

                $indikator_penanda = 'a.kode_skpd';
                $kode_penanda = request('kode_skpd');

                $kodesubkeg = [];

                foreach($kegprog->subkeg as $s){
                    array_push($kodesubkeg, $s->kode);
                }

                $rekap = DB::table('kaks as a')
                            ->selectRaw('a.kode_subkeg, a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, sum(b.'.$sesi['jml'].') as jumlah, sum(b.'.$sesi['total'].') as total, c.ket as sshket, c.id_rek as sshrek, c.spek as sshspek, d.ket as sbuket, d.id_rek as sburek, e.ket as usshket, f.ket as usbuket, g.satuan as satkeb, h.satuan as satssh, i.satuan as satsbu, j.satuan as satussh, k.satuan as satusbu')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('sshes as c', 'b.kode_item', 'c.id')
                            ->leftJoin('sbus as d', 'b.kode_item', 'd.id')
                            ->leftJoin('usulansshes as e', 'b.kode_item', 'e.id')
                            ->leftJoin('usulansbus as f', 'b.kode_item', 'f.id')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->leftJoin('satuans as h', 'c.satuan_id', 'h.id')
                            ->leftJoin('satuans as i', 'd.satuan_slug', 'i.id')
                            ->leftJoin('satuans as j', 'e.satuan_id', 'j.id')
                            ->leftJoin('satuans as k', 'f.satuan_id', 'k.id')
                            ->whereIn('a.kode_subkeg', $kodesubkeg)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->groupBy('kode_subkeg')
                            ->groupBy('tipe_keb')
                            ->groupBy('kode_item')
                            ->get();
                $rekapother = DB::table('kaks as a')
                            ->selectRaw('a.kode_subkeg, a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, b.'.$sesi['jml'].' as jumlah, b.'.$sesi['total'].' as total, g.satuan as satkeb')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->whereIn('a.kode_subkeg', $kodesubkeg)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->whereRaw('(b.tipe_keb = "other" OR b.tipe_keb = "gaji")')
                            ->get();
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrkakegprog', [ 
                    'rekap' => $rekap,
                    'rekapother' => $rekapother,
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4');

                    return $pdf->download('LaporanPraRKASubkegiatan.pdf');
                }

            }else if ($request->jenisdata == 'rekap') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                $kegprog = Kegprog::with(['subkeg.kak' => function($query){$query->with(['kebutuhanakt'])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();

                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', request('kode_skpd'))->first();
                            
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrekapkegprog', [ 
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'sesi' => $sesi,
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');
    
                    return $pdf->download('LaporanRekapKegiatan.pdf');
                }
            }

        }else if(request('getlaporan') == 'subkeg'){

            if ($request->jenisdata == 'kak') {

                if(auth()->user()->role_slug == 'askpd'){
                    $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
                }else{
                    $subkeg = Subkeg::with(['kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}, 'kak.lokasikak'])->where('kode', request('kode'))->first();
                }

                $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', $bu->kode_skpd)->first();
                $periode = Periode::where('periode', request('periode'))->first();

                if($request->jenisprint == 'excel'){
                    return Excel::download(new LaporanSubkegExportView([ 
                        'subkeg' => $subkeg, 
                        'kegprog' => $kegprog, 
                        'progbid' => $progbid, 
                        'bidurus' => $bidurus, 
                        'urusan' => $urusan, 
                        'skpd' => $skpd,
                        'periode' => $periode,
                        'getlaporan' => request('getlaporan'),
                        'jenis' => $request->jenisprint]),
                        'cetaklaporan.xlsx');
                }else if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakkaksubkeg', [ 
                    'subkeg' => $subkeg, 
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');
    
                    return $pdf->download('LaporanKAK.pdf');
                }

            }else if ($request->jenisdata == 'rka') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                if(auth()->user()->role_slug == 'askpd'){
                    $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
                }else{
                    $subkeg = Subkeg::with(['kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
                }

                $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', $bu->kode_skpd)->first();

                if(auth()->user()->role_slug == 'askpd'){
                    $indikator_penanda = 'a.kode_sub';
                    $kode_penanda = auth()->user()->kode_sub;
                }else{
                    $indikator_penanda = 'a.kode_skpd';
                    $kode_penanda = request('kode_skpd');
                }

                $rekap = DB::table('kaks as a')
                            ->selectRaw('a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, sum(b.'.$sesi['jml'].') as jumlah, sum(b.'.$sesi['total'].') as total, c.ket as sshket, d.ket as sbuket, e.ket as usshket, f.ket as usbuket, g.satuan as satkeb, h.satuan as satssh, i.satuan as satsbu, j.satuan as satussh, k.satuan as satusbu')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('sshes as c', 'b.kode_item', 'c.id')
                            ->leftJoin('sbus as d', 'b.kode_item', 'd.id')
                            ->leftJoin('usulansshes as e', 'b.kode_item', 'e.id')
                            ->leftJoin('usulansbus as f', 'b.kode_item', 'f.id')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->leftJoin('satuans as h', 'c.satuan_id', 'h.id')
                            ->leftJoin('satuans as i', 'd.satuan_slug', 'i.id')
                            ->leftJoin('satuans as j', 'e.satuan_id', 'j.id')
                            ->leftJoin('satuans as k', 'f.satuan_id', 'k.id')
                            ->where('a.kode_subkeg', $subkeg->kode)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->groupBy('tipe_keb')
                            ->groupBy('kode_item')
                            ->get();
                $rekapother = DB::table('kaks as a')
                            ->selectRaw('a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, b.'.$sesi['jml'].' as jumlah, b.'.$sesi['total'].' as total, g.satuan as satkeb')
                            ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                            ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                            ->where('a.kode_subkeg', $subkeg->kode)
                            ->where($indikator_penanda, $kode_penanda)
                            ->where('b.periode', request('periode'))
                            ->whereRaw('(b.tipe_keb = "other" OR b.tipe_keb = "gaji")')
                            ->get();
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrkasubkeg', [ 
                    'rekap' => $rekap,
                    'rekapother' => $rekapother,
                    'subkeg' => $subkeg,
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint])->setPaper('A4');
    
                    return $pdf->download('LaporanPraRKASubkegiatan.pdf');
                }
            }else if ($request->jenisdata == 'rekap') {

                $periode = Periode::where('periode', request('periode'))->first();
                if($periode->sesi == 'rka'){
                    $sesi['tipe'] = 'tipe_rka';
                    $sesi['jml'] = 'jml_rka';
                    $sesi['harga'] = 'harga_rka';
                    $sesi['total'] = 'total_rka';
                }else if($periode->sesi == 'kuappas'){
                    $sesi['tipe'] = 'tipe_kuappas';
                    $sesi['jml'] = 'jml_kuappas';
                    $sesi['harga'] = 'harga_kuappas';
                    $sesi['total'] = 'total_kuappas';
                }else if($periode->sesi == 'apbd'){
                    $sesi['tipe'] = 'tipe_apbd';
                    $sesi['jml'] = 'jml_apbd';
                    $sesi['harga'] = 'harga_apbd';
                    $sesi['total'] = 'total_apbd';
                }else if($periode->sesi == 'final'){
                    $sesi['tipe'] = 'tipe_final';
                    $sesi['jml'] = 'jml_final';
                    $sesi['harga'] = 'harga_final';
                    $sesi['total'] = 'total_final';
                }

                if(auth()->user()->role_slug == 'askpd'){
                    $subkeg = Subkeg::with(['kak' => function($query){$query->with(['subunit', 'user'])->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
                }else{
                    $subkeg = Subkeg::with(['kak' => function($query){$query->with(['subunit', 'user'])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
                }

                $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
                $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
                $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
                $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
                $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
                $skpd = SKPD::where('kode', $bu->kode_skpd)->first();
                            
                if($request->jenisprint == 'pdf'){
                    $pdf = FacadePdf::loadView('laporan.cetakrekapsubkeg', [ 
                    'subkeg' => $subkeg,
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'sesi' => $sesi,
                    'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');
    
                    return $pdf->download('LaporanRekapSubkegiatan.pdf');
                }
            }

        }else if(request('getlaporan') == 'kak'){
            
            $kak = Kak::with(['subkeg.satuan'])->where('kode', request('kode'))->first();
            $subkeg = Subkeg::where('kode', $kak->kode_subkeg)->first();
            $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
            $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
            $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
            $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
            $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
            $skpd = SKPD::where('kode', request('kode_skpd'))->first();
            $periode = Periode::where('periode', request('periode'))->first();

            if($request->jenisprint == 'excel'){
                return Excel::download(new LaporanKAKExportView(['kak' => $kak, 
                    'subkeg' => $subkeg, 
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'jenis' => $request->jenisprint]),
                    'cetaklaporan.xlsx');
            }else if($request->jenisprint == 'pdf'){
                $pdf = FacadePdf::loadView('laporan.cetakkak', ['kak' => $kak, 
                'subkeg' => $subkeg, 
                'kegprog' => $kegprog, 
                'progbid' => $progbid, 
                'bidurus' => $bidurus, 
                'urusan' => $urusan, 
                'skpd' => $skpd,
                'periode' => $periode,
                'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                return $pdf->download('LaporanKAK.pdf');
            }
        }
    }
    
    public function cetakSubkeg(Request $request)
    {
        if ($request->jenisdata == 'kak') {

            if(auth()->user()->role_slug == 'askpd'){
                $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
            }else{
                $subkeg = Subkeg::with(['kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}, 'kak.lokasikak'])->where('kode', request('kode'))->first();
            }

            $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
            $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
            $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
            $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
            $skpd = SKPD::where('kode', request('kode_skpd'))->first();
            $periode = Periode::where('periode', request('periode'))->first();

            if($request->jenisprint == 'excel'){
                return Excel::download(new LaporanSubkegExportView([ 
                    'subkeg' => $subkeg, 
                    'kegprog' => $kegprog, 
                    'progbid' => $progbid, 
                    'bidurus' => $bidurus, 
                    'urusan' => $urusan, 
                    'skpd' => $skpd,
                    'periode' => $periode,
                    'getlaporan' => request('getlaporan'),
                    'jenis' => $request->jenisprint]),
                    'cetaklaporan.xlsx');
            }else if($request->jenisprint == 'pdf'){
                $pdf = FacadePdf::loadView('laporan.cetakkaksubkeg', [ 
                'subkeg' => $subkeg, 
                'kegprog' => $kegprog, 
                'progbid' => $progbid, 
                'bidurus' => $bidurus, 
                'urusan' => $urusan, 
                'skpd' => $skpd,
                'periode' => $periode,
                'getlaporan' => request('getlaporan'),
                'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                return $pdf->download('LaporanKAK.pdf');
            }

        }
        
        if ($request->jenisdata == 'rka') {

            $periode = Periode::where('periode', request('periode'))->first();
            if($periode->sesi == 'rka'){
                $sesi['tipe'] = 'tipe_rka';
                $sesi['jml'] = 'jml_rka';
                $sesi['harga'] = 'harga_rka';
                $sesi['total'] = 'total_rka';
            }else if($periode->sesi == 'kuappas'){
                $sesi['tipe'] = 'tipe_kuappas';
                $sesi['jml'] = 'jml_kuappas';
                $sesi['harga'] = 'harga_kuappas';
                $sesi['total'] = 'total_kuappas';
            }else if($periode->sesi == 'apbd'){
                $sesi['tipe'] = 'tipe_apbd';
                $sesi['jml'] = 'jml_apbd';
                $sesi['harga'] = 'harga_apbd';
                $sesi['total'] = 'total_apbd';
            }else if($periode->sesi == 'final'){
                $sesi['tipe'] = 'tipe_final';
                $sesi['jml'] = 'jml_final';
                $sesi['harga'] = 'harga_final';
                $sesi['total'] = 'total_final';
            }

            if(auth()->user()->role_slug == 'askpd'){
                $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
            }else{
                $subkeg = Subkeg::with(['kak' => function($query){$query->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
            }

            $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
            $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
            $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
            $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
            $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
            $skpd = SKPD::where('kode', request('kode_skpd'))->first();

            if(auth()->user()->role_slug == 'askpd'){
                $indikator_penanda = 'a.kode_sub';
                $kode_penanda = auth()->user()->kode_sub;
            }else{
                $indikator_penanda = 'a.kode_skpd';
                $kode_penanda = request('kode_skpd');
            }

            $rekap = DB::table('kaks as a')
                        ->selectRaw('a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, sum(b.'.$sesi['jml'].') as jumlah, sum(b.'.$sesi['total'].') as total, c.ket as sshket, c.id_rek as sshrek, c.spek as sshspek, d.ket as sbuket, d.id_rek as sburek, e.ket as usshket, f.ket as usbuket, g.satuan as satkeb, h.satuan as satssh, i.satuan as satsbu, j.satuan as satussh, k.satuan as satusbu')
                        ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                        ->leftJoin('sshes as c', 'b.kode_item', 'c.id')
                        ->leftJoin('sbus as d', 'b.kode_item', 'd.id')
                        ->leftJoin('usulansshes as e', 'b.kode_item', 'e.id')
                        ->leftJoin('usulansbus as f', 'b.kode_item', 'f.id')
                        ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                        ->leftJoin('satuans as h', 'c.satuan_id', 'h.id')
                        ->leftJoin('satuans as i', 'd.satuan_slug', 'i.id')
                        ->leftJoin('satuans as j', 'e.satuan_id', 'j.id')
                        ->leftJoin('satuans as k', 'f.satuan_id', 'k.id')
                        ->where('a.kode_subkeg', $subkeg->kode)
                        ->where($indikator_penanda, $kode_penanda)
                        ->where('b.periode', request('periode'))
                        ->groupBy('tipe_keb')
                        ->groupBy('kode_item')
                        ->get();
            $rekapother = DB::table('kaks as a')
                        ->selectRaw('a.icapaianprog, a.volcapprog, a.satcapprog, a.ikeluarankeg, a.volkelkeg, a.satkelkeg, a.ihaskeg, a.volhaskeg, a.sathaskeg, a.tarsubkeg, a.outakti, a.outakti, a.voloutakti, a.satoutakti, b.tipe_keb, b.uraian_lain, b.kode_item, b.'.$sesi['tipe'].' as tipe, b.'.$sesi['harga'].' as harga, b.'.$sesi['jml'].' as jumlah, b.'.$sesi['total'].' as total, g.satuan as satkeb')
                        ->leftJoin('kebutuhanakts as b', 'a.kode', 'b.kode_kak')
                        ->leftJoin('satuans as g', 'b.satuan_id', 'g.id')
                        ->where('a.kode_subkeg', $subkeg->kode)
                        ->where($indikator_penanda, $kode_penanda)
                        ->where('b.periode', request('periode'))
                        ->whereRaw('(b.tipe_keb = "other" OR b.tipe_keb = "gaji")')
                        ->get();
            if($request->jenisprint == 'pdf'){
                $pdf = FacadePdf::loadView('laporan.cetakrkasubkeg', [ 
                'rekap' => $rekap,
                'rekapother' => $rekapother,
                'subkeg' => $subkeg,
                'kegprog' => $kegprog, 
                'progbid' => $progbid, 
                'bidurus' => $bidurus, 
                'urusan' => $urusan, 
                'skpd' => $skpd,
                'periode' => $periode,
                'getlaporan' => request('getlaporan'),
                'jenis' => $request->jenisprint])->setPaper('A4');

                return $pdf->download('LaporanPraRKASubkegiatan.pdf');
            }
        }
        
        if ($request->jenisdata == 'rekap') {

            $periode = Periode::where('periode', request('periode'))->first();
            if($periode->sesi == 'rka'){
                $sesi['tipe'] = 'tipe_rka';
                $sesi['jml'] = 'jml_rka';
                $sesi['harga'] = 'harga_rka';
                $sesi['total'] = 'total_rka';
            }else if($periode->sesi == 'kuappas'){
                $sesi['tipe'] = 'tipe_kuappas';
                $sesi['jml'] = 'jml_kuappas';
                $sesi['harga'] = 'harga_kuappas';
                $sesi['total'] = 'total_kuappas';
            }else if($periode->sesi == 'apbd'){
                $sesi['tipe'] = 'tipe_apbd';
                $sesi['jml'] = 'jml_apbd';
                $sesi['harga'] = 'harga_apbd';
                $sesi['total'] = 'total_apbd';
            }else if($periode->sesi == 'final'){
                $sesi['tipe'] = 'tipe_final';
                $sesi['jml'] = 'jml_final';
                $sesi['harga'] = 'harga_final';
                $sesi['total'] = 'total_final';
            }

            if(auth()->user()->role_slug == 'askpd'){
                $subkeg = Subkeg::with(['kak' => function($query){$query->with(['subunit', 'user'])->where('kode_sub', auth()->user()->kode_sub)->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_sub', auth()->user()->kode_sub);}])->where('kode', request('kode'))->first();
            }else{
                $subkeg = Subkeg::with(['kak' => function($query){$query->with(['subunit', 'user'])->orderBy('kelompokbelanja_id')->where('periode', request('periode'))->where('kode_skpd', request('kode_skpd'));}])->where('kode', request('kode'))->first();
            }

            $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
            $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
            $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
            $urusan = Urusan::where('kode', $bidurus->kode_urusan)->first();
            $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
            $skpd = SKPD::where('kode', request('kode_skpd'))->first();
                        
            if($request->jenisprint == 'pdf'){
                $pdf = FacadePdf::loadView('laporan.cetakrekapsubkeg', [ 
                'subkeg' => $subkeg,
                'kegprog' => $kegprog, 
                'progbid' => $progbid, 
                'bidurus' => $bidurus, 
                'urusan' => $urusan, 
                'skpd' => $skpd,
                'periode' => $periode,
                'getlaporan' => request('getlaporan'),
                'sesi' => $sesi,
                'jenis' => $request->jenisprint])->setPaper('A4', 'landscape');

                return $pdf->download('LaporanRekapSubkegiatan.pdf');
            }
        }
    }

    public function cetakusulan(Request $request){
        if ($request->tipe == 'semua') {

            $skpd = SKPD::with(['usulanssh' => function($query){$query->where('periode', request('periode'));}, 'usulansbu' => function($query){$query->where('periode', request('periode'));}])->get();
            $ttssh = Usulanssh::where('kode_skpd', '')->where('periode', request('periode'))->get();
            $ttsbu = Usulansbu::where('kode_skpd', '')->where('periode', request('periode'))->get();
                        
            $pdf = FacadePdf::loadView('laporan.cetaksemuausulan', [ 
                'skpd' => $skpd,
                'ttsbu' => $ttsbu,
                'ttssh' => $ttssh,
                'periode' => $request->periode,
                'jenis' => 'pdf'])->setPaper('A4');

            return $pdf->download('LaporanUsulanSKPD.pdf');
        }
    }

    public function cetaklokasi(Request $request) {
        if ($request->tipe == 'skpd') {

            $lokasi = lokasi::where('id', request('lokasi'))->first();
            if($lokasi->lv == 1){
                //
            }else if($lokasi->lv == 2){
                $clokasi = lokasi::where('parent', $lokasi->id)->get();
                $clokasiid = collect([2]);
                foreach($clokasi as $c){
                    $clokasiid->push($c->id);
                }
                $skpd = SKPD::with(['kak' => function($query) use ($clokasiid){$query->with(['kebutuhanakt', 'kelompokbelanja'])->where('periode', request('periode'))->whereIn('lokasi', $clokasiid)->orderBy('kelompokbelanja_id');}])->get();
            }else if($lokasi->lv == 3){
                $skpd = SKPD::with(['kak' => function($query){$query->with(['kebutuhanakt', 'kelompokbelanja'])->where('periode', request('periode'))->where('lokasi', request('lokasi'))->orderBy('kelompokbelanja_id');}])->get();
            }
            $kebe = Kelompokbelanja::orderBy('urutan')->get();
            $_periode = Periode::where('periode', request('periode'))->first();
                        
            $pdf = FacadePdf::loadView('laporan.cetaklokasiskpd', [ 
                'lokasi' => $lokasi,
                'skpd' => $skpd,
                'kebe' => $kebe,
                '_periode' => $_periode,
                'jenis' => 'pdf'])->setPaper('A4', 'landscape');

            return $pdf->download('LaporanLokasiSKPD.pdf');
        }
    }
}
