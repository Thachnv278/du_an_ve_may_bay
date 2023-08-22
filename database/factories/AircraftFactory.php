<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'aircraft_name' =>fake()->word(),
            'seat_type_1' => fake()->word(),
            'seat_count_type_1' => fake()->randomDigit(),
            'seat_type_2' => fake()->word(),
            'seat_count_type_2' => fake()->randomDigit(),
            'seating_capacity' => fake()->randomDigitNotNull(),
        ];
    }
}
