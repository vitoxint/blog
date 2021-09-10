<?php

use App\Models\Post;
use App\Models\Category;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
//use Spatie\YamlFrontMatter\YamlFrontMatter;
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
   //$posts = cache()->rememberForever('posts.all',fn () =>Post::all());
   $posts = Post::all();
   return view('posts', [
     'posts' => $posts
    ]);
});


//Route::get('/post/{post:slug}', function( Post $post){
Route::get('/post/{post}', function( Post $post){
    return view ('post', [
        'post'=> $post,
    ]);
});

Route::get('/categories/{category}', function( Category $category){
    return 'categorias';
    return view ('post', [
        'post'=> $category->posts,
    ]);
});


     


//Route::get('/', fn () => view ('welcome'));
//Route::get('/', fn () => 'Hola Segic');
//Route::get('/', fn () => ['id' => 7, 'url' => 'http://www.segic.cl']);