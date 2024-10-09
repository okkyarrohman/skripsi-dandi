<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use Illuminate\Http\Request;

class MpsController extends Controller
{
public function index(Request $request) {
    $boms = Bom::all();
    $menus = Menu::all();

    // Retrieve the start date from the request input
    $startDate = $request->input('tanggal_awal');

    // Initialize the MPS query
    $mps = Mps::query();

    // If a start date is provided, filter the records that match or are after the start date
    if ($startDate) {
        $mps->whereDate('tanggal', '>=', $startDate);
    }

    // Execute the query and retrieve the results
    $mps = $mps->get();

    // Return the data to the view
    return view('mps.index', compact('mps', 'boms', 'menus'));
}






    // public function create(Request $request){
    //     $boms = Bom::all();
    //     $menus = Menu::all();

    //     // Mengelompokkan boms dan menus berdasarkan menu_id
    //     $groupedBoms = $boms->groupBy('bom_id');
    //     $groupedMenus = $menus->groupBy('menu_id');

    //     // Menggabungkan data dari hasil pengelompokkan
    //     $mergedMenus = collect();
    //     $mergedMenus = $mergedMenus->merge($groupedBoms)->merge($groupedMenus);

    //     return view('mps.create', compact('mergedMenus'));
    // }

    public function create(Request $request){
        // Mengambil semua data dari model Bom
        $boms = Bom::all();

        // Mengambil semua data dari model Menu
        $menus = Menu::all();

        return view('mps.create', compact('boms', 'menus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'tanggal' => 'required',
            'produkJumlah' => 'required',
        ], [
            'menu_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'produkJumlah.required' => 'Jumlah Produksi Wajib Diisi'
        ]);

        Mps::create([
            'menu_id' => $request->input('menu_id'),
            'tanggal' => $request->input('tanggal'),
            'produkJumlah' => $request->input('produkJumlah'),
        ]);


        return redirect()->route('mps.index')->with('success', 'MPS berhasil disimpan.');
    }

    public function show($id) {
        // Mengambil data dari model Mps berdasarkan ID yang diberikan
        $mps = Mps::findOrFail($id);

        // Mengambil semua data dari model Bom
        $boms = Bom::all();

        // Mengambil semua data dari model Menu
        $menus = Menu::all();

        return view('mps.update', compact('mps', 'boms', 'menus'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required',
            'tanggal' => 'required',
            'produkJumlah' => 'required',
        ], [
            'menu_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'produkJumlah.required' => 'Jumlah Produksi Wajib Diisi'
        ]);

        $mps = Mps::findOrFail($id);

        $mps->update([
            'menu_id' => $request->input('menu_id'),
            'tanggal' => $request->input('tanggal'),
            'produkJumlah' => $request->input('produkJumlah'),
        ]);


        return redirect()->route('mps.index')->with('success', 'MPS berhasil diupdate.');
    }

    public function destroy($id)
    {
        $mps = Mps::find($id);
        $mps->delete();

        return redirect()->route('mps.index')->with('success', 'MPS berhasil dihapus.');
    }
}
