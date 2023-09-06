<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.formateur.formateur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.formateur.formateurCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_form' => 'required|max:50',
            'prenom_form' => 'required|max:100',
            'cin_form' => 'required|min:12|max:12',
            'sexe_form' => 'required',
            'date_nais_form' => 'required',
            'num_tel_form' => 'required',
            'mail_form' => 'required'
        ]);

        $formateur = Formateur::create([
            'nom_form' => $request->nom_form,
            'prenom_form' => $request->prenom_form,
            'cin_form' => $request->cin_form,
            'sexe_form' => $request->sexe_form,
            'date_nais_form' => $request->date_nais_form,
            'num_tel_form' => $request->num_tel_form,
            'mail_form' => $request->mail_form
        ]);

        return back()->with('success', "Le formateur `$formateur->nom_form $formateur->prenom_form` est ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show(Formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formateur $formateur)
    {
        //
    }
}
