<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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


Route::get('/read', function () {

    $posts = Post::all();

    $post_titles = [];

    foreach($posts as $post){
        array_push($post_titles,$post->title);
    }

    return $post_titles;
});

Route::get('/find', function () {
    $post = Post::find(2);
    return $post->title;
});

Route::get('/find/{check}', function($check){
    $post = Post::where('is_admin', $check)->orderBy('id', 'desc')->take(1)->get();
    return $post[0]->title;   
});

Route::get('/findmore', function(){
    $post = Post::findOrFail(4);
    // $post = Post::where('users_count', '<', 50)->firstOrfail();
    return $post->title;
});

Route::get('/basicinsert', function () {
    $post = new Post();
    $post->title = 'new eloquent title';
    $post->content = 'eloquent ORM is really cool!';
    $post->is_admin = 0;
    $post->save();
});

Route::get('/basicupdate', function () {
    $post = Post::find(1);
    $post->title = 'updated title';
    $post->save();
});

Route::get('/create', function () {
    Post::create([
        "title"=>"this is title with create orm",
        "content"=>"I'm learning a lot laravel",
        "is_admin"=>1
    ]);
});

Route::get('/update', function () {
    Post::where('id', 2)->update([
        "title"=>"this is title updated with orm"
    ]);
});

Route::get('/delete/{id}', function ($id) {
    $post = Post::where('id', $id);
    $post->delete();

    // Post::destroy($id);
    // Post::destroy([2,4]); => Multiple deletion
    // Post::where('is_admin', 0); => Multiple deletion
    
    return true;
});

Route::get('/softdelete/{id}', function ($id) {
    Post::find($id)->delete();
});

Route::get('/retrieveall', function () {
    $post = Post::onlyTrashed()->get(); //get all deleted items
    return $post;
});

Route::get('/retrieve/{id}', function ($id) {
    $post = Post::withTrashed()->where('id', $id)->get();
    return $post;
});

Route::get('/restore/{id}', function ($id) {
    Post::withTrashed()->where('id', $id)->restore();
});

Route::get('/restoreall', function () {
    Post::onlyTrashed()->restore();
});

Route::get('/forcedelete/{id}', function ($id) {
    Post::withTrashed()->where('id', $id)->forceDelete();
});

Route::get('/forcedeleteall', function () {
    Post::onlyTrashed()->forceDelete();
});