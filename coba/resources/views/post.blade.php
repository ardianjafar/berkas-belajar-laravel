@extends('layouts.main')

@section('container')

    <h1 class="mb-3"> {{ $post->title }}</h1>
    <article class="mb-4">
        <p>By . <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">
            {{ $post->author->username }}
            </a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">
                {{ $post->category->name }}
            </a>
        </p>
        <p>{!! $post->body !!}</p>
    </article>

    <a href="/posts">Back to Blog</a>
@endsection
