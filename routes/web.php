<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\PersonneController;
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
    return view('welcome');
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
        Route::view('/formation', 'pages.formation.formation')->name('formation');
        Route::get('/formation/create', [FormationController::class, 'create'])->name('formation.create');
        Route::post('/foramtsion/ajout', [FormationController::class, 'store'])->name('formation.ajout');

        // PERSONNE
        Route::get('/personne', [PersonneController::class, 'index'])->name('personne');
        Route::post('/persionne', [PersonneController::class, 'store'])->name('personne.ajout');

        // FORMATUER
        Route::get('/formateur', [FormateurController::class, 'index'])->name('formateur');
        Route::get('/formateur/create', [FormateurController::class, 'create'])->name('formateur.create');
        Route::post('/formateur/ajouter', [FormateurController::class, 'store'])->name('formateur.ajouter');

    });
});


