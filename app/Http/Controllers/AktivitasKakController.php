<?php

namespace App\Http\Controllers;

use App\AktivitasKak;
use App\Dataakt;
use App\Instruakt;
use App\Kebutuhanakt;
use App\Periode;
use App\Personalakt;
use Illuminate\Http\Request;

class AktivitasKakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'ket' => 'required',
            'bulandari' => 'required',
            'minggudari' => 'required',
            'bulansampai' => 'required',
            'minggusampai' => 'required',
        ]);

        $validatedData['kode_thp'] = $request->kode_thp;

        $nakt = AktivitasKak::where('kode_thp', $request->kode_thp)->max('kode');
        if ($nakt != '') {
            $knakt = substr($nakt, -3) + 1;
            $validatedData['kode'] = $request->kode_thp . 'akt-' . sprintf('%03d', $knakt);
        } else {
            $validatedData['kode'] = $request->kode_thp . 'akt-001';
        }

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
            $validatedData['alasan_kuappas'] = $request->alasan;
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
            $validatedData['alasan_apbd'] = $request->alasan;
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
            $validatedData['alasan_final'] = $request->alasan;
        }

        AktivitasKak::create($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Menambahkan Aktivitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AktivitasKak  $aktivitasKak
     * @return \Illuminate\Http\Response
     */
    public function show(AktivitasKak $aktivita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AktivitasKak  $aktivitasKak
     * @return \Illuminate\Http\Response
     */
    public function edit(AktivitasKak $aktivita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AktivitasKak  $aktivitasKak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AktivitasKak $aktivita)
    {
        $validatedData = $request->validate([
            'ket' => 'required',
            'bulandari' => 'required',
            'minggudari' => 'required',
            'bulansampai' => 'required',
            'minggusampai' => 'required',
        ]);

        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $validatedData['tipe_rka'] = 2;
            $validatedData['alasan_rka'] = $request->alasan;
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 2;
            $validatedData['alasan_kuappas'] = $request->alasan;
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 2;
            $validatedData['alasan_apbd'] = $request->alasan;
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 2;
            $validatedData['alasan_final'] = $request->alasan;
        }

        AktivitasKak::where('id', $aktivita->id)->update($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('warning', 'Berhasil Merubah Aktivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AktivitasKak  $aktivitasKak
     * @return \Illuminate\Http\Response
     */
    public function destroy(AktivitasKak $aktivita)
    {
        $periode = Periode::where('periode', request('periode'))->first();
        
        $personal = Personalakt::where('kode_akt', $aktivita->kode)->get();
        $instrumen = Instruakt::where('kode_akt', $aktivita->kode)->get();
        $kebutuhan = Kebutuhanakt::where('kode_akt', $aktivita->kode)->get();
        $data = Dataakt::where('kode_akt', $aktivita->kode)->get();
        
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::destroy($k->id);
            }

            AktivitasKak::destroy($aktivita->id);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            AktivitasKak::where('id', $aktivita->id)->update($validatedData);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            AktivitasKak::where('id', $aktivita->id)->update($validatedData);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            AktivitasKak::where('id', $aktivita->id)->update($validatedData);
        }

        return redirect('/kak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode_kak') . '&periode=' . request('periode'));
    }
}
