<?php

namespace Database\Factories;

use App\Models\Bahan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mps>
 */
class MpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bahan_id' =>  function () {
                return Bahan::inRandomOrder()->first();
            },
            'tanggal' => $this->faker->date('Y-m-d'),
            'jumlah' => $this->faker->numberBetween(0, 9)
        ];
    }
}
