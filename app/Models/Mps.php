<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mps extends Model
{
    use HasFactory;

    protected $table = 'mps';

    protected $fillable = [
        'bahan_id',
        'tanggal',
        'jumlah'
    ];


    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
}
