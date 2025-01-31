<?php

namespace App\Http\Controllers;

use App\Bidurus;
use App\Kak;
use App\Kegprog;
use App\Kelompokbelanja;
use App\Lokasi;
use App\Periode;
use App\Progbid;
use App\SKPD;
use App\SKPDProg;
use App\Sksu;
use App\Subkeg;
use App\SubUnit;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class SKPDProgController extends Controller
{
    public function index()
    {
        $periode = Periode::where('periode', request('periode'))->first();
        if($periode == ''){
            $sesi = 'tipe_rka';
        }else if ($periode->sesi == 'rka') {
            $sesi = 'tipe_rka';
        } else if ($periode->sesi == 'kuappas') {
            $sesi = 'tipe_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $sesi = 'tipe_apbd';
        } else if ($periode->sesi == 'final') {
            $sesi = 'tipe_final';
        }
        
        if (auth()->user()->role_slug == 'askpd'){
            $data = 'anggota';
            $view = 'kak.skpdprog.indexaskpd';
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function ($query) {
                            $query->where('kode_sub', auth()->user()->kode_sub);
                    },'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                                $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', auth()->user()->kode_skpd)->get();
            $sksu = Sksu::with(['subkeg.satuan'])->where('kode_subunit', auth()->user()->kode_sub)->where('periode', request('periode'))->get();
        }else if (auth()->user()->kode_skpd != ''){
            $data = 'kepala';
            $view = 'kak.skpdprog.indexhead';
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function ($query) {
                        $query->where('kode_skpd', auth()->user()->kode_skpd);
                    },'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', auth()->user()->kode_skpd)->get();
            $sksu = [];
        }else{
            $data = 'admin';
            $view = 'kak.skpdprog.index';
            $skpd =   SKPD::with(['biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                            $query->where('periode', request('periode'))->where($sesi, '<', 3);
                         }])->get();
            $sksu = [];
        }

        return view($view, [
            'periode' => Periode::all(),
            'skpd' => $skpd,
            'sksu' => $sksu,
            '_periode' => Periode::where('periode', request('periode'))->first(),
        ]);
    }


    public function indexprogbid(Request $request)
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

        if(auth()->user()->kode_sub != ''){
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function ($query) {
                        $query->where('kode_sub', auth()->user()->kode_sub);
                    },'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', $request->kode_skpd)->first();
        }else if(auth()->user()->kode_skpd != ''){
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function ($query) {
                        $query->where('kode_skpd', auth()->user()->kode_skpd);
                    },'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', $request->kode_skpd)->first();
        }else{
            $skpd = SKPD::with(['biduruses.progbid.kegprog.subkeg.kak' => function($query){
                $query->where('kode_skpd', request('kode_skpd'));
            }, 'biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                        $query->where('periode', request('periode'))->where($sesi, '<', 3);
                    }])->where('kode', $request->kode_skpd)->first();
        }

        return view('kak.skpdprog.indexprogbid', [
            'skpd' => $skpd,
            'periode' => $periode,
        ]);
    }

    public function indexkegprog(Request $request)
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

        if(auth()->user()->kode_sub != ''){
            $kegprog = Kegprog::with(['subkeg.kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub);} ,'subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_progbid', $request->kode)->get();
        }else if(auth()->user()->kode_skpd != ''){
            $kegprog = Kegprog::with(['subkeg.kak' => function($query){$query->where('kode_skpd', auth()->user()->kode_skpd);} ,'subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_progbid', $request->kode)->get();
        }else{
            $kegprog = Kegprog::with(['subkeg.kak' => function($query){
                $query->where('kode_skpd', request('kode_skpd'));
            }, 'subkeg.kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_progbid', $request->kode)->get();
        }

        return view('kak.skpdprog.indexkegprog', [
            'progbid' => Progbid::where('kode', $request->kode)->first(),
            'kegprog' => $kegprog,
            'periode' => $periode,
        ]);
    }

    public function indexsubkeg(Request $request)
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

        if(auth()->user()->kode_sub != ''){
            $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_sub', auth()->user()->kode_sub);} ,'kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_kegprog', $request->kode)->get();
        }else if(auth()->user()->kode_skpd != ''){
            $subkeg = Subkeg::with(['kak' => function($query){$query->where('kode_skpd', auth()->user()->kode_skpd);} ,'kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_kegprog', $request->kode)->get();
        }else{
            $subkeg = Subkeg::with(['kak' => function($query){
                $query->where('kode_skpd', request('kode_skpd'));
            }, 'kak.kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_kegprog', $request->kode)->get();
        }
        
        return view('kak.skpdprog.indexsubkeg', [
            'kegprog' => Kegprog::with(['progbid'])->where('kode', $request->kode)->first(),
            'subkeg' => $subkeg,
            'periode' => $periode,
        ]);
    }

    public function indexkak(Request $request)
    {
        $subkeg = Subkeg::with(['satuan', 'kegprog'])->where('kode', $request->kode)->first();

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

        if(auth()->user()->kode_sub != ''){
            $kak = Kak::with(['kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_subkeg', $request->kode)->where('periode', $request->periode)->where('kode_sub', auth()->user()->kode_sub)->where($sesi, '<', 3)->orderBy('kelompokbelanja_id')->get();
            
            $subunit = SubUnit::where('kode_skpd', request('kode_skpd'))->get();
        }else if(auth()->user()->kode_skpd != ''){
            $kak = Kak::with(['kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_subkeg', $request->kode)->where('periode', $request->periode)->where('kode_skpd', auth()->user()->kode_skpd)->where($sesi, '<', 3)->orderBy('kelompokbelanja_id')->get();
            
            $subunit = SubUnit::where('kode_skpd', request('kode_skpd'))->get();
        }else{
            $kak = Kak::with(['kebutuhanakt' => function ($query) use ($sesi) {
                $query->where('periode', request('periode'))->where($sesi, '<', 3);
            }])->where('kode_subkeg', $request->kode)->where('periode', $request->periode)->where('kode_skpd', $request->kode_skpd)->where($sesi, '<', 3)->orderBy('kelompokbelanja_id')->get();
            
            $subunit = SubUnit::where('kode_skpd', request('kode_skpd'))->where('status', 1)->get();
        }

        $lokasi = Lokasi::all();
        $kelompokbelanja = Kelompokbelanja::where('status', 1)->orderBy('urutan')->get();


        return view('kak.skpdprog.indexkak', [
            'subkeg' => $subkeg,
            'kak' => $kak,
            'periode' => $periode,
            'kelompokbelanja' => $kelompokbelanja,
            'subunit' => $subunit,
            'lokasi' => $lokasi,
        ]);
    }

    public function detail(Request $request)
    {

        $skpd = SKPD::with('bidangskpd')->where('kode', $request->kode_skpd)->first();

        $progbid = [];

        foreach ($skpd->bidangskpd as $sb) {
            $bidurus = Bidurus::with(['progbid.kegprog.subkeg'])->where('kode', $sb->kode_bidurus)->first();
            foreach ($bidurus->progbid as $pb) {
                array_push($progbid, $pb);
            }
        }

        return view('kak.skpdprog.detail', [
            'progbid' => $progbid
        ]);
    }
}
