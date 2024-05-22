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
        $menu = Menu::all();
        $bahan = Bahan::all();
        $jumlahMenu = Menu::count();
        $jumlahBahan = Bahan::count();
        $boms = Bom::all();
        $mrp = Mps::all();
        $jumlahPerBahan = BOM::select('bahan_id', DB::raw('SUM(jumlah) as total_jumlah'))
        ->groupBy('bahan_id')
        ->get();
        return view('dashboard.dashboard', compact('jumlahPerBahan','jumlahBahan', 'jumlahMenu', 'menu','bahan','boms','mrp'));
    }

}
