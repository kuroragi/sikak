<?php

namespace App\Http\Controllers;

use App\Kak;
use App\SKPD;
use App\Sksu;
use App\SubUnit;
use App\User;
use Illuminate\Http\Request;

class SubUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_slug == 'admin'){
            $skpd = SKPD::with('subunit')->get();
        }else{
            $skpd = SKPD::with('subunit')->where('kode', auth()->user()->kode_skpd)->get();
        }
        return view('master.subunit.index', [
            'skpd' => $skpd
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
        $kode_skpd = $request->input('kode_skpd');
        $name = $request->input('name');
        $status = $request->input('status');

        $validatedData = [
            'kode_skpd' => $kode_skpd,
            'name' => $name,
            'status' => $status,
        ];

        $kd1 = SubUnit::where('kode_skpd', $kode_skpd)->max('kode');
        if($kd1 != ''){
            $kd2 = substr($kd1, -3) + 1;
            $kode = $request->kode_skpd.'.'.sprintf('%03d', $kd2);
        }else{
            $kode = $request->kode_skpd.'.001';
        }

        $validatedData['kode'] = $kode;

        SubUnit::create($validatedData);

        $msg = array(
            'info' => 'Info',
            'store' => $validatedData,
          );

        return json_encode($msg);

        //return redirect('/subunit')->with('success', 'Berhasil menambahkan Sub Unit');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
            'kode_skpd' => 'required',
        ]);

        $kd1 = SubUnit::where('kode_skpd', $request->kode_skpd)->max('kode');
        if($kd1 != ''){
            $kd2 = substr($kd1, -3) + 1;
            $kode = $request->kode_skpd.'.'.sprintf('%03d', $kd2);
        }else{
            $kode = $request->kode_skpd.'.001';
        }

        $validatedData['kode'] = $kode;

        $subunit = SubUnit::where('kode', $request->pemekaran)->first();
        $kaksubunit = Kak::where('kode_sub', $request->pemekaran)->get();
        $usersubunit = User::where('kode_sub', $request->pemekaran)->get();
        $sksusubunit = Sksu::where('kode_subunit', $request->pemekaran)->get();
        
        SubUnit::where('id', $subunit->id)->update($validatedData);

        foreach ($usersubunit as $usersub) {
            $datauser['kode_skpd'] = $request->kode_skpd;
            $datauser['kode_sub'] = $kode;

            User::where('id', $usersub->id)->update($datauser);
        }

        foreach ($sksusubunit as $sksusub) {
            $datasksu['kode_subunit'] = $kode;

            Sksu::where('id', $sksusub->id)->update($datasksu);
        }

        foreach ($kaksubunit as $kaksub) {
            $datakak['kode_skpd'] = $request->kode_skpd;
            $datakak['kode_sub'] = $kode;

            Kak::where('id', $kaksub->id)->update($datakak);
        }

        return redirect('/subunit')->with('success', 'Berhasil menambahkan Sub Unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubUnit  $subUnit
     * @return \Illuminate\Http\Response
     */
    public function show(SubUnit $subUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubUnit  $subUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(SubUnit $subUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubUnit  $subUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubUnit $subunit)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        SubUnit::where('id', $subunit->id)->update($validatedData);

        return redirect('/subunit')->with('warning', 'Berhasil merubah Sub Unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubUnit  $subUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubUnit $subUnit)
    {
        //
    }
}
