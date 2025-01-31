<?php

namespace App\Http\Controllers;

use App\Indikator;
use App\Progbid;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.indikator.index', [
            'progbid' => Progbid::with('indikator')->get()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Indikator $indikator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indikator $indikator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indikator $indikator)
    {
        //
    }
}
