<?php

namespace App\Http\Controllers;

use App\Kelompokbelanja;
use Illuminate\Http\Request;

class KelompokbelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.kebe.index', [
            'kebe' => Kelompokbelanja::orderBy('urutan')->get(),
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
            'urutan' => 'required',
            'status' => 'required',
        ]);

        $datakebe = Kelompokbelanja::where('urutan', '>=', $request->urutan)->get();
        foreach($datakebe as $dt){
            $data['urutan'] = $dt->urutan + 1;
            Kelompokbelanja::where('id', $dt->id)->update($data);
        }

        Kelompokbelanja::create($validatedData);

        return redirect('/kebe')->with('success', 'Berhasil menambahkan kelompok belanja');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelompokbelanja  $kelompokbelanja
     * @return \Illuminate\Http\Response
     */
    public function show(Kelompokbelanja $kelompokbelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelompokbelanja  $kelompokbelanja
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompokbelanja $kelompokbelanja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelompokbelanja  $kelompokbelanja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelompokbelanja $kebe)
    {
        $validatedData = $request->validate([
            'ket' => 'required',
            'urutan' => 'required',
            'status' => 'required',
        ]);
        
        $norut = 1;
        $datakebe = Kelompokbelanja::where('urutan', '<', $request->urutan)->get();
        foreach($datakebe as $dt){
            $data['urutan'] = $norut;
            $norut += 1;
            Kelompokbelanja::where('id', $dt->id)->update($data);
        }

        $norut = $request->urutan;
        $datakebe = Kelompokbelanja::where('urutan', '>=', $request->urutan)->get();
        foreach($datakebe as $dt){
            $norut += 1;
            $data['urutan'] = $norut;
            Kelompokbelanja::where('id', $dt->id)->update($data);
        }

        if($request->exists('is_kak')){
            $validatedData['is_kak'] = 1;
        }else{
            $validatedData['is_kak'] = 0;
        }

        if($request->exists('is_satuan_needed')){
            $validatedData['is_satuan_needed'] = 1;
        }else{
            $validatedData['is_satuan_needed'] = 0;
        }

        Kelompokbelanja::where('id', $kebe->id)->update($validatedData);

        return redirect('/kebe')->with('warning', 'Berhasil mengubah kelompok belanja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelompokbelanja  $kelompokbelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompokbelanja $kelompokbelanja)
    {
        //
    }
}
