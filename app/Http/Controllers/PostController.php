<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        
        
        return view('posts', [
          'posts' => Post::latest('published_at')->filter( request(['search']))->get() ,
           'categories' => Category::all()
         ]);

    }


    public function show($post){

        return view ('post', [
            'post'=> $post ,
            'categories' => Category::all()
        ]);


    }
}
