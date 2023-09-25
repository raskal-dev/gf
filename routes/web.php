<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\TwilioSMS;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/webhook', 'WebhookController@verify');
Route::post('/webhook', 'WebhookController@handle');

Route::get('/', function () {
    return view('auth.login');
})->name('home.laravel');

Route::get('/Logout', [UserAuthController::class, 'logout'])->name('logout');

// TEST Design
Route::view('/test', 'pages.test');

Route::middleware('alreadyloggedin')->group(function () {
    Route::post('login-user', [UserAuthController::class, 'login'])->name('user.login.sign.in');
    Route::get('login', [UserAuthController::class, 'index'])->name('user.login');

    // DEMANDE POUR PUBLEQUE
    Route::get('/demande', [DemandeController::class, 'create'])->name('demande.form');
    Route::post('/demande/ajouter', [DemandeController::class, 'store'])->name('demande.ajouter');
});

Route::middleware('prevent-back-history')->group(function () {
    Route::middleware('isLogged')->group(function () {

        // DEMANDE POUR PUBLEQUE
        Route::get('/demande', [DemandeController::class, 'getFormInscritDemande'])->name('demande.form');
        Route::post('/demande/ajouter', [DemandeController::class, 'addDemande'])->name('demande.ajouter');
        // DEMANDE
        Route::get('/demande/liste', [DemandeController::class, 'getDemandeNoInscrit'])->name('demande.liste');
        Route::get('/demande/accepte/{id_demande}', [DemandeController::class, 'getFormAccepte'])->name('demande.form.accepte');

        // User
        Route::view('/register', 'auth.register')->name('user.register');
        Route::post('/register-user', [UserAuthController::class, 'store'])->name('user.ajouter.register');

        // Profile
        Route::get('menu', [UserAuthController::class, 'dash'])->name('home.dash');
        Route::get('profile', [UserAuthController::class, 'profile'])->name('user.profile');
        Route::put('profile_user/{user}', [UserAuthController::class, 'update'])->name('update.profile');
        Route::put('profile/{user}', [UserAuthController::class, 'Update_Password'])->name('password.Update');
        Route::delete('profile/{user}', [UserAuthController::class, 'destroy'])->name('user.delete');

        // FORMATION
        Route::get('/formation', [FormationController::class, 'getFormation'])->name('formation');
        Route::get('/formation/create', [FormationController::class, 'getFormFormation'])->name('formation.create');
        Route::post('/foramtsion/ajout', [FormationController::class, 'addFormation'])->name('formation.ajout');
        Route::get('/foramtsion/liste/personnes/{id_for}', [FormationController::class, 'getPersonneFormation'])->name('formation.liste.personnes');
        Route::get('/foramtsion/liste/personnes/pdf/{id_for}', [FormationController::class, 'pdfFormation'])->name('print.pdf');
        Route::get('/formation/liste/admis/formation:{id_for}', [FormationController::class, 'getListeAdmis'])->name('formation.liste.admis');
        Route::get('/formation/certificats/formation:{id_for}', [FormationController::class, 'exportCertificats'])->name('formation.certificats');

        // PERSONNE
        Route::get('/personne', [PersonneController::class, 'getPersonne'])->name('personne');
        Route::post('/persionne', [PersonneController::class, 'addPersonne'])->name('personne.ajout');
        Route::get('/persionne/update/{personne}', [PersonneController::class, 'getPersonneUpdate'])->name('personne.show');
        Route::post('/persionne/update/personne:{idper}/demande:{iddem}', [PersonneController::class, 'updatePersonne'])->name('personne.update');
        Route::delete('/persionne/delete/personne:{personne}', [PersonneController::class, 'destroyPersonne'])->name('personne.delete');
        Route::get('/certificat/personne:{id_pers}/formation:{id_for}', [PersonneController::class, 'certificatPersonne'])->name('certificat');

        // FORMATUER
        Route::get('/formateur', [FormateurController::class, 'getFormateur'])->name('formateur');
        Route::get('/formateur/create', [FormateurController::class, 'getFormFormateur'])->name('formateur.create');
        Route::post('/formateur/ajouter', [FormateurController::class, 'addFormateur'])->name('formateur.ajouter');
        Route::get('/formateur/info/{id_form}', [FormateurController::class, 'getFormationFormateur'])->name('formateur.info');
        Route::get('/formateur/contrat/{id_form}', [FormateurController::class, 'getFormContrat'])->name('formateur.contrat');
        Route::post('/former/ajouter', [FormateurController::class, 'addContrat'])->name('former.ajouter');

        // EVALUATION
        Route::get('/evaluation/personne:{id_pers}/formation:{id_for}', [EvaluationController::class, 'getEvaluation'])->name('evaluation');
        Route::get('/evaluation/note/ev:{id_ev}{id_pers}{id_for}', [EvaluationController::class, 'getNote'])->name('evaluation.note.ajouter');

        // PRINT
        Route::view('/pdf', 'pages.formation.printpdf')->name('pdf');

        // TWILIO
        Route::get('/sms', [TwilioSMS::class, 'index'])->name('sms');
        Route::post('/recievesms', [TwilioSMS::class, 'processIncomingSMS'])->name('processIncomingSMS');

        // NOTE
        Route::post('/note/ajouter/ev:{id_ev}', [NoteController::class, 'addNote'])->name('note.ajouter');
        Route::put('/note/update/ev:{note}{id_pers}{id_for}', [NoteController::class, 'updateNote'])->name('note.update');
        Route::get('/note/show/note:{note}{id_pers}{id_for}', [NoteController::class, 'getFormUpdateNote'])->name('note.show');
        Route::delete('/note:{note}', [NoteController::class, 'destroyNote'])->name('note.delete');
        Route::get('/note/relevernote:{id_pers}{id_for}', [NoteController::class, 'pdfNote'])->name('note.pdf');

        // Message
        Route::post('/receive-sms', [MessageController::class, 'receive']);
        Route::get('/receive-sms', [MessageController::class, 'receiveSms']);

        // RETOUR
        Route::get('/retour', function () {
            return redirect()->back();
        })->name('retour');

    });
});


