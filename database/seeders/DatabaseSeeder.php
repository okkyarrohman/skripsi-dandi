<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MenuSeeder::class,
            // tambahkan seeder lain jika ada
        ]);

        $this->call([
            BahanSeeder::class,
            // tambahkan seeder lain jika ada
        ]);
        DB::table('users')->insert([
            'name' => 'RafiAnwar',
            'email' => 'email@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
