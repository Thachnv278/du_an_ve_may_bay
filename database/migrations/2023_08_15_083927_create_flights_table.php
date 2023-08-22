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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('aircraft_id');
            $table->unsignedInteger('route_id');
            $table->datetime('DepartureTime');
            $table->datetime('ArrivalTime');
            $table->string('status')->default('Chưa bay');
            $table->integer('price_1');
            $table->integer('price_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
