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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 30);
            $table->string('prenom', 60)->nullable();
            $table->string('mail')->nullable()->unique();
            $table->string('num_tel', 13);
            $table->date('date_nais');
            $table->string('cin', 12)->unique()->nullable();
            $table->string('sexe', 1);
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
        Schema::dropIfExists('demandes');
    }
};
