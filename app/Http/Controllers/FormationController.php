<?php

namespace App\Http\Controllers;

use App\Actions\FonctionAction;
use App\Models\Evaluation;
use App\Models\Formation;
use App\Models\Note;
use App\Models\Personne;
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
    public function getFormation()
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
    public function getFormFormation()
    {
        return view('pages.formation.formationCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFormation(Request $request)
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

    public function getPersonneFormation(Request $request)
    {
        $id_for = $request->id_for;
        $formation = Formation::find($id_for);
        $personnesFormations = $formation->personne;

        return view('pages.formation.formationListePersonnes', compact(
            'personnesFormations',
            'formation'
        ));
    }

    public function pdfFormation(Request $request)
    {
        $id_for = $request->id_for;
        $formation = Formation::find($id_for);
        $personnesFormations = $formation->personne;

        $pdf = PDF::loadView('pages.formation.printpdf', compact(
            'personnesFormations',
            'formation'
        ));

        // pdf en paysage
        // $pdf = PDF::loadView('pages.formation.printpdf', compact(
        //     'personnesFormations',
        //     'formation'
        // ))->setPaper('A4', 'landscape');

        return $pdf->download('fichepresence.pdf');
    }

    // public function exportCertificats(Request $request)
    // {
    //     $id_for = $request->id_for;
    //     $formation = Formation::all()->find($id_for);


    //     // Obtenez la liste des personnes admises avec une moyenne >= 10
    //     $personnesAdmises = Personne::where('id_for', $id_for)
    //         ->with('note') // Assurez-vous que les notes sont chargées
    //         ->get()
    //         ->filter(function ($personne) {
    //             $moyenne = $personne->note->avg('note');
    //             if ($moyenne < 10) {
    //                 $mention = 'Horrible';
    //             } elseif ($moyenne >= 10 && $moyenne < 12) {
    //                 $mention = 'Passable';
    //             } elseif ($moyenne >= 12 && $moyenne < 14) {
    //                 $mention = 'Assez Bien';
    //             } elseif ($moyenne >= 14 && $moyenne < 16) {
    //                 $mention = 'Bien';
    //             } elseif ($moyenne >= 16 && $moyenne < 20) {
    //                 $mention = 'Très Bien';
    //             }
    //             return [$moyenne >= 10, $mention];
    //         });



    //     // Créez un PDF
    //     $pdf = new \Dompdf\Adapter\CPDF();
    //     $pdf->set_paper('A4', 'landscape');

    //     foreach ($personnesAdmises as $personne) {
    //         // Chargez la vue du certificat pour chaque personne
    //         $certificatView = view('pages.formation.certificats', compact('personne', 'formation', 'mention'))->render();

    //         // Ajoutez le contenu du certificat au PDF
    //         $pdf->add_page();
    //         $pdf->stream_html($certificatView);
    //     }

    //     // Téléchargez le PDF final
    //     $pdf->stream("certificats.pdf");
    // }


    public function exportCertificats(Request $request)
    {
        $id_for = $request->id_for;

        // Obtenez la liste des personnes admises avec une moyenne >= 10
        $personnesAdmises = Personne::where('id_for', $id_for)
            ->with('note') // Assurez-vous que les notes sont chargées
            ->get()
            ->filter(function ($personne) {
                $moyenne = $personne->note->avg('note');
                return $moyenne >= 10;
            })
            ->map(function ($personne) {
                $moyenne = $personne->note->avg('note');
                $mention = '';

                if ($moyenne < 10) {
                    $mention = 'Horrible';
                } elseif ($moyenne >= 10 && $moyenne < 12) {
                    $mention = 'Passable';
                } elseif ($moyenne >= 12 && $moyenne < 14) {
                    $mention = 'Assez Bien';
                } elseif ($moyenne >= 14 && $moyenne < 16) {
                    $mention = 'Bien';
                } elseif ($moyenne >= 16 && $moyenne < 20) {
                    $mention = 'Très Bien';
                }

                return [
                    'personne' => $personne,
                    'mention' => $mention,
                ];
            });

        // Générez le PDF
        $pdf = PDF::loadView('pages.formation.certificats', compact('personnesAdmises'))->setPaper('A4','landscape');

        // Téléchargez le PDF final
        return $pdf->download('certificats.pdf');
    }

    // public function getListeAdmis(Request $request)
    // {
    //     $id_for = $request->id_for;

    //     // Récupérez la formation correspondant à $id_for
    //     $formation = Formation::find($id_for);

    //     // Vérifiez si la formation existe
    //     if ($formation) {
    //         // Récupérez toutes les personnes inscrites à cette formation
    //         $personnes = Personne::where('id_for', $id_for)->get();

    //         // Parcourez chaque personne pour calculer sa moyenne
    //         foreach ($personnes as $personne) {
    //             $notes = Note::where('id_ev', $personne->evaluation->id)->get();

    //             // Calculez la moyenne
    //             $notesCount = $notes->count();
    //             $notestotal = $notes->sum('note');
    //             $moyenne = $notestotal / ($notesCount > 0 ? $notesCount : 1);

    //             // Ajoutez la moyenne à chaque personne
    //             $personne->moyenne = number_format($moyenne, 2, '.', '');
    //         }

    //         // Maintenant, vous avez la liste des personnes avec leurs moyennes
    //         return view('pages.formation.formationListeAdmis', compact('formation', 'personnes'));
    //     } else {
    //         // Gérez le cas où la formation n'existe pas
    //         return redirect()->route('formation')->with('error', 'Formation non trouvée.');
    //     }
    // }

    public function getListeAdmis(Request $request)
    {
        $id_for = $request->id_for;

        // Récupérez la formation correspondant à $id_for
        $formation = Formation::find($id_for);

        // Vérifiez si la formation existe
        if (!$formation) {
            // Gérez le cas où la formation n'existe pas
            return redirect()->route('formation')->with('error', 'Formation non trouvée.');
        }

        // Récupérez toutes les personnes inscrites à cette formation avec leurs notes
        $personnes = Personne::where('id_for', $id_for)->with('note')->get();

        // Parcourez chaque personne pour calculer sa moyenne
        foreach ($personnes as $personne) {
            $notes = $personne->note; // Accédez aux notes directement depuis la relation

            // Calculez la moyenne
            $notesCount = $notes->count();
            $notestotal = $notes->sum('note');
            $moyenne = $notesCount > 0 ? $notestotal / $notesCount : 0;

            // Ajoutez la moyenne à chaque personne
            $personne->moyenne = number_format($moyenne, 2, '.', '');
        }
        // Maintenant, vous avez la liste des personnes avec leurs moyennes
        return view('pages.formation.formationListeAdmis', compact('formation', 'personnes'));
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
