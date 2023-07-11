<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/phones', [PhoneController::class, 'store']);
Route::get('/phones', [PhoneController::class, 'getData']);
Route::put('/phones/{phone}', [PhoneController::class, 'update']);
Route::get('/phones-delete/{phone}', [PhoneController::class, 'destroy'])->name('phone_delete');
