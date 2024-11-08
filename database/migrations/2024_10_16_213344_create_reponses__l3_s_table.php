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
        Schema::create('reponses_l3s', function (Blueprint $table) {
            $table->bigIncrements('id_reponse_L3');
            $table->foreignId('id_L3')->constrained('licence3s', 'id_L3')->onDelete('cascade');
            $table->foreignId('id_question')->constrained('questions', 'id_question')->onDelete('cascade');
            $table->foreignId('id_reponse')->constrained('reponses', 'id_reponse')->onDelete('cascade');
            $table->integer('points_obtenus');
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
        Schema::dropIfExists('reponses_l3s');
    }
};
