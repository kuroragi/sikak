<?php

namespace App\Http\Controllers;

use App\Pemekaranskpd;
use App\SKPD;
use App\User;
use Illuminate\Http\Request;

class SKPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.skpd.index', [
            'skpd' => SKPD::orderBy('kode')->get()
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
            'name' => 'required',
            'singkatan' => 'required',
            'status' => 'required',
        ]);

        $validatedData['pemekaran'] = $request->pemekaran;

        SKPD::create($validatedData);

        if($request->pemekaran != ''){
            $lowsingkatan = strtolower($request->singkatan);
            $datauser = [
                'name' => $request->name,
                'email' => $lowsingkatan.'@mail.com',
                'username' => 'kak_'.$lowsingkatan,
                'role_slug' => 'kaskpd',
                'email_verified_at' => '',
                'kode_skpd' => $request->kode,
                'kode_sub' => '',
                'password' => bcrypt('bukittinggi'),
                'status' => 1,
                'remember_token' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            User::create($datauser);

            $datamekar['kode_skpd'] = $request->kode;
            $datamekar['kode_pemekaran'] = $request->pemekaran;

            Pemekaranskpd::create($datamekar);

            // $skpdlama = SKPD::where('kode', $request->pemekaran)->first();
            // $dataskpdlama['status'] = 0;
            // SKPD::where('id', $skpdlama->id)->update($dataskpdlama);
        }

        return redirect('/skpd')->with('success', 'Berhasil menambahkan SKPD');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
            'kode_skpd' => 'required',
            'kode_pemekaran' => 'required',
        ]);

        Pemekaranskpd::create($validatedData);

        return redirect('/pemekaran')->with('success', 'Berhasil menambahkan SKPD');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function show(SKPD $sKPD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function edit(SKPD $sKPD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SKPD $skpd)
    {
        $rules = [
            'kode' => 'required',
            'name' => 'required',
            'singkatan' => 'required',
            'status' => 'required',
        ];
        $validatedData = $request->validate($rules);

        $validatedData['pemekaran'] = $request->pemekaran;

        SKPD::where('id', $skpd->id)->update($validatedData);

        $user = User::where('kode_skpd', $skpd->kode)->where('role_slug', 'kaskpd')->first();

        $lowsingkatan = strtolower($request->singkatan);
        $datauser['name'] = $request->name;
        $datauser['email'] = $lowsingkatan.'@mail.com';
        $datauser['username'] = 'kak_'.$lowsingkatan;

        User::where('id', $user->id)->update($datauser);

        if($request->pemekaran != ''){
            $ppm = Pemekaranskpd::where('kode_skpd', $request->kode)->where('kode_pemekaran', $request->pemekaran)->first();
            if($ppm == ''){
                $datamekar['kode_skpd'] = $request->kode;
                $datamekar['kode_pemekaran'] = $request->pemekaran;

                Pemekaranskpd::create($datamekar);
            }
        }

        return redirect('/skpd')->with('warning', 'Berhasil merubah SKPD');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function destroy(SKPD $sKPD)
    {
        //
    }
}