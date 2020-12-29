<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/insert', function(){
    DB::insert('insert into posts (title, content) values (?, ?)', ['PHP with Udemy', 'learning laravel with udemy']);
});

Route::get('/read', function () {
    $results = DB::select('select * from posts where id = ?', [1]);
    // var_dump($results);
    return $results[0]->title;
});

Route::get('/update', function(){
    $updated = DB::update('update posts set title = "updated title php with laravel" where id = ?', [1]);
    return $updated;
});

Route::get('/delete', function () {
    $deleted = DB::delete('delete from posts where id = ?', [2]);
    return $deleted;
});
