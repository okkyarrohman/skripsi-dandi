<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'bahan_id',
        'satuan',
        'jumlah',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }

    public function mps()
    {
        return $this->hasMany(Mps::class, 'bom_id');
    }

    public function mrp()
    {
        return $this->hasMany(Mrp::class, 'bom_id');
    }
}
