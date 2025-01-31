<?php

namespace App\Http\Controllers;

use App\Instrumen;
use Illuminate\Http\Request;

class InstrumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.instrumen.index', [
            'instru' => Instrumen::all(),
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
            'slug' => 'required|unique:instrumens'
        ]);

        Instrumen::create($validatedData);

        return redirect('/instrumen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function show(Instrumen $instruman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrumen $instrumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrumen $instruman)
    {
        $rules = ([
            'name' => 'required'
        ]);

        if($instruman->slug != $request->slug){
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Instrumen::where('id', $instruman->id)
            ->update($validatedData);

        return redirect('/instrumen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrumen $instruman)
    {
        //
    }
}
