@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3"> {{ $post->title }}</h1>
            <article class="mb-4">
                
                <a href="" class="btn btn-success btn-sm">
                    <span data-feather="arrow-left"></span>
                    Back to all my post
                </a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm">
                    <span data-feather="arrow-left"></span>
                    Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?...')"><span data-feather="x-circle"></span>Delete</button>
                  </form>
                

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" 
                alt="{{ $post->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    <p>{!! $post->body !!}</p>
                </article>
            </article>
        </div>
    </div>
</div> 
@endsection