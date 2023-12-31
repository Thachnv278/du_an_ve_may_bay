<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FlightSeeder::class,
            RouteSeeder::class,
            AircraftSeeder::class,
            // SeatTypeSeeder::class,
            // SeatSeeder::class,
            PassengerSeeder::class,
            TicketSeeder::class,
            BookingSeeder::class
        ]);
    }
}
