<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mps extends Model
{
    use HasFactory;
    protected $fillable = [
        'bom_id',
        'menu_id',
        'tanggal',
        'jumlah',
        'produkJumlah'
    ];

    public function boms()
    {
        return $this->belongsTo(Bom::class, 'bom_id', 'id');
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function mrp()
    {
        return $this->hasMany(Mrp::class, 'mps_id');
    }


}
