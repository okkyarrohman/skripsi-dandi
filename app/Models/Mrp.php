<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mrp extends Model
{
    use HasFactory;
    protected $fillable = [
        'bom_id',
        'menu_id',
        'bahan_id',
        'mps_id',
        'dateStart',
        'dateEnd',
    ];

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function boms()
    {
        return $this->belongsTo(Bom::class, 'bom_id', 'id');
    }
    public function bahan(){
        return $this->belongsTo(Bahan::class);
    }



    public function mps()
    {
        return $this->belongsTo(Mps::class, 'mps_id');
    }
}
