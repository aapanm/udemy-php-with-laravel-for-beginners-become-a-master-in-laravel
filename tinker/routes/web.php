<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

Route::get('user/{id}/posts', function ($id) {
    return User::find($id)->post;
});

Route::get('post/{id}/user', function ($id) {
    return Post::find($id)->user;
});

Route::get('post/{id}', function ($id) {
    Post::create([
        'title'=>'php',
        'content'=>'laravel',
        'user_id'=> $id
    ]);
});


