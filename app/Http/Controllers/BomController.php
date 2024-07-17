<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use Illuminate\Http\Request;

class BomController extends Controller
{
    public function index(Request $request)
    {

        $boms = Bom::query(); // Mulai dengan query builder dari model Menu
        // Jika terdapat parameter 'search' dalam request, tambahkan kriteria pencarian
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $boms = Bom::with(['menu'])
                ->whereHas('menu', function ($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->get();
        } else {
            $boms = Bom::with(['menu'])->get(); // Jika tidak ada pencarian, ambil semua data
        }


        // Kirim data ke view 'menu.index'
        return view('bom.index', compact('boms'));
    }

    public function create(Request $request)
    {
        $bahans = Bahan::all(); // Mengambil semua data bahan
        $menus = Menu::all();

        return view('bom.create', compact('bahans', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'bahan_id' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
        ], [
            'menu_id.required' => 'Menu Wajib Dipilih',
            'bahan_id.required' => 'Bahan Wajib Dipilih',
            'satuan.required' => 'Satuan Wajib Diisi',
            'jumlah.required' => 'Jumlah Wajib Diisi',
        ]);

        foreach ($request->bahan_id as $key => $value) {
            Bom::create([
                'menu_id' => $request->input('menu_id'),
                'bahan_id' => $value,
                'satuan' => $request->satuan[$key],
                'jumlah' => $request->jumlah[$key],
            ]);
        }


        return redirect()->route('bom.index')->with('success', 'Bom berhasil disimpan.');
    }

    public function show($id)
    {
        $boms = Bom::find($id);
        $bahans = Bahan::all(); // Mengambil semua data bahan
        $menus = Menu::all();
        return view('bom.update', compact('boms', 'menus', 'bahans'));
    }

    public function update(Request $request, $id)
    {

        $boms = Bom::where('id', $id)->first();

        $boms->update([
            'menu_id' => $request->input('menu_id'),
            'bahan_id' => $request->input('bahan_id'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
        ]);


        return redirect()->route('bom.index')->with('success', 'Bom berhasil diupdate.');
    }

    public function destroy($id)
    {
        $boms = Bom::find($id);
        $boms->delete();

        return redirect()->route('bom.index')->with('success', 'Bom berhasil dihapus.');
    }
}
