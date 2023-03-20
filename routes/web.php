<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NotesController::class, 'index'])->name('notes')->middleware('auth');
Route::post('/notes_add', [NotesController::class, 'notes_add'])->middleware('auth');
Route::post('/notes_update', [NotesController::class, 'notes_update'])->middleware('auth');
Route::get('/notes_delete/{id}', [NotesController::class, 'notes_delete'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/profile_update', [ProfileController::class, 'profile_update'])->middleware('auth');
Route::post('/profile_delete', [ProfileController::class, 'profile_delete'])->middleware('auth');
Route::post('/password_change', [ProfileController::class, 'password_change'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login_action', [AuthController::class, 'login_action'])->middleware('guest');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register_action', [AuthController::class, 'register_action'])->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');




