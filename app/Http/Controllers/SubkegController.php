<?php

namespace App\Http\Controllers;

use App\Kegprog;
use App\Satuan;
use App\Subkeg;
use Illuminate\Http\Request;

class SubkegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kak.subkeg.index', [
            'subkeg' => Subkeg::with(['kegprog', 'satuan'])->paginate(100),
            'kegprog' => Kegprog::all(),
            'satuan' => Satuan::orderBy('satuan')->get(),
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
            'kode_kegprog' => 'required',
            'ket' => 'required',
            'kinerja' => 'required',
            'indikator' => 'required',
            'satuan_id' => 'required',
            'status' => 'required',
        ]);

        Subkeg::create($validatedData);

        return redirect('/subkeg')->with('success', 'Berhasil menambahkan Sub Kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subkeg  $subkeg
     * @return \Illuminate\Http\Response
     */
    public function show(Subkeg $subkeg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subkeg  $subkeg
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkeg $subkeg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subkeg  $subkeg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkeg $subkeg)
    {
        $rules = [
            'kode' => 'required',
            'kode_kegprog' => 'required',
            'ket' => 'required',
            'kinerja' => 'required',
            'indikator' => 'required',
            'satuan_id' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Subkeg::where('id', $subkeg->id)->update($validatedData);

        return redirect('/subkeg')->with('warning', 'Berhasil Merubah Sub Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subkeg  $subkeg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkeg $subkeg)
    {
        //
    }
}