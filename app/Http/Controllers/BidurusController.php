<?php

namespace App\Http\Controllers;

use App\Bidurus;
use App\Urusan;
use Illuminate\Http\Request;

class BidurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.bidurus.index', [
            'bidurus' => Bidurus::with('urusan')->get(),
            'urusan' => Urusan::all()
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
            'kode' => 'required',
            'kode_urusan' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ]);

        Bidurus::create($validatedData);

        return redirect('/bidurus')->with('success', 'Berhasil menambahkan Bidang Urusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bidurus  $bidurus
     * @return \Illuminate\Http\Response
     */
    public function show(Bidurus $bidurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bidurus  $bidurus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bidurus $bidurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bidurus  $bidurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bidurus $bidurus)
    {
        $rules = [
            'kode' => 'required',
            'kode_urusan' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Bidurus::where('id', $bidurus->id)->update($validatedData);

        return redirect('/bidurus')->with('warning', 'Berhasil Merubah Bidang Urusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bidurus  $bidurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bidurus $bidurus)
    {
        //
    }
}
