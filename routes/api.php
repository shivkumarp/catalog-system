<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['api.token'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories/{slug}/items', [CategoryController::class, 'getCategoryItems']);
});
