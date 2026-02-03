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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date_reservation');
            $table->enum('status', ['confirme', 'pending', 'cancelled']);
            $table->integer('seat_number');
            $table->decimal('prix', 8, 2);

            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('segment_id')->nullable()->constrained('segments')->onDelete('set null');
            $table->foreignId('programme_id')->nullable()->constrained('programmes')->onDelete('set null');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
