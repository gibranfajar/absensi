<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $dataJurusan = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        return view('dashboard.jurusan.index', [
            'dataJurusan' => $dataJurusan,
            'title' => 'Dashboard | Jurusan'
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required|unique:jurusans'
        ]);

        if ($validator->fails()) {
            return redirect()->route('jurusan')->withErrors($validator);
        } else {

            DB::table('jurusans')->insert([
                'nama_jurusan' => $request->nama_jurusan,
                'created_at' => now()
            ]);

            return redirect()->route('jurusan')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    public function edit($id)
    {
        $dataJurusan = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        $jurusan = DB::table('jurusans')->where('id', $id)->get();
        return view('dashboard.jurusan.edit', [
            'jurusan' => $jurusan,
            'dataJurusan' => $dataJurusan,
            'title' => 'Dashboard | Jurusan'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required|unique:jurusans'
        ]);

        if ($validator->fails()) {
            return redirect()->route('jurusanEdit', ['id' => $request->id])->withErrors($validator);
        } else {

            DB::table('jurusans')->where('id', $request->id)->update([
                'nama_jurusan' => $request->nama_jurusan,
                'updated_at' => now()
            ]);

            return redirect()->route('jurusan')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    public function delete($id)
    {
        DB::table('jurusans')->where('id', $id)->delete();
        return redirect()->route('jurusan')->with('message', 'Data Berhasil Dihapus!');
    }
}
