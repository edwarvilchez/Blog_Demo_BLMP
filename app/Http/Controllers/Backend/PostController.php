<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
//permite borrar las imagenes almacenadas en el proyecto
use Illuminate\Support\Facades\Storage; 

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
        // dd($request->all());
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
    public function update(PostRequest $request, Post $post)
    {
        // revisamos como vienen los datos desde el formulario
        //dd($request->all());
        // configuramos nuestra función actualizar
        $post->update($request->all());

        // imagen        
        if($request->file('file')){
        // eliminamos la imagen
            Storage::disk('public')->delete($post->image);
        //enviamos la imagen a la ubicación configurada
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

         // retornamos a la vista
        return back()->with('status', 'Actualizado Éxitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // configuramos nuestra función eliminar
        // eliminamos la imagen
        Storage::disk('public')->delete($post->image);
        $post->delete();

        // retornamos a la vista
        return back()->with('status', 'Eliminado Éxitosamente');
    }
}
