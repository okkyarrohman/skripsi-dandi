<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use App\Models\Mrp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MrpController extends Controller
{
    public function index(Request $request){

        $boms = Bom::all();
        $menus = Menu::all();
        $mrp = Mps::all();
        $bahans = Bahan::all();
        $jumlahPerBahan = BOM::select('bahan_id', DB::raw('SUM(jumlah) as total_jumlah'))
        ->groupBy('bahan_id')
        ->get();


        return view('mrp.index', compact('boms','jumlahPerBahan', 'menus', 'mrp', 'bahans'));
    }

    public function result(Request $request) {
        $boms = Bom::all();
        $bahans = Bahan::all();

        // Mulai membangun query baru berdasarkan model Mrp
        $bomId = $request->input('bom_id');
        $startDate = $request->input('tanggal_awal');
        $endDate = $request->input('tanggal_akhir');

        $mrp = Mps::query();

        if ($bomId) {
            $mrp->where('bom_id', $bomId);
        }


        if ($startDate && $endDate) {
            $mrp->whereBetween('tanggal', [$startDate, $endDate]);
        }


        // Ambil hasil query
        $mrp = $mrp->get();


        $jumlahPerBahan = BOM::select('bahan_id', DB::raw('SUM(jumlah) as total_jumlah'))
        ->groupBy('bahan_id')
        ->get();
        return view('mrp.index', compact('mrp','jumlahPerBahan', 'boms', 'bahans'));
    }

    public function print(Request $request){

        $boms = Bom::all();
        $menus = Menu::all();
        $mrp = Mps::all();
        $bahans = Bahan::all();
        $jumlahPerBahan = BOM::select('bahan_id', DB::raw('SUM(jumlah) as total_jumlah'))
        ->groupBy('bahan_id')
        ->get();


        return view('mrp.result', compact('boms','jumlahPerBahan', 'menus', 'mrp', 'bahans'));
    }


}
