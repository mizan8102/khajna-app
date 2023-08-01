<?php

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('menu',\App\Http\Controllers\Config\Menu\MenuController::class);

    Route::post('/logout', [\App\Http\Controllers\auth\AuthController::class, 'logout']);

});

Route::post('/login', [\App\Http\Controllers\auth\AuthController::class, 'login']);

