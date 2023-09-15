<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Former;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormateur()
    {

        $formateurs = Formateur::orderBy('id', 'desc')->get();
        return view('pages.formateur.formateur', compact(
            'formateurs'
        ));
    }

    public function getFormationFormateur(Request $request)
    {
        // Utilisez $formateur_id pour obtenir le formateur spécifique
        $formateur = Formateur::find($request->id_form);

        if (!$formateur) {
            // Gérez le cas où le formateur n'est pas trouvé (par exemple, redirigez vers une page d'erreur)
            return redirect()->view('pages.formateur.formateurErreur');
        }

        // Maintenant, vous pouvez accéder aux formations associées à ce formateur
        $formations = $formateur->former->map(function ($formationAssignee) {
            return $formationAssignee->formation;
        });

        // Faites quelque chose avec les $formations (par exemple, les transmettre à une vue)
        return view('pages.formateur.formateurPlusInfo', compact(
            'formations',
            'formateur'
        ));
    }

    public function getFormContrat(Request $request)
    {
        $formateurid = $request->id_form;
        $formateur = Formateur::find($formateurid);
        $now = Carbon::now();

        $formations = Formation::where('date_fin', '>=', $now)->get();

        return view('pages.formateur.formateurContrat', compact(
            'formateur',
            'formations'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormFormateur()
    {
        return view('pages.formateur.formateurCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFormateur(Request $request)
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
