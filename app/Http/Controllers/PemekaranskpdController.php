<?php

namespace App\Http\Controllers;

use App\Pemekaranskpd;
use App\SKPD;
use Illuminate\Http\Request;

class PemekaranskpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skpd = SKPD::with('pemekarans')->where('pemekaran', '!=', '')->get();
        return view('master.pemekaran.index', [
            'skpd' => $skpd,
            'skpds' => SKPD::all()
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
     * @param  \App\Pemekaranskpd  $pemekaranskpd
     * @return \Illuminate\Http\Response
     */
    public function show(Pemekaranskpd $pemekaranskpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemekaranskpd  $pemekaranskpd
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemekaranskpd $pemekaranskpd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemekaranskpd  $pemekaranskpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemekaranskpd $pemekaranskpd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemekaranskpd  $pemekaranskpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemekaranskpd $pemekaranskpd)
    {
        //
    }
}
