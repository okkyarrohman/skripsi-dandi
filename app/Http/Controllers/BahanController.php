<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function index(Request $request){
        $bahans = Bahan::query(); // Mulai dengan query builder dari model Menu
        // Jika terdapat parameter 'search' dalam request, tambahkan kriteria pencarian
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $bahans->where('name', 'LIKE', '%' . $searchTerm . '%');
        }
        // Ambil data sesuai kriteria yang sudah ditentukan
        $bahans = $bahans->get();
        // Kirim data ke view 'menu.index'
        return view('bahan.index', compact('bahans'));
    }

    public function create(Request $request){
        return view('bahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stokAwal' => 'required',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'stokAwal.required' => 'Stok Awal Wajib Diisi',
        ]);

        $bahans = new Bahan();
        $bahans->name = $request->input('name');
        $bahans->satuan = $request->input('satuan');
        $bahans->stokAwal = $request->input('stokAwal');
        $bahans->stokAkhir = $request->input('stokAkhir', $request->input('stokAwal')); // Menggunakan default value dari stokAwal jika stokAkhir tidak diisi

        $bahans->save();


        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil disimpan.');
    }

    public function show($id)
    {
        $bahans = Bahan::find($id);
        return view('bahan.update', compact('bahans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'stokAwal' => 'required',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'stokAwal.required' => 'Stok Awal Wajib Diisi',
        ]);

        $bahans = Bahan::find($id);
        $bahans->name = $request->input('name');
        $bahans->satuan = $request->input('satuan');
        $bahans->stokAwal = $request->input('stokAwal');
        $bahans->stokAkhir = $request->input('stokAkhir', $request->input('stokAwal')); // Menggunakan default value dari stokAwal jika stokAkhir tidak diisi

        $bahans->save();


        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil disimpan.');
    }

    public function destroy($id)
    {
        $bahans = Bahan::find($id);
        $bahans->delete();

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dihapus.');
    }
}
