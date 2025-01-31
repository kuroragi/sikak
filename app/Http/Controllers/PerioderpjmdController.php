<?php

namespace App\Http\Controllers;

use App\Perioderpjmd;
use Illuminate\Http\Request;

class PerioderpjmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.rpjmd.index', [
            'rpjmd' => Perioderpjmd::all()
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
            'judul' => 'required',
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
        ]);

        Perioderpjmd::create($validatedData);

        return redirect('rpjmd')->with('success', 'Berhasiil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perioderpjmd  $perioderpjmd
     * @return \Illuminate\Http\Response
     */
    public function show(Perioderpjmd $perioderpjmd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perioderpjmd  $perioderpjmd
     * @return \Illuminate\Http\Response
     */
    public function edit(Perioderpjmd $perioderpjmd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perioderpjmd  $perioderpjmd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perioderpjmd $perioderpjmd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perioderpjmd  $perioderpjmd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perioderpjmd $perioderpjmd)
    {
        //
    }
}
