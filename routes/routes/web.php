<?php

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

Route::get('/about', function () {
    return "Hi about page!";
});

Route::get('/contact', function () {
    return "Hi I am contact!";
});

Route::get('post/{id}', function ($id) {
    return "the id is $id ";
});

Route::get('admin/posts/example', function () {
    $url = route("admin.home");
    return 'this url is '.$url;
})->name('admin.home');

