<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_form', 50);
            $table->string('prenom_form', 100)->nullable();
            $table->string('cin_form', 12);
            $table->string('sexe_form', 1);
            $table->date('date_nais_form');
            $table->string('num_tel_form', 13);
            $table->string('mail_form', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formateurs');
    }
};
