<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index(Request $request){
    //     return view('/dashboard')->with('success','Success login');
    // }

    public function index(Request $request){
        return view('dashboard.dashboard');
    }
}
