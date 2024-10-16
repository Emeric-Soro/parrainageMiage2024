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
        Schema::create('correspondances', function (Blueprint $table) {
            $table->bigIncrements('id_correspondance');
            $table->foreignId('id_L1')->constrained('licence1s', 'id_L1')->onDelete('cascade');
            $table->foreignId('id_L3')->constrained('licence3s', 'id_L3')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondances');
    }
};
