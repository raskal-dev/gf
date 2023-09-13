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
        Route::get('/demande', [DemandeController::class, 'create'])->name('demande.form');
        Route::post('/demande/ajouter', [DemandeController::class, 'store'])->name('demande.ajouter');
        // DEMANDE
        Route::get('/demande/liste', [DemandeController::class, 'index'])->name('demande.liste');
        Route::get('/demande/accepte/{id_demande}', [DemandeController::class, 'formAccepte'])->name('demande.form.accepte');

        Route::view('/register', 'auth.register')->name('user.register');
        Route::post('/register-user', [UserAuthController::class, 'store'])->name('user.ajouter.register');

        Route::get('menu', [UserAuthController::class, 'dash'])->name('home.dash');
        Route::get('profile', [UserAuthController::class, 'profile'])->name('user.profile');
        Route::put('profile_user/{user}', [UserAuthController::class, 'update'])->name('update.profile');
        Route::put('profile/{user}', [UserAuthController::class, 'Update_Password'])->name('password.Update');
        Route::delete('profile/{user}', [UserAuthController::class, 'destroy'])->name('user.delete');

        // FORMATION
        Route::get('/formation', [FormationController::class, 'index'])->name('formation');
        Route::get('/formation/create', [FormationController::class, 'create'])->name('formation.create');
        Route::post('/foramtsion/ajout', [FormationController::class, 'store'])->name('formation.ajout');
        Route::get('/foramtsion/liste/personnes/{id_for}', [FormationController::class, 'personneFormation'])->name('formation.liste.personnes');
        Route::get('/foramtsion/liste/personnes/pdf/{id_for}', [FormationController::class, 'printpdf'])->name('print.pdf');

        // PERSONNE
        Route::get('/personne', [PersonneController::class, 'index'])->name('personne');
        Route::post('/persionne', [PersonneController::class, 'store'])->name('personne.ajout');
        Route::get('/persionne/update/{personne}', [PersonneController::class, 'show'])->name('personne.show');
        Route::post('/persionne/update/personne:{idper}/demande:{iddem}', [PersonneController::class, 'update'])->name('personne.update');

        // FORMATUER
        Route::get('/formateur', [FormateurController::class, 'index'])->name('formateur');
        Route::get('/formateur/create', [FormateurController::class, 'create'])->name('formateur.create');
        Route::post('/formateur/ajouter', [FormateurController::class, 'store'])->name('formateur.ajouter');
        Route::get('/formateur/info/{id_form}', [FormateurController::class, 'info'])->name('formateur.info');
        Route::get('/formateur/contrat/{id_form}', [FormateurController::class, 'contrat'])->name('formateur.contrat');

        // FORMER
        Route::post('/former/ajouter', [FormerController::class, 'store'])->name('former.ajouter');

        // EVALUATION
        Route::get('/evaluation/personne:{id_pers}/formation:{id_for}', [EvaluationController::class, 'index'])->name('evaluation');
        Route::get('/evaluation/note/ev:{id_ev}{id_pers}{id_for}', [EvaluationController::class, 'showNote'])->name('evaluation.note.ajouter');

        // PRINT
        Route::view('/pdf', 'pages.formation.printpdf')->name('pdf');

        // TWILIO
        Route::get('/sms', [TwilioSMS::class, 'index'])->name('sms');
        Route::post('/recievesms', [TwilioSMS::class, 'processIncomingSMS'])->name('processIncomingSMS');

        // NOTE
        Route::post('/note/ajouter/ev:{id_ev}', [NoteController::class, 'store'])->name('note.ajouter');
        Route::put('/note/update/ev:{note}{id_pers}{id_for}', [NoteController::class, 'update'])->name('note.update');
        Route::get('/note/show/note:{note}{id_pers}{id_for}', [NoteController::class, 'show'])->name('note.show');
        Route::delete('/note:{note}', [NoteController::class, 'destroy'])->name('note.delete');

        // RETOUR
        Route::get('/retour', function () {
            return redirect()->back();
        })->name('retour');

    });
});


