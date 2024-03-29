<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpsController extends Controller
{
    public function index(Request $request){
        return view('mps.index');
    }

    public function create(Request $request){
        return view('mps.create');
    }

    public function update(Request $request){
        return view('mps.update');
    }
}
