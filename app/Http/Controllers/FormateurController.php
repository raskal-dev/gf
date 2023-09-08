<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Formation;
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

        $formateurs = Formateur::orderBy('id', 'desc')->get();
        return view('pages.formateur.formateur', compact(
            'formateurs'
        ));
    }

    public function info(Request $request)
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
