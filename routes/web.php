<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('master');
});
Route::get('/view-movies', [MovieController::class, 'viewMovie'])->name('admin.viewMovie');
Route::post('/add-movies', [MovieController::class, 'addMovie'])->name('admin.addMovie');
Route::get('/toggle-movie/{id}',[MovieController::class,'toggleMovie'])->name('admin.toggleMovie');
Route::get('/view-edit-movies/{id}', [MovieController::class, 'viewEditMovie'])->name('admin.viewEditMovie');
Route::post('/edit-movies', [MovieController::class, 'editMovie'])->name('admin.editMovie');
Route::get('/delete-movies/{id}', [MovieController::class, 'deleteMovie'])->name('admin.deleteMovie');


Route::get('/view-genre', [GenreController::class, 'viewGenre'])->name('admin.viewGenre');
Route::get('/toggle-genre/{id}',[GenreController::class,'toggleGenre'])->name('admin.toggleGenre');
Route::post('/add-genre', [GenreController::class, 'addGenre'])->name('admin.addGenre');
Route::post('/edit-genre/{id}', [GenreController::class, 'editGenre'])->name('admin.editGenre');
Route::get('/delete-genre/{id}', [GenreController::class, 'deleteGenre'])->name('admin.deleteGenre');
