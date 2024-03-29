<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BomController extends Controller
{
    public function index(Request $request){
        return view('bom.index');
    }

    public function create(Request $request){
        return view('bom.create');
    }

    public function update(Request $request){
        return view('bom.update');
    }
}
