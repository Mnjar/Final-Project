<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/table', function () {
    return view('table');
})->name('table');


Route::get('/create', [BarangController::class, 'getCreatePage'])->name('getCreatePage');

Route::post('/create-barang', [BarangController::class, 'createBarang'])->name('createBarang');

Route::get('/get-barang', [BarangController::class, 'getBarang'])->name('getBarang');

Route::get('/update-barang/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');

Route::patch('/update-barang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');

Route::delete('/delete-barang/{id}', [BarangController::class, 'deleteBarang'])->name('deleteBarang');