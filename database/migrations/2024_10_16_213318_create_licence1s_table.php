<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     * 
     * migration de ma table licences 1
     */
    public function up(): void
    {
        Schema::create('licence1s', function (Blueprint $table) {
            $table->bigIncrements('id_L1');
            $table->string('nom_L1');
            $table->string('prenom_L1');
            $table->string('email_L1')->unique();
            $table->string('mot_de_passe_L1');
            $table->string('photo_L1')->nullable();
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
        Schema::dropIfExists('licence1s');
    }
};
