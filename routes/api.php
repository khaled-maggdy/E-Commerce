<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Auth
Route::prefix('Auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/logout_all',  [AuthController::class, 'logout_all'])->middleware('auth:sanctum');
    Route::post('/forgot_password', [AuthController::class, 'forgot_password']);
    Route::post('/reset_password', [AuthController::class, 'reset_password'])->name('password.reset');
});
