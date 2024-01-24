<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validasi)) {
            return redirect('dashboard');
        } else {
            return redirect('/')->with('message', 'Username atau Password salah!');
        }
    }

    public function dashboard()
    {
        $guru = DB::table('users')->where('jabatan', 'guru')->count();
        $walas = DB::table('users')->where('jabatan', 'walas')->count();
        $siswa = DB::table('siswas')->count();
        return view('dashboard.index', [
            'guru' => $guru,
            'walas' => $walas,
            'siswa' => $siswa,
            'title' => 'Dashboard'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
