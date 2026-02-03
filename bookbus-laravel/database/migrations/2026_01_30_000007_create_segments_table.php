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
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('depart_id')->constrained('etapes')->onDelete('cascade');
            $table->foreignId('arrive_id')->constrained('etapes')->onDelete('cascade');
             $table->foreignId('route_id')->constrained('routes')->onDelete('cascade');
            $table->decimal('tarif', 5, 2);
            $table->time('duree_estimee');
            $table->decimal('distance_km', 8, 2);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segments');
    }
};
