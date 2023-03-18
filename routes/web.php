<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;

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

Route::get('/', [NotesController::class, 'index'])->name('notes');
Route::post('/notes_add', [NotesController::class, 'notes_add']);
Route::post('/notes_update', [NotesController::class, 'notes_update']);
Route::get('/notes_delete/{id}', [NotesController::class, 'notes_delete']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_action', [AuthController::class, 'login_action']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_action', [AuthController::class, 'register_action']);

Route::get('/logout', [AuthController::class, 'logout']);




