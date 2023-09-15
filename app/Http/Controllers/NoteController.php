<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Formation;
use App\Models\Note;
use App\Models\Personne;
use Illuminate\Http\Request;
use PDF;
use PhpParser\Node\Expr\Cast\Double;

class NoteController extends Controller
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
    public function addNote(Request $request)
    {
        $id_pers = $request->id_pers;
        $id_for = $request->id_for;
        $id_ev = $request->id_ev;
        $evaluation = Evaluation::whereRaw("id_pers = '$id_pers' AND id_for = $id_for")->first();
        $personnes = Personne::all();
        $formations = Formation::all();

        $personne = $personnes->find($id_pers);
        $formation = $formations->find($id_for);

        $testnote = Note::whereRaw("id_ev = '$id_ev' AND label = '$request->label'")->count();
        setlocale(LC_NUMERIC, 'fr_FR');
        $notedouble = (Double) str_replace(',', '.', $request->note);
        $noteformat = number_format($notedouble, 2, '.', '');
        if ($testnote > 0) {
            return back()->with('error', 'La note "'.$request->label.'" est déjà inscrit. Veillez inscrire une autre note, s\'il vous plait.');
        } else {
            $request->validate([
                'label' => 'required',
                'note' => 'required'
            ]);

            Note::create([
                'id_ev' => $id_ev,
                'label' => $request->label,
                'note' => $noteformat
            ]);

            return redirect()->route('evaluation', ['id_pers' => $personne->id, 'id_for' => $formation->id])->with('success', "Note a été ajouter avec succès.");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function getFormUpdateNote(Note $note, Request $request)
    {
        $notes = Note::all();
        $noteone = $notes->find($note);

        $id_pers = $request->id_pers;
        $id_for = $request->id_for;
        $evaluation = Evaluation::whereRaw("id_pers = '$id_pers' AND id_for = $id_for")->first();
        $personnes = Personne::all();
        $formations = Formation::all();

        $personne = $personnes->find($id_pers);
        $formation = $formations->find($id_for);

        return view('pages.note.noteUpdate', compact(
            'noteone',
            'evaluation',
            'personne',
            'formation'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function updateNote(Request $request, Note $note)
    {
        $notes = Note::all();
        $noteone = $notes->find($note);

        $id_pers = $request->id_pers;
        $id_for = $request->id_for;
        $evaluation = Evaluation::whereRaw("id_pers = '$id_pers' AND id_for = $id_for")->first();
        $personnes = Personne::all();
        $formations = Formation::all();

        $personne = $personnes->find($id_pers);
        $formation = $formations->find($id_for);

        setlocale(LC_NUMERIC, 'fr_FR');
        $notedouble = (Double) str_replace(',', '.', $request->note);
        $noteformat = number_format($notedouble, 2, '.', '');

        $request->validate([
            'label' => 'required',
            'note' => 'required'
        ]);

        $noteone->update([
            'label' => $request->label,
            'note' => $noteformat
        ]);

        // return view('pages.note.noteUpdate', compact(
        //     'noteone',
        //     'evaluation',
        //     'personne',
        //     'formation'
        // ));
        return redirect()->route('evaluation', ['id_pers' => $personne->id, 'id_for' => $formation->id])->with('success', "Note a été mise à jour avec succès.");
    }

    public function pdfNote(Request $request)
    {
        $id_pers = $request->id_pers;
        $id_for = $request->id_for;


        $evaluation = Evaluation::whereRaw("id_pers = '$id_pers' AND id_for = '$id_for'")->first();
        $notes = Note::where('id_ev', $evaluation->id)->get();

        $notesCount = (double)$notes->count();
        $notestotal = (double)$notes->sum('note');
        $moyenne = (double)$notes->sum('note') / (double)$notesCount;
        $moyen = number_format($moyenne, 2, '.', '');
        $moyentype = (double)$moyen;

        $pdf = PDF::loadView('pages.note.notePrint', compact(
            'evaluation',
            'notes',
            'moyentype',
            'notestotal'
        ));

        return $pdf->download('ficherelevenote.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroyNote(Note $note)
    {
        $note->delete();
        return back()->with('success', "La note a été supprimer avec succès");
    }
}
