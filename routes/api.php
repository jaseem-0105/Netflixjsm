<?php

use App\Http\Controllers\NetflixApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/get-all-genre', [NetflixApiController::class, 'getAllGen']);
Route::post('/get-all-movies',[NetflixApiController::class, 'getAllMovies']);
Route::post('/get-movie-name',[NetflixApiController::class,'getMovieName']);
Route::post('/same-genre-id',[NetflixApiController::class,'sameGenreId']);
