<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        return view('dashboard.guru.tambah', [
            'title' => 'Dashboard | Guru'
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'username'     => 'required|unique:users',
            'jabatan'      => 'required',
            'password'  => 'required|min:5'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return redirect()->route('tambahguru')->withErrors($validator);
        } else {
            DB::table('users')->insert([
                'name' => $request->name,
                'username' => $request->username,
                'jabatan' => $request->jabatan,
                'password' => Hash::make($request->password),
                'created_at' => now()
            ]);

            return redirect()->route('dataguru')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    public function data()
    {
        $dataGuru = DB::table('users')
            ->orderBy('name')
            ->get();
        return view('dashboard.guru.data', [
            'dataGuru' => $dataGuru,
            'title' => 'Dashboard | Data Guru'
        ]);
    }

    public function edit($id)
    {
        $guru = DB::table('users')->where('id', $id)->get();

        return view('dashboard.guru.edit', [
            'guru' => $guru,
            'title' => 'Dashboard | Edit'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
            'jabatan' => 'required',
            'password' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->route('editguru', ['id' => $request->id])->withErrors($validator);
        } else {

            if ($validator->fails('password')) {
                DB::table('users')->where('id', $request->id)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'jabatan' => $request->jabatan,
                    'updated_at' => now()
                ]);

                return redirect()->route('dataguru')->with('message', 'Data Berhasil Diupdate!');
            } else {
                DB::table('users')->where('id', $request->id)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'jabatan' => $request->jabatan,
                    'password' => Hash::make($request->password),
                    'updated_at' => now()
                ]);

                return redirect()->route('dataguru')->with('message', 'Data Berhasil Diupdate!');
            }
        }
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('dataguru')->with('message', 'Data Berhasil Dihapus!');
    }
}
