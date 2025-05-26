<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MovieController::class, 'homepage']);
Route::get('/detail-movie/{id}/{slug}', [MovieController::class, 'show']);
Route::get('/create-movie', [MovieController::class, 'create']);
Route::post('/create-movie', [MovieController::class, 'store']);
