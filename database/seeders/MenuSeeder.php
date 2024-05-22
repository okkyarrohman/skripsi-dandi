<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Nasi Goreng',
            'harga' => 25000,
            'deskripsi' => 'Nasi goreng spesial dengan bumbu rahasia',
            'foto' => 'nasigoreng.jpg',
        ]);

        Menu::create([
            'name' => 'Mie Ayam',
            'harga' => 20000,
            'deskripsi' => 'Mie ayam dengan topping ayam goreng dan telur',
            'foto' => 'mieayam.jpg',
        ]);

        // Tambahkan data menu lainnya sesuai kebutuhan
    }
}
