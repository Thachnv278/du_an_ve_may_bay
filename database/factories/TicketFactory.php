<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flight_id' => fake()->numberBetween(1, 10),
            'name' => fake()->name(),
            'date_of_birth' => fake()->date(),
            'nationality' => fake()->country(),
            'seat_number' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(1, 10),
            'booking_id' => fake()->numberBetween(1, 10),
        ];
    }
}
