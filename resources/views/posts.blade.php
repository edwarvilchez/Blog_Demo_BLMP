@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<!-----mostramos los registros de la BD usando foreach----->
            @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
        <!---función para motrar los contenidos multimedia--->
                    @if($post->image)
                        <img src="{{ $post->get_image }}" 
                        class="card-image-top mb-4">
                    @elseif($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $post->iframe !!}
                    </div>                        
                    @endif
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->get_excerpt }}
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $post->user->name}}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                    <a href="{{ route('post', $post) }}">Leer +</a>
                </div>
            </div>
            @endforeach
            <!--paginamos-->
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection