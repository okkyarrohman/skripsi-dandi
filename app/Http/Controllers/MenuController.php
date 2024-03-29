<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index(Request $request){
        return view('menu.index');
    }

    public function show(Request $request){
        return view('menu.detail');
    }

    public function create(Request $request){
        return view('menu.create');
    }

    public function update(Request $request){
        return view('menu.update');
    }


}
