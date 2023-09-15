<?php

namespace App\Http\Controllers;

use App\Actions\FonctionAction;
use App\Models\Demande;
use App\Models\Evaluation;
use App\Models\Formation;
use App\Models\Personne;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPersonne()
    {
        $personnes = Personne::orderBy('id', 'desc')->get();

        foreach ($personnes as $personne) {
            $dateDeNaissance = $personne->demande->date_nais;

            // Calculez l'âge à partir de la date de naissance
            $age = Carbon::parse($dateDeNaissance)->age;

            // Ajoutez l'âge calculé à la personne actuelle
            $personne->age = $age;
        }
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
    public function addPersonne(Request $request)
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
            'id_for' => 'required',
            'annee' => 'required|min:4|max:4'
        ]);

        $personne = Personne::create([
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

        Evaluation::create([
            'id_pers' => $personne->id,
            'id_for' => $request->id_for,
            'annee' => $request->annee
        ]);

        return redirect()->route('personne')->with('success', "Operation réussi avec success !.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function getPersonneUpdate(Personne $personne)
    {
        $personnes = Personne::all();

        $now = Carbon::now();
        $formations = Formation::where('date_fin', '>=', $now)->get();
        $personne = $personnes->find($personne);

        return view('pages.personne.personneUpdate', compact(
            'personne',
            'formations'
        ));
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
    public function updatePersonne(Request $request, Personne $personne)
    {
        $id_dem = $request->iddem;
        $id_per = $request->idper;

        $personnes = Personne::all();
        $personne = $personnes->find($id_per);

        $demandes = Demande::all();
        $demande = $demandes->find($id_dem);

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'mail' => 'required',
            'num_tel' => 'required',
            'date_nais' => 'required',
            'sexe' => 'required',
            'id_for' => 'required'
        ]);

        $personne->update([
            'id_for' => $request->id_for,
            'id_dem' => $id_dem
        ]);

        $demande->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'num_tel' => $request->num_tel,
            'date_nais' => $request->date_nais,
            'cin' => $request->cin,
            'sexe' => $request->sexe
        ]);

        return redirect()->route('personne')->with('success', "Operation réussi avec success !.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroyPersonne(Personne $personne)
    {
        $pd = $personne->demande;
        if (DB::table('evaluations')->where('id_pers', $personne->id)->exists()) {
            return redirect()->route('personne')->with('errordelete', "La personne '$pd->nom $pd->prenom' ne peut pas être supprimer car elle est encore attaché à Evaluation");
        } else {
            // Supprimer le cité de la base de données
            $personne->delete();

            // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
            return redirect()->route('personne')->with('success', "La personne '$pd->nom $pd->prenom' a été supprimer avec success");
        }
    }
}
