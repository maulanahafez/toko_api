<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'message' => 'Get authorized user',
        'data' => $request->user(),
    ]);
});

Route::prefix('account')->group(function () {

    // Login & Register
    Route::middleware('guest')->group(function () {
        Route::post('/login', [UserController::class, 'login']);
        Route::post('/register', [UserController::class, 'register'])->name('register');
    });

    // Logout
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

Route::controller(ProdukController::class)->group(function () {
    Route::get("produk", "index");
    Route::post("produk", "store");
    Route::get("produk/{id}", "show");
    Route::put("produk/{id}", "update");
    Route::delete("produk/{id}", "destroy");
});
