<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::latest('published_at')
        ->with(['category', 'author']);
    
        if( request('search')){
    
            $posts->where('title' , 'like' ,'%' .request('search') . '%');
            $posts->orWhere( 'resumen' , 'like' ,'%' .request('search') . '%');
        }
        
        return view('posts', [
          'posts' => $posts->get() ,
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
