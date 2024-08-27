<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedoresController;

Route::get('/user', [ProveedoresController::class, 'index']);
Route::post('/user', [ProveedoresController::class, 'crear']);