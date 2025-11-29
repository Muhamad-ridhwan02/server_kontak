<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\GrupController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/kontak/get', [KontakController::class, 'getAll']);
Route::get('/kontak/get/{no_telp}', [KontakController::class, 'getItem']);
Route::post('/kontak/create', [KontakController::class, 'create']);
Route::post('/kontak/update/{no_telp}', [KontakController::class, 'update']);
Route::delete('/kontak/delete/{no_telp}', [KontakController::class, 'delete']);

Route::get('/grup/get', [GrupController::class, 'getAll']);
Route::get('/grup/get/{id}', [GrupController::class, 'getItem']);
Route::post('/grup/create', [GrupController::class, 'create']);
Route::post('/grup/update/{id}', [GrupController::class, 'update']);
Route::delete('/grup/delete/{id}', [GrupController::class, 'delete']);