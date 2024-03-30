<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        // Request column input type file
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->getClientOriginalName();
            $fotoName = date('Ymd') . "." . $extension;
            $foto->move(storage_path('app/public/menu/foto/'), $fotoName);
        }

        Menu::create([
            'nama' => $request->input('nama'),
            'number' => $request->input('number'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $fotoName,
        ]);

        return redirect()->route('menu.index');
    }

    public function edit($id)
    {
        $menus = Menu::where('id', $id)->first();

        return view('menu.detail', compact('menus'));
    }

    public function show($id)
    {
    }


    public function update(Request $request)
    {
        // Request column input type file
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->getClientOriginalName();
            $fotoName = date('Ymd') . "." . $extension;
            $foto->move(storage_path('app/public/menu/foto/'), $fotoName);
        }

        $menu = Menu::find($request->id);
        $menu->nama = $request->nama;
        $menu->number = $request->number;
        $menu->deskripsi = $request->deskripsi;
        $menu->foto = $fotoName;
        $menu->save();


        return redirect()->route('menu.index');
    }
}
