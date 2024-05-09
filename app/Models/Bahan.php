<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'satuan',
        'stokAwal',
        'stokAkhir',
        'jadwalPenerimaan',
        'jadwalKedatangan',
    ];

    public function boms()
    {
        return $this->hasMany(Bom::class, 'bahan_id');
    }

    public function mrp()
    {
        return $this->hasMany(Mrp::class, 'bahan_id');
    }
}
