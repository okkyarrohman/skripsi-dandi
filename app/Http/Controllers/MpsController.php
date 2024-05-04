<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Mps;
use Illuminate\Http\Request;

class MpsController extends Controller
{
    public function index(Request $request){
        // Mengambil nilai tanggal_awal dan tanggal_akhir dari request
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        // Lakukan query untuk mengambil data berdasarkan tanggal
        $mps = Mps::query();

        if ($tanggal_awal && $tanggal_akhir) {
            $mps->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        }

        // Ambil data MP sesuai dengan filter tanggal
        $mps = $mps->get();

        // Kembalikan data ke view
        return view('mps.index', compact( 'mps' ));
    }


    public function create(Request $request){
        $menus = Menu::all();

        return view('mps.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ], [
            'menu_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'jumlah.required' => 'Jumlah Wajib Diisi',
        ]);

        Mps::create([
            'menu_id' => $request->input('menu_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
        ]);


        return redirect()->route('mps.index')->with('success', 'MPS berhasil disimpan.');
    }

    public function show($id) {
        $mps = Mps::find($id);
        $menus = Menu::all();
        return view('mps.update', compact('mps','menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ], [
            'menu_id.required' => 'Menu Wajib Dipilih',
            'tanggal.required' => 'Satuan Wajib Diisi',
            'jumlah.required' => 'Jumlah Wajib Diisi',
        ]);
        $mps = Mps::findOrFail($id);

        $mps->update([
            'menu_id' => $request->input('menu_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
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
