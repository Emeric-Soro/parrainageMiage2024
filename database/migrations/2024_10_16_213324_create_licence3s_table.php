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
        Schema::create('licence3s', function (Blueprint $table) {
            $table->bigIncrements('id_L3');
            $table->string('nom_L3');
            $table->string('prenom_L3');
            $table->string('email_L3')->unique();
            $table->string('mot_de_passe_L3');
            $table->string('photo_L3')->nullable();
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
        Schema::dropIfExists('licence3s');
    }
};
