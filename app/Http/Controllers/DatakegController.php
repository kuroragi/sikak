<?php

namespace App\Http\Controllers;

use App\Datakeg;
use Illuminate\Http\Request;

class DatakegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.datakeg.index', [
            'data' => Datakeg::all(),
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
            'name' => 'required',
            'slug' => 'required|unique:datakegs'
        ]);

        Datakeg::create($validatedData);

        return redirect('/datakeg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datakeg  $datakeg
     * @return \Illuminate\Http\Response
     */
    public function show(Datakeg $datakeg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datakeg  $datakeg
     * @return \Illuminate\Http\Response
     */
    public function edit(Datakeg $datakeg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datakeg  $datakeg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datakeg $datakeg)
    {
        $rules = ([
            'name' => 'required'
        ]);

        if($datakeg->slug != $request->slug){
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Datakeg::where('id', $datakeg->id)
            ->update($validatedData);

        return redirect('/datakeg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datakeg  $datakeg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datakeg $datakeg)
    {
        //
    }
}