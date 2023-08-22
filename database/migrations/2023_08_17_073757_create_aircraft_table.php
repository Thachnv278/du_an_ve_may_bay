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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('aircraft_name');
            $table->string('seat_type_1')->nullable();
            $table->integer('seat_count_type_1')->nullable();
            $table->string('seat_type_2')->nullable();
            $table->integer('seat_count_type_2')->nullable();
            $table->string('seating_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
