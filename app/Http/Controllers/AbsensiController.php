<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('dashboard.absensi.index', [
            'title' => 'Dashboard | Absensi'
        ]);
    }
}
