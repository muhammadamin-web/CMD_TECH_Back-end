@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Filtrlangan Blogpostlar</h2>
    @if($posts->isEmpty())
        <p>Hech qanday blogpost topilmadi.</p>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Batafsil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    @endif
</div>
@endsection
