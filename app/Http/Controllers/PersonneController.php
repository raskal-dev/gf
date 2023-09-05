<?php

namespace App\Http\Controllers;

use App\Actions\FonctionAction;
use App\Models\Demande;
use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnes = Personne::orderBy('id', 'desc')->get();
        return view('pages.personne.personne', compact(
            'personnes'
        ));
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

        $latestPersonne = Personne::latest()->first();
        if ($latestPersonne !== null) {
            $idlastpresonne = $latestPersonne->id + 1;
        } else {
            $idlastpresonne = 1;
        }
        $matricule = FonctionAction::genererMatricule($idlastpresonne, 4);


        $request->validate([
            'id_dem' => 'required',
            'id_for' => 'required'
        ]);

        Personne::create([
            'matricule' => $matricule,
            'id_dem' => $request->id_dem,
            'id_for' => $request->id_for
        ]);

        $idDem = $request->id_dem;
        $demandes = Demande::all();
        $demandeselect = $demandes->find($idDem);

        $demandeselect->update([
            'isinscrit' => true
        ]);

        return redirect()->route('personne')->with('success', "Operation réussi avec success !.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //
    }
}
