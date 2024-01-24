<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $dataKelas = DB::table('kelas')
            ->get();
        $dataJurusan = DB::table('jurusans')
            ->get();
        return view('dashboard.siswa.tambah', [
            'title' => 'Dashboard | Siswa',
            'dataKelas' => $dataKelas,
            'dataJurusan' => $dataJurusan
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:siswas|min:9',
            'name' => 'required',
            'kelas' => 'required',
            'jenkel' => 'required',
            'jurusan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('siswa')->withErrors($validator);
        } else {

            DB::table('siswas')->insert([
                'nis' => $request->nis,
                'name' => $request->name,
                'kelas_id' => $request->kelas,
                'jenkel' => $request->jenkel,
                'jurusan_id' => $request->jurusan,
                'created_at' => now()
            ]);

            return redirect()->route('dataSiswa')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    public function data()
    {
        $dataSiswa = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->get();
        return view('dashboard.siswa.data', [
            'title' => 'Dashboard | Siswa siswa',
            'dataSiswa' => $dataSiswa
        ]);
    }

    public function edit($id)
    {
        $dataSiswa = DB::table('siswas')
            ->where('id', $id)
            ->get();
        $dataKelas = DB::table('kelas')
            ->get();
        $dataJurusan = DB::table('jurusans')
            ->get();
        return view('dashboard.siswa.edit', [
            'title' => 'Dashboard | Siswa',
            'dataSiswa' => $dataSiswa,
            'dataKelas' => $dataKelas,
            'dataJurusan' => $dataJurusan
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => [
                'required',
                Rule::unique('siswas')->ignore($request->id),
            ],
            'name' => 'required',
            'kelas' => 'required',
            'jenkel' => 'required',
            'jurusan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('siswaEdit', ['id' => $request->id])->withErrors($validator);
        } else {

            DB::table('siswas')
                ->where('id', $request->id)
                ->update([
                    'nis' => $request->nis,
                    'name' => $request->name,
                    'kelas_id' => $request->kelas,
                    'jenkel' => $request->jenkel,
                    'jurusan_id' => $request->jurusan,
                    'updated_at' => now()
                ]);

            return redirect()->route('dataSiswa')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    public function delete($id)
    {
        DB::table('siswas')
            ->where('id', $id)
            ->delete();
        return redirect()->route('dataSiswa')->with('message', 'Data Berhasil Dihapus!');
    }
}
