<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->bigIncrements('id_reponse');
            $table->foreignId('id_question')->constrained('questions', 'id_question')->onDelete('cascade');
            $table->string('libelle_reponse');
            $table->integer('points');
            $table->timestamps();

            // Forcer l'utilisation du moteur InnoDB
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
