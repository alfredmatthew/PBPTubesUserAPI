<?php

use App\Http\Controllers\UserDataController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
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

Route::apiResource('userData', UserDataController::class);
Route::apiResource('mataPelajaran', MataPelajaranController::class);
Route::apiResource('Review', ReviewController::class);
Route::apiResource('Transaction', TransactionController::class);
Route::post('/login', [UserDataController::class, 'login']);