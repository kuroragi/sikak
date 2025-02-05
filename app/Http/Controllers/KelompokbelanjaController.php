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
        $data['kebe'] = Kelompokbelanja::where('status', 1)->orderBy('urutan')->get();
        $data['unactive_kebes'] = Kelompokbelanja::where('status', 0)->get();
        return view('master.kebe.index', $data);
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
            // 'status' => 'required',
        ]);

        $validatedData['start_periode'] = $request->start_periode;
        $validatedData['end_periode'] = $request->end_periode;

        if($request->end_periode == null){
            $validatedData['status'] = 1;
        }else{
            $validatedData['status'] = 0;
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

        $datakebe = Kelompokbelanja::where('status', 1)->where('urutan', '>=', $request->urutan)->get();
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
            // 'status' => 'required',
        ]);

        $validatedData['start_periode'] = $request->start_periode;
        $validatedData['end_periode'] = $request->end_periode;
        
        if($request->end_periode == null){
            $validatedData['status'] = 1;
        }else{
            $validatedData['status'] = 0;
            $validatedData['urutan'] = 0;
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
        
        if($validatedData['urutan'] != 0){
            $norut = 1;
            $datakebe = Kelompokbelanja::where('status', 1)->where('urutan', '<', $request->urutan)->get();
            foreach($datakebe as $dt){
                $data['urutan'] = $norut;
                $norut += 1;
                Kelompokbelanja::where('id', $dt->id)->update($data);
            }
    
            $norut = $request->urutan;
            $datakebe = Kelompokbelanja::where('status', 1)->where('urutan', '>=', $request->urutan)->get();
            foreach($datakebe as $dt){
                $norut += 1;
                $data['urutan'] = $norut;
                Kelompokbelanja::where('id', $dt->id)->update($data);
            }
        }else{
            $datakebe = Kelompokbelanja::where('status', 1)->orderBy('urutan')->get();
            foreach($datakebe as $key => $dt){
                $data['urutan'] = $key + 1;
                Kelompokbelanja::where('id', $dt->id)->update($data);
            }
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
