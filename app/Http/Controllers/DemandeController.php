<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Formation;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemandeNoInscrit()
    {
        $demandes = Demande::where('isinscrit', false)->orderBy('id', 'desc')->get();
        return view('pages.demande.demandeList', compact(
            'demandes'
        ));
    }

    public function getFormAccepte(Request $request)
    {
        $demandeid = $request->id_demande;
        $demandes = Demande::all();
        $demande = $demandes->find($demandeid);
        $now = Carbon::now();

        $formations = Formation::where('date_fin', '>=', $now)->get();

        return view('pages.demande.demandeAccepte', compact(
            'formations',
            'demandeid',
            'demande'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormInscritDemande()
    {
        return view('pages.demande.demande');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDemande(Request $request)
    {
        $request->validate([
            'nom' => "required",
            'mail' => "required",
            'num_tel' => "required",
            'date_nais' => "required",
            'sexe' => "required",
            'demande' => "required"
        ]);

        Demande::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'num_tel' => $request->num_tel,
            'date_nais' => $request->date_nais,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'demande' => $request->demande,
            'isinscrit' => 0
        ]);

        return back()->with('success', "Votre demande a été bien envoyer et nous vous prions d'attandre la validation de votre demande.");
    }

    public function addDemandeApi(Request $request)
    {
        Demande::create([
            'nom' => $request->nom,
            'id_fb' => $request->id_fb,
            'prenom' => $request->prenom,
            'mail' => $request->email,
            'num_tel' => $request->tel,
            'date_nais' => $request->datenaissance,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'demande' => $request->formation,
            'isinscrit' => 0
        ]);

        return response()->json(['message' => 'User created'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        return view('pages.demande.demande');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
