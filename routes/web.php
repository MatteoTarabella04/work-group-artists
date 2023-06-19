<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Guests\PageController;
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

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contacts', [PageController::class, 'contacts']);

Route::resource('/admin/artists', ArtistController::class);
Route::resource('/admin/albums', AlbumController::class);
Route::resource('/admin/genres', GenreController::class);