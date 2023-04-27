<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BuyerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-category', [BarangController::class, 'apiGetBarang']);

Route::post('/create-category', [BarangController::class, 'apiCreateCategory']);

Route::patch('/update-category/{id}', [BarangController::class, 'apiUpdateCategory']);

Route::delete('/delete-category/{id}', [BarangController::class, 'apiDeleteCategory']);
