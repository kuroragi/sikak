<?php

namespace App\Http\Controllers;

use App\Dataakt;
use App\Periode;
use Illuminate\Http\Request;

class DataaktController extends Controller
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
        ]);

        $validatedData['datakeg_slug'] =  $request->datakeg_slug;
        $validatedData['otherdata'] =  $request->otherdata;

        $maxd = Dataakt::where('kode_akt', $request->kode_akt)->max('kode_dataakt');
        if ($maxd != '') {
            $kmaxd = substr($maxd, -2) + 1;
            $validatedData['kode_dataakt'] = $request->kode_akt . '-d' . sprintf('%02d', $kmaxd);
        } else {
            $validatedData['kode_dataakt'] = $request->kode_akt . '-d01';
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

        Dataakt::create($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dataakt  $dataakt
     * @return \Illuminate\Http\Response
     */
    public function show(Dataakt $dataakt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dataakt  $dataakt
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataakt $dataakt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dataakt  $dataakt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataakt $dataakt)
    {
        $validatedData['datakeg_slug'] =  $request->datakeg_slug;
        $validatedData['otherdata'] =  $request->otherdata;

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

        Dataakt::where('id', $dataakt->id)->update($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dataakt  $dataakt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataakt $dataakt)
    {
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            Dataakt::destroy($dataakt->id);
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 3;
            $validatedData['alasan_kuappas'] = request('alasan');

            Dataakt::where('id', $dataakt->id)->update($validatedData);
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 3;
            $validatedData['alasan_apbd'] = request('alasan');

            Dataakt::where('id', $dataakt->id)->update($validatedData);
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 3;
            $validatedData['alasan_final'] = request('alasan');

            Dataakt::where('id', $dataakt->id)->update($validatedData);
        }

        return redirect('/kak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode_kak') . '&periode=' . request('periode'));
    }
}
