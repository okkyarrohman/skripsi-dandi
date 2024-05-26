<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function index(Request $request){
    //     return view('/dashboard')->with('success','Success login');
    // }

    public function index(Request $request)
    {
        $jumlahMenu = Menu::count();
        $jumlahBahan = Bahan::count();
        $mps = Mps::with('boms.bahan')->get();
        return view('dashboard.dashboard', [
            'mps' => $mps,
            'boms' => Bom::get(),
            'jumlahMenu' => $jumlahMenu,
            'jumlahBahan' => $jumlahBahan,
        ]);
    }

}
