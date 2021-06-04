<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Kelass;
use App\Http\Livewire\Mahasiswas;
use App\Http\Livewire\Krss;
use App\Http\Livewire\Pertemuans;
use App\Http\Livewire\Admins;
use App\Http\Livewire\Absensis;
use App\Http\Livewire\MahasiswasKelass;
use App\Http\Livewire\MahasiswasPertemuanss;

Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');
Route::get('logout', 'App\Http\Controllers\AdminLoginController@logout')->name('admin.logout');




Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

Route::get('/kelas', Kelass::class)->name('kelas');
Route::get('/mahasiswa', Mahasiswas::class)->name('mahasiswa');
Route::get('/admins', Admins::class)->name('add.admin');
Route::get('/kelas/detail/{id}', Krss::class)->name('kelas.detail');
Route::get('/kelas/detail/{id}/pertemuan', Pertemuans::class)->name('kelas.pertemuan');
Route::get('/kelas/detail/{id}/pertemuan/absensi/{pid}', Absensis::class)->name('detail.pertemuan');
});

});

