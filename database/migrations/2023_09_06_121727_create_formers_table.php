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
        Schema::create('formers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_for')->constrained('formations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_form')->constrained('formateurs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('formers');
    }
};
