<?php

namespace App\Http\Controllers;

use App\AktivitasKak;
use App\Dataakt;
use App\Instruakt;
use App\Kebutuhanakt;
use App\Periode;
use App\Personalakt;
use App\TahapKak;
use Illuminate\Http\Request;

class TahapKakController extends Controller
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
            'ket' => 'required'
        ]);

        $validatedData['kode_kak'] = $request->kode_kak;

        $ntahap = TahapKak::where('kode_kak', $request->kode_kak)->max('kode');
        if ($ntahap != '') {
            $knthp = substr($ntahap, -4) + 1;
            $validatedData['kode'] = 'thp-' . $this->getDate('y') . '-' . substr($request->kode_kak, -5) . '-' . sprintf('%04d', $knthp);
        } else {
            $validatedData['kode'] = 'thp-' . $this->getDate('y') . '-' . substr($request->kode_kak, -5) . '-0001';
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

        TahapKak::create($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Menambahkan Tahap Aktivitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TahapKak  $tahapKak
     * @return \Illuminate\Http\Response
     */
    public function show(TahapKak $tahapKak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TahapKak  $tahapKak
     * @return \Illuminate\Http\Response
     */
    public function edit(TahapKak $tahapKak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TahapKak  $tahapKak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahapKak $tahap)
    {
        $rules = [
            'ket' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 2;
            $validatedData['alasan_kuappas'] = $request->alasan;
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 2;
            $validatedData['alasan_apbd'] = $request->alasan;
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 2;
            $validatedData['alasan_final'] = $request->alasan;
        }

        TahapKak::where('id', $tahap->id)->update($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $tahap->kode_kak . '&periode=' . $request->periode)->with('warning', 'Berhasil Merubah Tahap Aktivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TahapKak  $tahapKak
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahapKak $tahap)
    {
        $periode = Periode::where('periode', request('periode'))->first();
        
        $aktivitas = AktivitasKak::where('kode_thp', $tahap->kode)->get();
        $personal = Personalakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();
        $instrumen = Instruakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();
        $kebutuhan = Kebutuhanakt::where('kode_akt', 'like', '%'.$tahap->kode.'%')->get();
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::destroy($k->id);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
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

            foreach($kebutuhan as $k){
                Kebutuhanakt::where('id', $k->id)->update($validatedData);
            }

            foreach($aktivitas as $a){
                Kebutuhanakt::where('id', $a->id)->update($validatedData);
            }

            TahapKak::where('id', $tahap->id)->update($validatedData);
        }

        return redirect('/kak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode_kak') . '&periode=' . request('periode'));
    }
}
