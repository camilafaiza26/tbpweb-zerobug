<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Kelass;
use App\Http\Livewire\Mahasiswas;
use App\Http\Livewire\Krss;
use App\Http\Livewire\Pertemuans;
use App\Http\Livewire\Absensis;
use App\Http\Livewire\MahasiswasKelass;
use App\Http\Livewire\MahasiswasPertemuanss;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/kelas', Kelass::class)->name('kelas');
// Route::get('/admin/mahasiswa', Mahasiswas::class)->name('mahasiswa');

// Route::get('/admin/kelas/detail/{id}', Krss::class)->name('kelas.detail');
// Route::get('/admin/kelas/detail/{id}/pertemuan', Pertemuans::class)->name('kelas.pertemuan');
// Route::get('/admin/kelas/detail/{id}/pertemuan/absensi/{pid}', Absensis::class)->name('detail.pertemuan');

//MAHASISWA 


Route::middleware(['auth:sanctum', 'verified'])->get('/mahasiswa', function () {
    return view('mahasiswa.dashboard');
})->name('dashboard');

Route::get('/mahasiswa/kelas', MahasiswasKelass::class)->name('mahasiswa.kelas');
Route::get('/mahasiswa/kelas/{id}/pertemuan', MahasiswasPertemuanss::class)->name('mahasiswa.detail');

require 'admin.php';