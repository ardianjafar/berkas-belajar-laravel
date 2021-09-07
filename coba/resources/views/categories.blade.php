@extends('layouts.main')

@section('container')

<h1 class="mb-3">Posts Category </h1>
    @foreach ($categories as $category)
    <ul>
        <li>
            <h2><a href="/categories/{{ $category->slug }}">{{ $category->nane }}</a></h2>
        </li>
    </ul>
    @endforeach
@endsection