<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
// use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostramos todos los posts de forma descendente
        $posts = Post::latest()->get();
        # retornamos a la vista
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creamos el método para almacenar en BD
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // revisamos como llegan los datos desde el formulario
        dd($request->all());
        // guardamos o salvamos los datos
        $post = Post::create([
            'user_id'=> auth()->user()->id ] + $request->all());
        // imagen
        // dado que la imagen no es obligatoria comprobemos si
        // se está enviando o no
        if($request->file('file')){
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        // retornamos a la vista
        return back()->with('status', 'Post Creado Éxitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // configuramos el método edit
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
