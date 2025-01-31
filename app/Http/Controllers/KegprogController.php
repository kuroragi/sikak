<?php

namespace App\Http\Controllers;

use App\Kegprog;
use App\Progbid;
use Illuminate\Http\Request;

class KegprogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.kegprog.index', [
            'kegprog' => Kegprog::with('progbid')->get(),
            'progbid' => Progbid::all()
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
            'kode_progbid' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ]);

        Kegprog::create($validatedData);

        return redirect('/kegprog')->with('success', 'Berhasil menambahkan Kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegprog  $kegprog
     * @return \Illuminate\Http\Response
     */
    public function show(Kegprog $kegprog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegprog  $kegprog
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegprog $kegprog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegprog  $kegprog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegprog $kegprog)
    {
        $rules = [
            'kode' => 'required',
            'kode_progbid' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Kegprog::where('id', $kegprog->id)->update($validatedData);

        return redirect('/kegprog')->with('warning', 'Berhasil Merubah Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegprog  $kegprog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegprog $kegprog)
    {
        //
    }
}
