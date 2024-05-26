<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\Mps;
use App\Models\Mrp;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $mrp = Mrp::all();

        return view('riwayat.index', [
            'mps' => Mps::get(),
            'boms' => Bom::get(),
            'mrp' => $mrp,

        ]);
    }
}
