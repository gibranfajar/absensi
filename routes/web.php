<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// login
Route::get('/', [Authenticate::class, 'index'])->name('login');
Route::post('/login', [Authenticate::class, 'login']);

// dashboard
Route::get('/dashboard', [Authenticate::class, 'dashboard']);

// guru
Route::get('/guru/tambah', [GuruController::class, 'index'])->name('tambahguru');
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('editguru');
Route::get('/guru/data', [GuruController::class, 'data'])->name('dataguru');
Route::post('/guru/tambah', [GuruController::class, 'insert']);
Route::post('/guru/update', [GuruController::class, 'update']);
Route::get('/guru/hapus/{id}', [GuruController::class, 'delete']);



// siswa
Route::get('/siswa/tambah', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/data', [SiswaController::class, 'data'])->name('dataSiswa');
Route::post('/siswa/tambah', [SiswaController::class, 'insert']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswaEdit');
Route::post('/siswa/update', [SiswaController::class, 'update']);

// mapel
Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
Route::post('/mapel/tambah', [MapelController::class, 'insert']);
Route::get('/mapel/edit/{id}', [MapelController::class, 'edit'])->name('mapelEdit');
Route::post('/mapel/update', [MapelController::class, 'update']);
Route::get('/mapel/hapus/{id}', [MapelController::class, 'delete']);

// kelas
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
Route::post('/kelas/tambah', [KelasController::class, 'insert']);
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelasEdit');
Route::post('/kelas/update', [KelasController::class, 'update']);
Route::get('/kelas/hapus/{id}', [KelasController::class, 'delete']);

// jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::post('/jurusan/tambah', [JurusanController::class, 'insert']);
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusanEdit');
Route::post('/jurusan/update', [JurusanController::class, 'update']);
Route::get('/jurusan/hapus/{id}', [JurusanController::class, 'delete']);

// absensi
Route::get('/absensi', [AbsensiController::class, 'index']);

// logout
Route::get('/logout', [Authenticate::class, 'logout']);
