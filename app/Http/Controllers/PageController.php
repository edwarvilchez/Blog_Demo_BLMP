<?php

namespace App\Http\Controllers;

# invocamos la entidad Post
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // creamos los metodos declarados en las rutas

    # retornamos todos los posts a la vista, ordenados de > a < y paginados
    public function posts(){    	
    	return view('posts',[
    		'posts' => Post::with('user')->latest()->paginate()
    	]);
    }


    # mostramos un sólo post
    public function post(Post $post){
    	return view('post',['post' => $post]);
    }
}
