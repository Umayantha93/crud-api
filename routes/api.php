<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', [PersonController::class, "index"]);
Route::post('/insert', [PersonController::class, 'insert']);
Route::get('/view/{id}', [PersonController::class, 'show']);
Route::put('/update/{id}', [PersonController::class, 'update']);
Route::delete('/delete/{id}', [PersonController::class, 'destroy']);
