<?php

namespace App\Http\Controllers;

use App\Urusan;
use Illuminate\Http\Request;

class UrusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.urusan.index', [
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
            'ket' => 'required',
            'status' => 'required',
        ]);

        Urusan::create($validatedData);

        return redirect('/urusan')->with('success', 'Berhasil menambahkan Urusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function show(Urusan $urusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Urusan $urusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urusan $urusan)
    {
        $rules = [
            'kode' => 'required',
            'ket' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Urusan::where('id', $urusan->id)->update($validatedData);

        return redirect('/urusan')->with('warning', 'Berhasil Merubah Urusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urusan $urusan)
    {
        //
    }
}

