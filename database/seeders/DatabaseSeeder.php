<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Menu::factory(5)->create();
        Bahan::factory(5)->create();
        Bom::factory(5)->create();
        Mps::factory(5)->create();
    }
}
