<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RouteResourceController;
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
    return view('welcome');
});

Route::get('/posts/{id}', [PostsController::class, 'index']);

Route::resource('user', RouteResourceController::class);