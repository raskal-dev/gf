<?php

namespace App\Providers;

use App\Models\Demande;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Vérifiez si les migrations sont en cours d'exécution
        if (!Schema::hasTable('demandes')) {
            return;
        }

        $demandesNonInscrites = Demande::where('isinscrit', false)->get();
        $countDemandesNonInscrites = $demandesNonInscrites->count();

        view()->share('countDemandesNonInscrites', $countDemandesNonInscrites);
    }
}
