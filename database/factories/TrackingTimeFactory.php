<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrackingTime>
 */
class TrackingTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => null,
            'user_id' => null,
            'duration_minutes' => $this->faker->numberBetween(1, 1000),
            'date' => fake()->date(),
        ];
    }
}
