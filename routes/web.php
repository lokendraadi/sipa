<?php

use App\Http\Controllers\SuratMasukController;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Route;

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
    $jumlahsurat = SuratMasuk::count();
    return view('welcome', compact('jumlahsurat'));
});

Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk');

Route::get('/tambahsuratmasuk', [SuratMasukController::class, 'tambahsuratmasuk'])->name('tambahsuratmasuk');
Route::post('/insertsuratmasuk', [SuratMasukController::class, 'insertsuratmasuk'])->name('insertsuratmasuk');
Route::get('/tampilkansuratmasuk/{id}', [SuratMasukController::class, 'tampilkansuratmasuk'])->name('tampilkansuratmasuk');
Route::post('/updatesuratmasuk/{id}', [SuratMasukController::class, 'updatesuratmasuk'])->name('updatesuratmasuk');
Route::get('/deletesuratmasuk/{id}', [SuratMasukController::class, 'deletesuratmasuk'])->name('deletesuratmasuk');

//export PDF
Route::get('/exportpdf', [SuratMasukController::class, 'exportpdf'])->name('exportpdf');
//export Excel
Route::get('/exportexcel', [SuratMasukController::class, 'exportexcel'])->name('exportexcel');

Route::post('/importexcel', [SuratMasukController::class, 'importexcel'])->name('importexcel');

