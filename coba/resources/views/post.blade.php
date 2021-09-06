@extends('layouts.main')

@section('container')
    <article class="mb-4">
        <h2>{{ $post->title  }}</h2>
        <p>{!! $post->body !!}</p>
    </article>

    <a href="/posts">Back to Blog</a>
@endsection
