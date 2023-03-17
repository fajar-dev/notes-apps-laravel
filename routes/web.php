<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/notes', [NotesController::class, 'index'])->name('notes');
Route::post('/notes_add', [NotesController::class, 'notes_add']);
Route::post('/notes_update', [NotesController::class, 'notes_update']);
Route::get('/notes_delete/{id}', [NotesController::class, 'notes_delete']);


