<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DivisionController;
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

Route::name('api.')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('division', DivisionController::class)->only(['store', 'update', 'destroy']);
    Route::post('division/{id}/restore', [DivisionController::class, 'restore'])->name('division.restore');
    Route::post('division/{id}/available', [DivisionController::class, 'available'])->name('division.available');
    Route::post('division/{id}/trashed', [DivisionController::class, 'trashed'])->name('division.trashed');

    Route::apiResource('category', CategoryController::class)->only(['store', 'update', 'destroy']);
    Route::post('category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::post('category/{id}/available', [CategoryController::class, 'available'])->name('category.available');
    Route::post('category/{id}/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
});
