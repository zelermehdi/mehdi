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
       Schema::create('opening_hours', function ($table) {
    $table->id();
    $table->unsignedTinyInteger('day_of_week'); // 1=lundi ... 7=dimanche
    $table->boolean('is_closed')->default(false);
    $table->time('opens_at')->nullable();
    $table->time('closes_at')->nullable(); // ex 02:00 => fermeture après minuit
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};
