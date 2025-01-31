<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.periode.index', [
            'periode' => Periode::orderBy('periode')->get()
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
            'periode' => 'required',
            'status' => 'required',
        ]);

        Periode::create($validatedData);

        return redirect('/periode')->with('success', 'Berhasil menambahkan Periode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        $rules = [
            'periode' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Periode::where('id', $periode->id)->update($validatedData);

        return redirect('/periode')->with('warning', 'Berhasil Merubah Periode');
    }

    public function editsesi(Request $request){
        $data['sesi'] = $request->sesi;

        Periode::where('id', $request->id)->update($data);

        return;
    }

    public function editproses(Request $request){
        $data['proses'] = $request->proses;

        Periode::where('id', $request->id)->update($data);

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
