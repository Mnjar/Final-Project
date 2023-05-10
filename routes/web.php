<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InvoiceController;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/get-barang', [BarangController::class, 'getBarang'])->name('getBarang');
    Route::get('/view', [InvoiceController::class, 'getCreateInvoice'])->name('getCreateInvoice');
    Route::post('/create-invoice/{id}', [InvoiceController::class, 'createInvoice'])->name('createInvoice');
    Route::get('/view-buyer', [InvoiceController::class, 'getInvoice'])->name('getInvoice');    
});

Route::middleware('admin')->group(function () {
    Route::get('/create', [BarangController::class, 'getCreatePage'])->name('getCreatePage');

    // Route::get('/get-barang', [BarangController::class, 'getBarang'])->name('getBarang');
    
    Route::post('/create-barang', [BarangController::class, 'createBarang'])->name('createBarang');
        
    Route::get('/update-barang/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');
    
    Route::patch('/update-barang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');
    
    Route::delete('/delete-barang/{id}', [BarangController::class, 'deleteBarang'])->name('deleteBarang');
    
    Route::post('/create-barang-category', [BarangController::class, 'createCategory'])->name('createCategory');
    
});

require __DIR__.'/auth.php';
