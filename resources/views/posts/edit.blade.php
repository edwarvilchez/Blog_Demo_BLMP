@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Artículo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<!---formulario para editar los articulos--->
                    <form action="{{ route('posts.update', $post) }}" 
                          method="POST"
                          enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Título *</label>
                              <input type="text" name="title"
                                     class="form-control" required
                                     value="{{ old('title', $post->title)}}"
                          >
                          </div>
                           <div class="form-group">
                              <label>Imagen</label>
                              <input type="file" name="file">
                          </div>
                           <div class="form-group">
                            <label>Comentario</label>
                            <textarea 
                                class="form-control" name="body"  
                                rows="6" required 
                                value="{{ old('body', $post->body)}}"
                            >               
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Comentario Embebido</label>
                            <textarea 
                                class="form-control" name="iframe"
                                value="{{ old('iframe', $post->iframe)}}">               
                            </textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input 
                                type="submit" value="Actualizar" 
                                class="btn btn-sm btn-warning">
                        </div>
                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection