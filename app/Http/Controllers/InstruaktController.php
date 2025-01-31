<?php

namespace App\Http\Controllers;

use App\Instruakt;
use App\Periode;
use Illuminate\Http\Request;

class InstruaktController extends Controller
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

        $validatedData['instruakt_slug'] =  $request->instruakt_slug;
        $validatedData['otherinstru'] =  $request->otherinstru;

        $maxi = Instruakt::where('kode_akt', $request->kode_akt)->max('kode_instruakt');
        if ($maxi != '') {
            $kmaxi = substr($maxi, -2) + 1;
            $validatedData['kode_instruakt'] = $request->kode_akt . '-i' . sprintf('%02d', $kmaxi);
        } else {
            $validatedData['kode_instruakt'] = $request->kode_akt . '-i01';
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

        Instruakt::create($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instruakt  $instruakt
     * @return \Illuminate\Http\Response
     */
    public function show(Instruakt $instruakt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instruakt  $instruakt
     * @return \Illuminate\Http\Response
     */
    public function edit(Instruakt $instruakt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instruakt  $instruakt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruakt $instruakt)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required',
        ]);

        $validatedData['instruakt_slug'] =  $request->instruakt_slug;
        $validatedData['otherinstru'] =  $request->otherinstru;

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

        Instruakt::where('id', $instruakt->id)->update($validatedData);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instruakt  $instruakt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruakt $instruakt)
    {
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            Instruakt::destroy($instruakt->id);
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_kuappas'] = 3;
            $validatedData['alasan_kuappas'] = request('alasan');

            Instruakt::where('id', $instruakt->id)->update($validatedData);
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_apbd'] = 3;
            $validatedData['alasan_apbd'] = request('alasan');

            Instruakt::where('id', $instruakt->id)->update($validatedData);
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_final'] = 3;
            $validatedData['alasan_final'] = request('alasan');

            Instruakt::where('id', $instruakt->id)->update($validatedData);
        }

        return redirect('/kak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode_kak') . '&periode=' . request('periode'));
    }
}
