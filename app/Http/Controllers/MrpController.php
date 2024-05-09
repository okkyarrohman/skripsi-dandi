<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use App\Models\Mrp;
use Illuminate\Http\Request;

class MrpController extends Controller
{
    public function index(Request $request){

        $boms = Bom::all();
        $menus = Menu::all();
        $mrp = Mps::all();
        $bahans = Bahan::all();


        return view('mrp.index', compact('boms', 'menus', 'mrp', 'bahans'));
    }

    public function result(Request $request){
        return view('mrp.result');
    }
}
