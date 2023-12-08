<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\userData>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => '',
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->unique()->password(),
            'telepon' => fake()->phoneNumber(),
            'token' => fake()->numberBetween(1,100),
            'tanggalLahir' => fake()->unique()->date(),
            'usia' => fake()->numberBetween(1,100),
        ];
    }
}
