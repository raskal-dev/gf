<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Formation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::where('isinscrit', false)->get();
        return view('pages.demande.demandeList', compact(
            'demandes'
        ));
    }

    public function formAccepte(Request $request)
    {
        $demandeid = $request->id_demande;
        $now = Carbon::now();

        // Récupérer les formations en cours et en attente en fonction de l'heure actuelle
        $formations = Formation::where('date_fin', '>=', $now)->get();

        return view('pages.demande.demandeAccepte', compact(
            'formations',
            'demandeid'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.demande.demande');
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
            'nom' => "required",
            'mail' => "required",
            'num_tel' => "required",
            'cin' => "required|min:12|max:12",
            'date_nais' => "required",
            'sexe' => "required"
        ]);

        Demande::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'num_tel' => $request->num_tel,
            'date_nais' => $request->date_nais,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'isinscrit' => 0
        ]);

        return back()->with('success', "Votre demande a été bien envoyer et nous vous prions d'attandre la validation de votre demande.");
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
