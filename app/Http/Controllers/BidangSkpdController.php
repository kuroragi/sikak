<?php

namespace App\Http\Controllers;

use App\BidangSkpd;
use App\Bidurus;
use App\SKPD;
use Illuminate\Http\Request;

class BidangSkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.bidangskpd.index', [
            'skpd' => SKPD::with('bidangskpd.bidurus')->get(),
            'bidurus' => Bidurus::orderBy('kode')->get()
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
        $validatedData = $request->validate([
            'kode_skpd' => 'required',
            'kode_bidurus' => 'required',
            'status' => 'required',
        ]);

        $validatedData['thn_awal'] = date('Y');

        BidangSkpd::create($validatedData);

        $skpd = SKPD::where('kode', $request->kode_skpd)->first();

        return redirect('/bidangskpd')->with('success', 'Berhasil menambahkan Bidang Urusan untuk '.$skpd->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BidangSkpd  $bidangskpd
     * @return \Illuminate\Http\Response
     */
    public function show(BidangSkpd $bidangskpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BidangSkpd  $bidangskpd
     * @return \Illuminate\Http\Response
     */
    public function edit(BidangSkpd $bidangskpd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BidangSkpd  $bidangskpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BidangSkpd $bidangskpd)
    {
        $validatedData = $request->validate([
            'kode_bidurus' => 'required',
            'status' => 'required',
        ]);

        BidangSkpd::where('id', $bidangskpd->id)->update($validatedData);

        $skpd = SKPD::where('kode', $request->kode_skpd)->first();

        return redirect('/bidangskpd')->with('warning', 'Berhasil mengubah Bidang Urusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BidangSkpd  $bidangskpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidangSkpd $bidangskpd)
    {
        BidangSkpd::destroy('id', $bidangskpd->id);

        return redirect('/bidangskpd')->with('danger', 'Berhasil menghapus bidang skpd');
    }
}
