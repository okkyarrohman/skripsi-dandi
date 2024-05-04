<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mps extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'tanggal',
        'jumlah',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
