<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Container\Attributes\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MovieController::class, 'homepage']);
Route::get('/detail-movie/{id}/{slug}', [MovieController::class, 'show']);
Route::get('/create-movie', [MovieController::class, 'create'])->middleware('auth');
Route::post('/create-movie', [MovieController::class, 'store'])->Middleware('auth');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
// edit
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit')->middleware('auth', RoleAdmin::class);

// update
Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update')->middleware('auth');

// delete
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy')->middleware('auth');
