<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $kelas = DB::table('kelas')->get();
        return view('dashboard.absensi.dataabsen', [
            'title' => 'Dashboard | Absensi',
            'kelas' => $kelas
        ]);
    }

    public function absen()
    {
        $kelas = DB::table('kelas')->get();
        return view('dashboard.absensi.absendata', [
            'title' => 'Dashboard | Data Absen',
            'kelas' => $kelas
        ]);
    }

    public function dataabsen()
    {
        $dataSiswa = DB::table('absensis')
            ->join('kelas', 'absensis.kelas_id', '=', 'kelas.id')
            ->join('siswas', 'absensis.siswa_id', '=', 'siswas.id')
            ->where('absensis.user_id', Auth::user()->id)
            ->get();
        $kelas = DB::table('kelas')->get();
        return view('dashboard.absensi.absen', [
            'title' => 'Dashboard | Data Absen',
            'kelas' => $kelas,
            'dataSiswa' => $dataSiswa
        ]);
    }

    public function datakelas($id)
    {
        $kelas = DB::table('kelas')->get();
        $dataSiswa = DB::table('siswas')
            ->where('kelas_id', $id)
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select('siswas.id', 'siswas.nis', 'siswas.name', 'kelas.kelas', 'jurusans.nama_jurusan')
            ->get();
        return view('dashboard.absensi.index', [
            'title' => 'Dashboard | Absensi',
            'kelas' => $kelas,
            'dataSiswa' => $dataSiswa
        ]);
    }

    public function absenhadir($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absensis')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 1,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Hadir!');
        }
    }

    public function absenizin($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absensis')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 2,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Izin!');
        }
    }

    public function absenalfa($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absensis')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 3,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Alfa!');
        }
    }
}
