<?php

namespace App\Http\Controllers;

use App\Bidurus;
use App\Periode;
use App\SKPD;
use App\Sksu;
use App\SubUnit;
use Illuminate\Http\Request;

class SksuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subunit = SubUnit::where('kode', Request('kode'))->first();
        $skpd = SKPD::with('bidangskpd.bidurus')->where('kode', $subunit->kode_skpd)->first();
        $subkegs = collect([]);
        foreach($skpd->bidangskpd as $sb){
            $bidurus = Bidurus::with('progbid.kegprog.subkeg')->where('kode', $sb->kode_bidurus)->first();
            foreach($bidurus->progbid as $p){
                foreach($p->kegprog as $k){
                    foreach($k->subkeg as $sk){
                        $subkegs->push($sk);
                    }
                }
            }
        }
        return view('master.sksu.index',[
            'subunit' => $subunit,
            'periode' => Periode::all(),
            'subkeg' => $subkegs,
            'sksu' => Sksu::with('subkeg')->where('kode_subunit', Request('kode'))->filter(request(['periode']))->get()
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
            'kode_subunit' => 'required',
            'kode_subkeg' => 'required',
            'periode' => 'required',
            'status' => 'required',
        ]);

        $check = Sksu::where('kode_subunit', $request->kode_subunit)->where('kode_subkeg', $request->kode_subkeg)->where('periode', $request->periode)->first();
        if($check == null){
            Sksu::create($validatedData);
    
            return redirect('/sksu?kode='.$request->kode_subunit.'&periode='.$request->periode)->with('success', 'Berhasil menambahkan Sub Kegiatan');
        }else{
            return redirect('/sksu?kode='.$request->kode_subunit.'&periode='.$request->periode)->with('danger', 'Sub Kegiatan Yang dimaksud Sudah Diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sksu  $sksu
     * @return \Illuminate\Http\Response
     */
    public function show(Sksu $sksu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sksu  $sksu
     * @return \Illuminate\Http\Response
     */
    public function edit(Sksu $sksu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sksu  $sksu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sksu $sksu)
    {
        $validatedData = $request->validate([
            'kode_subkeg' => 'required',
            'status' => 'required',
        ]);

        Sksu::where('id', $sksu->id)->update($validatedData);
    
        return redirect('/sksu?kode='.$request->kode_subunit.'&periode='.$request->periode)->with('success', 'Berhasil menambahkan Sub Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sksu  $sksu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sksu $sksu)
    {
        Sksu::destroy('id', $sksu->id);

        return redirect('/sksu?kode='.$sksu->kode_subunit.'&periode='.$sksu->periode)->with('danger', 'Berhasil menghapus Sub Kegiatan '.$sksu->subkeg->ket);
    }
}
