<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Formation;
use App\Models\Personne;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_pers = $request->id_pers;
        $id_for = $request->id_for;

        // $evaluation = Evaluation::where('id_pers', $id_pers)->where('id_for', $id_pers)->get();
        $evaluation = Evaluation::whereRaw("id_pers = '$id_pers' AND id_for = $id_for")->first();
        $personnes = Personne::all();
        $formations = Formation::all();

        $personne = $personnes->find($id_pers);
        $formation = $formations->find($id_for);

        return view('pages.evaluation.evaluation', compact(
            'personne',
            'formation',
            'evaluation'
        ));
    }

    public function showNote(Request $request)
    {
        $id_ev = $request->id_ev;
        $evaluations = Evaluation::all();
        $evaluation = $evaluations->find($id_ev);

        return view('pages.note.noteCreate', compact(
            'evaluation'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
