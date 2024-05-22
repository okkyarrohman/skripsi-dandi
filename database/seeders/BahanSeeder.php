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
            'name' => 'Teh',
            'satuan' => 'Gram',
            'stokAwal' => 1000,
            'stokAkhir' => 1000,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        Bahan::create([
            'name' => 'Gula',
            'satuan' => 'Gram',
            'stokAwal' => 500,
            'stokAkhir' => 500,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        Bahan::create([
            'name' => 'Air',
            'satuan' => 'Ml',
            'stokAwal' => 10000,
            'stokAkhir' => 10000,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        Bahan::create([
            'name' => 'Es Batu',
            'satuan' => 'Butir',
            'stokAwal' => 200,
            'stokAkhir' => 200,
            'jadwalPenerimaan' => $faker->dateTimeBetween('2024-01-01', '2024-01-31')->format('Y-m-d'),
        ]);

        // Tambahkan data bahan lainnya sesuai kebutuhan
    }
}
