<?php

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
    Route::apiResource('division', DivisionController::class);
    Route::post('division/{id}/restore', [DivisionController::class, 'restore'])->name('division.restore');
    Route::post('division/{id}/available', [DivisionController::class, 'available'])->name('division.available');
    Route::post('division/{id}/trashed', [DivisionController::class, 'trashed'])->name('division.trashed');
});
