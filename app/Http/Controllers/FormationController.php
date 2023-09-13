<?php

namespace App\Http\Controllers;

use App\Actions\FonctionAction;
use App\Models\Formation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::orderBy('id', 'desc')->get();
        return view('pages.formation.formation', compact(
            'formations'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.formation.formationCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ref = FonctionAction::getRef(6);

        $request->validate([
            'module' => "required",
            'description' => "required",
            'date_debut' => "required",
            'date_fin' => "required"
        ]);

        $now = now();
        $date_debut = Carbon::parse($request->date_debut);
        $date_fin = Carbon::parse($request->date_fin);

        if ($date_debut > $date_fin) {

            return back()->with('success', "Le date du debut doit êtres avant la date fin.");

        } else {

            Formation::create([
                'ref' => $ref,
                'module' => $request->module,
                'description' => $request->description,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin
            ]);

            return back()->with('success', "La création de la formation est avec succès.");
        }

    }

    public function personneFormation(Request $request)
    {
        $id_for = $request->id_for;
        $formation = Formation::find($id_for);
        $personnesFormations = $formation->personne;

        return view('pages.formation.formationListePersonnes', compact(
            'personnesFormations',
            'formation'
        ));
    }

    public function printpdf(Request $request)
    {
        $id_for = $request->id_for;
        $formation = Formation::find($id_for);
        $personnesFormations = $formation->personne;

        $pdf = PDF::loadView('pages.formation.printpdf', compact(
            'personnesFormations',
            'formation'
        ));

        return $pdf->download('fichepresence.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
