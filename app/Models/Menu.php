<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'nama',
        'number',
        'deskripsi',
        'foto'
    ];

    public function bom()
    {
        return $this->hasMany(Bom::class);
    }
}
