<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'aircraft_id'=> fake()->numberBetween(1, 10),
           'route_id'=> fake()->numberBetween(1, 10),
           'DepartureTime' => fake()->datetime(),
           'ArrivalTime' => fake()->datetime(),
           'status'=> fake()->word(),
           'price_1'=> fake()->numberBetween(1, 10),
           'price_2'=> fake()->numberBetween(1, 10),
           
        ];
    }
}
