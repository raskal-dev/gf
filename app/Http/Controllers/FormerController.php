<?php

namespace App\Http\Controllers;

use App\Models\Former;
use Illuminate\Http\Request;

class FormerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addContrat(Request $request)
    {
        $request->validate([
            'id_for' => 'required',
            'id_form' => 'required'
        ]);

        Former::create([
            'id_for' => $request->id_for,
            'id_form' => $request->id_form
        ]);

        return redirect()->route('formateur.info', ['id_form' => $request->id_form])->with('success', 'Assigation est succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Former  $former
     * @return \Illuminate\Http\Response
     */
    public function show(Former $former)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Former  $former
     * @return \Illuminate\Http\Response
     */
    public function edit(Former $former)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Former  $former
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Former $former)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Former  $former
     * @return \Illuminate\Http\Response
     */
    public function destroy(Former $former)
    {
        //
    }
}
