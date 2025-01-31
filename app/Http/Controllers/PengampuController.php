<?php

namespace App\Http\Controllers;

use App\Pengampu;
use App\SKPD;
use App\User;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengampu.index', [
            'user' => User::where('role_slug', 'pengampu')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        return view('pengampu.show', [
            'user' => $user,
            'pengampu' => Pengampu::with('skpd')->where('user_id', $request->user_id)->get(),
            'skpd' => SKPD::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pp = Pengampu::where('kode_skpd', $request->kode_skpd)->first();
        if($pp == ''){
            $validatedData = $request->validate([
                'user_id' => 'required',
                'kode_skpd' => 'required',
            ]);
    
            Pengampu::create($validatedData);
        }

        return redirect('/pengampu/create?user_id='.$request->user_id)->with('success', 'Berhasil menambahkan SKPD yang diampu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengampu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengampu $pengampu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengampu $pengampu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengampu $pengampu)
    {
        Pengampu::destroy('id', $pengampu->id);

        return redirect('/pengampu')->with('danger', 'Berhasil menghapus SKPD yang diampu');
    }
}
