<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    //
    public function index(Request $request)
    {
        $menus = Menu::query(); // Mulai dengan query builder dari model Menu
        // Jika terdapat parameter 'search' dalam request, tambahkan kriteria pencarian
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $menus->where('name', 'LIKE', '%' . $searchTerm . '%');
        }
        // Ambil data sesuai kriteria yang sudah ditentukan
        $menus = $menus->get();
        // Kirim data ke view 'menu.index'
        return view('menu.index', compact('menus'));
    }


    public function create(Request $request){
        return view('menu.create');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,pdf',
        ],[
            'name.Required'=>'Nama Wajib Diisi',
            'harga.Required'=>'Harga Wajib Diisi',
            'deskripsi.Required' => 'Deskripsi Wajib Diisi',
            'foto.nullable'=>'Foto Tidak Boleh Kosong',
            'foto.image'=>'Foto Harus Berupa Image ',
            'foto.mimes'=>'Foto Harus JPEG,PNG,JPG,GIF,PDF',
        ]);

        $menu = new Menu();
        $menu->name = $request->input('name');
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        if ($request->hasFile('foto')) {
            $fotos = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('foto'), $fotos);
            $menu->foto = $fotos;
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil disimpan.');
    }

    public function show($id){
        $menus = Menu::find($id);
        return view('menu.detail', compact('menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,pdf',
        ],[
            'name.Required'=>'Nama Wajib Diisi',
            'harga.Required'=>'Harga Wajib Diisi',
            'deskripsi.Required' => 'Deskripsi Wajib Diisi',
            'foto.nullable'=>'Foto Tidak Boleh Kosong',
            'foto.image'=>'Foto Harus Berupa Image ',
            'foto.mimes'=>'Foto Harus JPEG,PNG,JPG,GIF,PDF',
        ]);
        $menus = Menu::find($id);
        if (!$menus) {
            return redirect()->route('menu.index')->with('error', 'Menu not found.');
        }

        // Update data menu berdasarkan input
        $menus->name = $request->input('name');
        $menus->harga = $request->input('harga');
        $menus->deskripsi = $request->input('deskripsi');

        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($menus->foto) {
                Storage::delete('public/foto/' . $menus->foto);
            }

            // Upload foto baru
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('foto'), $fotoName);
            $menus->foto = $fotoName;
        }

        // Simpan perubahan
        $menus->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil disimpan.');
    }

    public function destroy($id)
    {
        $menus = Menu::find($id);
        $menus->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

}
