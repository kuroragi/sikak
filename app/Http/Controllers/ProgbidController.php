<?php

namespace App\Http\Controllers;

use App\Bidurus;
use App\Progbid;
use Illuminate\Http\Request;

class ProgbidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.progbid.index', [
            'progbid' => Progbid::with('bidurus')->get(),
            'bidurus' => Bidurus::all()
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
            'kode_bidurus' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ]);

        Progbid::create($validatedData);

        return redirect('/progbid')->with('success', 'Berhasil menambahkan Program');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progbid  $progbid
     * @return \Illuminate\Http\Response
     */
    public function show(Progbid $progbid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progbid  $progbid
     * @return \Illuminate\Http\Response
     */
    public function edit(Progbid $progbid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progbid  $progbid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progbid $progbid)
    {
        $rules = [
            'kode' => 'required',
            'kode_bidurus' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Progbid::where('id', $progbid->id)->update($validatedData);

        return redirect('/progbid')->with('warning', 'Berhasil Merubah Program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progbid  $progbid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progbid $progbid)
    {
        //
    }
}
