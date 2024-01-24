<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function index()
    {
        $dataGuru = DB::table('users')
            ->where('jabatan', 'guru')
            ->orwhere('jabatan', 'walas')
            ->orderBy('name')->get();
        $dataMapel = DB::table('mapels')
            ->join('users', 'mapels.user_id', '=', 'users.id')
            ->get();
        return view('dashboard.mapel.index', [
            'title' => 'Dashboard | Mapel',
            'dataGuru' => $dataGuru,
            'dataMapel' => $dataMapel
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel'    => 'required|unique:mapels',
            'nama_mapel'    => 'required',
            'guru'          => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('mapel')->withErrors($validator);
        } else {
            DB::table('mapels')->insert([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'user_id' => $request->guru,
                'created_at' => now()
            ]);

            return redirect()->route('mapel')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    public function edit($id)
    {
        $mapelEdit = DB::table('mapels')
            ->where('mapels.id', $id)
            ->join('users', 'mapels.user_id', '=', 'users.id')
            ->get();
        $dataGuru = DB::table('users')
            ->where('jabatan', 'guru')
            ->orwhere('jabatan', 'walas')
            ->orderBy('name')->get();
        $dataMapel = DB::table('mapels')
            ->join('users', 'mapels.user_id', '=', 'users.id')
            ->get();
        return view('dashboard.mapel.edit', [
            'title' => 'Dashboard | Mapel',
            'dataGuru' => $dataGuru,
            'dataMapel' => $dataMapel,
            'editMapel' => $mapelEdit
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel'    => [
                'required',
                Rule::unique('mapels')->ignore($request->id),
            ],
            'nama_mapel'    => 'required',
            'guru'          => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('mapelEdit', ['id' => $request->id])->withErrors($validator);
        } else {
            DB::table('mapels')
                ->where('id', $request->id)
                ->update([
                    'kode_mapel' => $request->kode_mapel,
                    'nama_mapel' => $request->nama_mapel,
                    'user_id' => $request->guru,
                    'updated_at' => now()
                ]);

            return redirect()->route('mapel')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    public function delete($id)
    {
        DB::table('mapels')
            ->where('id', $id)
            ->delete();
        return redirect()->route('mapel')->with('message', 'Data Berhasil Dihapus!');
    }
}
