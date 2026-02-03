<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 50)->unique();
            $table->integer('capacite');
            $table->enum('status', ['actif', 'en_maintenance', 'hors_service'])->default('actif');
            $table->enum('type',['standard', 'confort', 'premium'])->default('standard');
            // $table->timestamsps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus');
    }
};
