@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3"> {{ $post->title }}</h1>
                <article class="mb-4">
                    <p>By . <a href="/posts?authors={{ $post->author->username }}" class="text-decoration-none">
                        {{ $post->author->username }}
                        </a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
                            {{ $post->category->name }}
                        </a>
                    </p>

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" 
                    alt="{{ $post->category->name }}" class="img-fluid">

                    <article class="my-3 fs-5">
                        <p>{!! $post->body !!}</p>
                    </article>
                </article>
            
                <a href="/posts">Back to Blog</a>
            </div>
        </div>
    </div>
    
    
@endsection
