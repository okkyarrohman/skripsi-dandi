<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    use HasFactory;

    protected $table = 'boms';

    protected $fillable = [
        'menu_id',
        'bahan_id',
        'satuan',
        'jumlah'
    ];


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
}
