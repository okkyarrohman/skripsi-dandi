<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MrpController extends Controller
{
    public function index(Request $request){
        return view('mrp.index');
    }

    public function result(Request $request){
        return view('mrp.result');
    }
}
