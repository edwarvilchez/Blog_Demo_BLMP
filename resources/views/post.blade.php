@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<!-----mostramos los registros de la BD usando foreach----->
            <div class="card mb-4">
                <div class="card-body">
<!---condicional para mostrar los contenidos multimedia--->
                    @if($post->image)
                        <img src="{{ $post->get_image }}" 
                        class="card-image-top">
                    @elseif($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $post->iframe !!}
                    </div>                        
                    @endif
<!---condicional para mostrar los contenidos multimedia--->
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $post->user->name}}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>          
        </div>
    </div>
</div>
@endsection