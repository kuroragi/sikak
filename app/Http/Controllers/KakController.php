<?php

namespace App\Http\Controllers;

use App\AktivitasKak;
use App\BidangSkpd;
use App\Bidurus;
use App\Dataakt;
use App\Datakeg;
use App\Instruakt;
use App\Instrumen;
use App\Kak;
use App\Kebutuhanakt;
use App\Kegprog;
use App\Lokasi;
use App\Pencetuskebe;
use App\Periode;
use App\Personalakt;
use App\Personil;
use App\Progbid;
use App\Satuan;
use App\SKPD;
use App\Subkeg;
use App\SubUnit;
use App\TahapKak;
use Illuminate\Http\Request;

class KakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kak = Kak::with(['subkeg.satuan', 'subunit'])->where('kode', request('kode'))->first();
        $subkeg = Subkeg::where('kode', $kak->kode_subkeg)->first();
        $kegprog = Kegprog::where('kode', $subkeg->kode_kegprog)->first();
        $progbid = Progbid::where('kode', $kegprog->kode_progbid)->first();
        $bidurus = Bidurus::where('kode', $progbid->kode_bidurus)->first();
        $bu = BidangSkpd::where('kode_bidurus', $bidurus->kode)->first();
        $skpd = SKPD::where('kode', $kak->kode_skpd)->first();

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
        return view('kak.index', [
            'kak' => $kak->load([
                'tahap' => function ($query) use ($sesi) {
                    $query->where($sesi, '<', 3);
                },
                'tahap.aktivitas' => function ($query) use ($sesi) {
                    $query->where($sesi, '<', 3);
                },
                'tahap.aktivitas.personalakt' => function ($query) use ($sesi) {
                    $query->with('personil')->where($sesi, '<', 3);
                },
                'tahap.aktivitas.instruakt' => function ($query) use ($sesi) {
                    $query->with('instrumen')->where($sesi, '<', 3);
                },
                'tahap.aktivitas.dataakt' => function ($query) use ($sesi) {
                    $query->with('datakeg')->where($sesi, '<', 3);
                },
                'tahap.aktivitas.kebutuhanakt' => function ($query) {
                    $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                }
            ]),
            'subkeg' => $subkeg,
            'skpd' => $skpd,
            'lokasi' => Lokasi::all(),
            'personil' => Personil::all(),
            'instrumen' => Instrumen::all(),
            'datakeg' => Datakeg::all(),
            'subunit' => SubUnit::where('kode_skpd', request('kode_skpd'))->where('status', '!=', 0)->get(),
            'satuan' => Satuan::orderBy('satuan')->get(),
            'pencetus' => Pencetuskebe::all(),
            'periode' => $periode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = [
            'kode_subkeg' => $request->kode_subkeg,
            'kelompokbelanja_id' => $request->kelompokbelanja_id,
            'pencetuskebe_id' => $request->pencetuskebe_id,
            'ket' => $request->ket,
            'icapaianprog' => $request->icapaianprog,
            'volcapprog' => $request->volcapprog,
            'satcapprog' => $request->satcapprog,
            'ikeluarankeg' => $request->ikeluarankeg,
            'volkelkeg' => $request->volkelkeg,
            'satkelkeg' => $request->satkelkeg,
            'ihaskeg' => $request->ihaskeg,
            'volhaskeg' => $request->volhaskeg,
            'sathaskeg' => $request->sathaskeg,
            'tarsubkeg' => $request->tarsubkeg,
            'outakti' => $request->outakti,
            'voloutakti' => $request->voloutakti,
            'satoutakti' => $request->satoutakti,
            'bidang_sekretariat' => $request->bidang_sekretariat,
            'subbagdkk' => $request->subbagdkk,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'deskrip' => $request->deskrip,
            'lokasi' => $request->lokasi,
        ];

        $kaks = KAK::where('kode', 'like', '%kak-' . $this->getDate('y') . '-n%')->max('kode');
        if ($kaks != '') {
            $nkak = substr($kaks, -5) + 1;
            $kode = 'kak-' . $this->getDate('y') . '-n' . sprintf('%05d', $nkak);
        } else {
            $kode = 'kak-' . $this->getDate('y') . '-n00001';
        }

        $validatedData['kode'] = $kode;

        $validatedData['kode_skpd'] = auth()->user()->kode_skpd;
        $validatedData['kode_sub'] = auth()->user()->kode_sub;
        $validatedData['username'] = auth()->user()->username;

        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $validatedData['tipe_rka'] = 1;
            $validatedData['alasan_rka'] = '';
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['tipe_kuappas'] = 1;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['tipe_apbd'] = 1;
            $validatedData['alasan_apbd'] = '';
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['tipe_final'] = 1;
            $validatedData['alasan_final'] = '';
        }

        $validatedData['periode'] = $request->periode;

        KAK::create($validatedData);

        return redirect('/skpdprogkak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_subkeg . '&periode=' . $request->periode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kak  $kak
     * @return \Illuminate\Http\Response
     */
    public function show(Kak $kak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kak  $kak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kak $kak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kak  $kak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kak $kak)
    {
        $validatedData = [
            'pencetuskebe_id' => $request->pencetuskebe_id,
            'ket' => $request->ket,
            'icapaianprog' => $request->icapaianprog,
            'volcapprog' => $request->volcapprog,
            'satcapprog' => $request->satcapprog,
            'ikeluarankeg' => $request->ikeluarankeg,
            'volkelkeg' => $request->volkelkeg,
            'satkelkeg' => $request->satkelkeg,
            'ihaskeg' => $request->ihaskeg,
            'volhaskeg' => $request->volhaskeg,
            'sathaskeg' => $request->sathaskeg,
            'tarsubkeg' => $request->tarsubkeg,
            'outakti' => $request->outakti,
            'voloutakti' => $request->voloutakti,
            'satoutakti' => $request->satoutakti,
            'bidang_sekretariat' => $request->bidang_sekretariat,
            'subbagdkk' => $request->subbagdkk,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'deskrip' => $request->deskrip,
            'lokasi' => $request->lokasi,
        ];

        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $validatedData['tipe_rka'] = 2;
            $validatedData['alasan_rka'] = $request->alasan;
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 2;
            $validatedData['alasan_kuappas'] = $request->alasan;;
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 2;
            $validatedData['alasan_apbd'] = $request->alasan;;
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 2;
            $validatedData['alasan_final'] = $request->alasan;;
        }

        KAK::where('id', $kak->id)->update($validatedData);

        return redirect('/kak?kode_skpd='.$request->kode_skpd.'&kode='.$kak->kode.'&periode='.$request->periode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kak  $kak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kak $kak, Request $request)
    {
        $periode = Periode::where('periode', request('periode'))->first();
        
        $tahaps = TahapKak::where('kode_kak', $kak->kode)->get();
        foreach($tahaps as $tahap){
            $aktivitas = AktivitasKak::where('kode_thp', $tahap->kode)->get();
            $personal = Personalakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();
            $instrumen = Instruakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();
            $data = Dataakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();

            if ($periode->sesi == 'rka') {
                foreach($personal as $p){
                    Personalakt::destroy($p->id);
                }
    
                foreach($instrumen as $i){
                    Instruakt::destroy($i->id);
                }
    
                foreach($data as $d){
                    Dataakt::destroy($d->id);
                }
    
                foreach($aktivitas as $a){
                    AktivitasKak::destroy($a->id);
                }
    
                TahapKak::destroy($tahap->id);
            } else if ($periode->sesi == 'kuappas') {
                $validatedData['tipe_kuappas'] = 3;
                $validatedData['tipe_apbd'] = 3;
                $validatedData['tipe_final'] = 3;
                $validatedData['alasan_kuappas'] = request('alasan');
    
                foreach($personal as $p){
                    Personalakt::where('id', $p->id)->update($validatedData);
                }
    
                foreach($instrumen as $i){
                    Instruakt::where('id', $i->id)->update($validatedData);
                }
    
                foreach($data as $d){
                    Dataakt::where('id', $d->id)->update($validatedData);
                }
    
                foreach($aktivitas as $a){
                    Kebutuhanakt::where('id', $a->id)->update($validatedData);
                }

                TahapKak::where('id', $tahap->id)->update($validatedData);
            } else if ($periode->sesi == 'apbd') {
                $validatedData['tipe_apbd'] = 3;
                $validatedData['tipe_final'] = 3;
                $validatedData['alasan_apbd'] = request('alasan');
    
                foreach($personal as $p){
                    Personalakt::where('id', $p->id)->update($validatedData);
                }
    
                foreach($instrumen as $i){
                    Instruakt::where('id', $i->id)->update($validatedData);
                }
    
                foreach($data as $d){
                    Dataakt::where('id', $d->id)->update($validatedData);
                }
    
                foreach($aktivitas as $a){
                    Kebutuhanakt::where('id', $a->id)->update($validatedData);
                }

                TahapKak::where('id', $tahap->id)->update($validatedData);
            } else if ($periode->sesi == 'final') {
                $validatedData['tipe_final'] = 3;
                $validatedData['alasan_final'] = request('alasan');
    
                foreach($personal as $p){
                    Personalakt::where('id', $p->id)->update($validatedData);
                }
    
                foreach($instrumen as $i){
                    Instruakt::where('id', $i->id)->update($validatedData);
                }
    
                foreach($data as $d){
                    Dataakt::where('id', $d->id)->update($validatedData);
                }
    
                foreach($aktivitas as $a){
                    Kebutuhanakt::where('id', $a->id)->update($validatedData);
                }

                TahapKak::where('id', $tahap->id)->update($validatedData);
            }
        }
        
        $kebutuhan = Kebutuhanakt::where('kode_kak', $kak->kode)->get();
        
        if ($periode->sesi == 'rka') {
            foreach($kebutuhan as $k){
                Kebutuhanakt::destroy($k->id);
            }

            Kak::destroy($kak->id);
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 3;
            $validatedData['tipe_apbd'] = 3;
            $validatedData['tipe_final'] = 3;
            $validatedData['alasan_kuappas'] = request('alasan');

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            Kak::where('id', $kak->id)->update($validatedData);
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 3;
            $validatedData['tipe_final'] = 3;
            $validatedData['alasan_apbd'] = request('alasan');

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            Kak::where('id', $kak->id)->update($validatedData);
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 3;
            $validatedData['alasan_final'] = request('alasan');

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            Kak::where('id', $kak->id)->update($validatedData);
        }

        return redirect('/skpdprogkak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode') . '&periode=' . request('periode'));
    }
}
