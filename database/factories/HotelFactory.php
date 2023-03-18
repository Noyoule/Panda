<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(3),
            'type' => $this->faker->numberBetween($min = 1, $max = 5),
            'image_path' => $this->faker->imageUrl(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
