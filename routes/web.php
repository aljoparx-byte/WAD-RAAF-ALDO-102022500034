<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerbitController;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Tampil dan Tambah Data
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/tambah', [PenerbitController::class, 'create']);
Route::post('/penerbit', [PenerbitController::class, 'store']);

// Rute untuk Edit, Update, dan Hapus Data
Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy']);