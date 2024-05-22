<?php

namespace Database\Seeders;

use App\Models\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Bahan::create([
            'name' => 'Beras',
            'satuan' => 'kg',
            'stokAwal' => 100,
            'stokAkhir' => 80,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        Bahan::create([
            'name' => 'Garam',
            'satuan' => 'gram',
            'stokAwal' => 500,
            'stokAkhir' => 400,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        // Tambahkan data bahan lainnya sesuai kebutuhan
    }
}
