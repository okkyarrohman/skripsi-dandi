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
            'name' => 'Es Teh',
            'harga' => 4000,
            'deskripsi' => 'Es Teh minuman sejuta umat',
            'foto' => 'esteh.jpg',
        ]);

        // Tambahkan data menu lainnya sesuai kebutuhan
    }
}
