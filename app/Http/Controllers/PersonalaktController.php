<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Personalakt;
use Illuminate\Http\Request;

class PersonalaktController extends Controller
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
            'kode_akt' => 'required',
            'jumlah' => 'required',
        ]);

        $validatedData['personil_slug'] = $request->personil_slug;
        $validatedData['otherpersonil'] =  $request->otherpersonil;

        $maxp = Personalakt::where('kode_akt', $request->kode_akt)->max('kode_pers');
        if ($maxp != '') {
            $kmaxp = substr($maxp, -2) + 1;
            $validatedData['kode_pers'] = $request->kode_akt . '-p' . sprintf('%02d', $kmaxp);
        } else {
            $validatedData['kode_pers'] = $request->kode_akt . '-p01';
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

        Personalakt::create($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Menambah Personil AKtivitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personalakt  $personalakt
     * @return \Illuminate\Http\Response
     */
    public function show(Personalakt $personalakt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personalakt  $personalakt
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalakt $personalakt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personalakt  $personalakt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalakt $personalakt)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required',
        ]);

        $validatedData['personil_slug'] = $request->personil_slug;
        $validatedData['otherpersonil'] =  $request->otherpersonil;

        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $validatedData['tipe_rka'] = 2;
            $validatedData['alasan_rka'] = '';
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

        Personalakt::where('id', $personalakt->id)->update($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('warning', 'Berhasil Mengubah Personil AKtivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personalakt  $personalakt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalakt $personalakt)
    {
        //
    }
}
