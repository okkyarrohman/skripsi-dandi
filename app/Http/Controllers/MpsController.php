<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use Illuminate\Http\Request;

class MpsController extends Controller
{
    public function index(Request $request){
        $boms = Bom::all();
        $menus = Menu::all();


        $bomId = $request->input('bom_id');
        $startDate = $request->input('tanggal_awal');
        $endDate = $request->input('tanggal_akhir');

        $mps = Mps::query();

        if ($bomId) {
            $mps->where('bom_id', $bomId);
        }

        if ($startDate && $endDate) {
            $mps->whereBetween('tanggal', [$startDate, $endDate]);
        }

        $mps = $mps->get();

        // Kembalikan data ke view
        return view('mps.index', compact( 'mps', 'boms','menus' ));
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
            'bom_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'produkJumlah' => 'required',
        ], [
            'bom_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'jumlah.required' => 'Jumlah Perkiraan Permintaan Harian Wajib Diisi',
            'produkJumlah.required' => 'Jumlah Produksi Wajib Diisi'
        ]);

        Mps::create([
            'bom_id' => $request->input('bom_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
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
            'bom_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'produkJumlah' => 'required',
        ], [
            'bom_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'jumlah.required' => 'Jumlah Perkiraan Permintaan Harian Wajib Diisi',
            'produkJumlah.required' => 'Jumlah Produksi Wajib Diisi'
        ]);

        $mps = Mps::findOrFail($id);

        $mps->update([
            'bom_id' => $request->input('bom_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
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
