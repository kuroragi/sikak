<?php

namespace App\Http\Controllers;

use App\Personil;
use Illuminate\Http\Request;

class PersonilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.personil.index', [
            'personil' => Personil::all(),
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
            'slug' => 'required|unique:personils'
        ]);

        Personil::create($validatedData);

        return redirect('/personil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function show(Personil $personil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function edit(Personil $personil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personil $personil)
    {
        $rules = ([
            'name' => 'required'
        ]);

        if($personil->slug != $request->slug){
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Personil::where('id', $personil->id)
            ->update($validatedData);

        return redirect('/personil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personil $personil)
    {
        //
    }
}