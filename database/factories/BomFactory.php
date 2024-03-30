<?php

namespace Database\Factories;

use App\Models\Bahan;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bom>
 */
class BomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' =>  function () {
                return Menu::inRandomOrder()->first();
            },
            'bahan_id' =>  function () {
                return Bahan::inRandomOrder()->first();
            },
            'satuan' => $this->faker->randomElement(['Kg', 'Pcs']),
            'jumlah' => $this->faker->numberBetween(0, 9),
        ];
    }
}
