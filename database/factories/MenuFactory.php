<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->city(),
            'number' => $this->faker->numberBetween(1, 9),
            'deskripsi' => $this->faker->paragraph(),
            'foto' => $this->faker->imageUrl(),
        ];
    }
}
