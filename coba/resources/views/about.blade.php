@extends('layouts.main')

@section('container')
    <h1>{{ $name }}</h1>
    <h3>{{ $pekerjaan }}</h3>
    <img src="img/{{ $gambar }}" alt="" width="200" class="img-thumbnail rounded-circle">
@endsection

