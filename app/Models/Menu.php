<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'harga',
        'deskripsi',
        'foto',
    ];

    public function boms()
    {
        return $this->hasMany(Bom::class, 'menu_id');
    }

    public function mps()
    {
        return $this->hasMany(Mps::class, 'menu_id');
    }

    public function mrp()
    {
        return $this->hasMany(Mrp::class, 'menu_id');
    }


}
