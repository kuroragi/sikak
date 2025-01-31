<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.kelurahan.index', [
            'kelurahan' => Kelurahan::with('kecamatan')->get(),
            'kecamatan' => Kecamatan::all(),
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
            'ket' => 'required',
            'kecamatan_id' => 'required',
            'status' => 'required',
        ]);

        Kelurahan::create($validatedData);

        return redirect('/kelurahan')->with('success', 'Berhasil menambahkan Kelurahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $validatedData = $request->validate([
            'ket' => 'required',
            'kecamatan_id' => 'required',
            'status' => 'required',
        ]);

        Kelurahan::where('id', $kelurahan->id)->update($validatedData);

        return redirect('/kelurahan')->with('warning', 'Berhasil mengubah Kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        //
    }
}
