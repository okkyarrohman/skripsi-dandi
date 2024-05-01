<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        $users = User::all();
        return view("Auth.login", compact('users'));
    }

    public function login(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'name.Required'=>'Name Wajib Diisi',
            'email.Required'=>'Email Wajib Diisi',
            'email.email'=>'Silahkan Masukkan Email Yang Valid',
        ]);

        $infologin =[
                    'email' =>$request->email,
                    'password' => $request->password
                ];
        // Coba melakukan proses autentikasi
        if (Auth::attempt($infologin)) {
            // Autentikasi berhasil
            return redirect()->route('dashboard.index')->withSuccess(Auth::user()->name . ' Berhasil Login');
        } else {
            // Autentikasi gagal, redirect ke halaman login dengan pesan error
            return redirect()->route('login.index')->with('error', 'Invalid credentials');
        }

    }
}
