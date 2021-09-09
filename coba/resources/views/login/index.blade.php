@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    <h1 class="h3 mb-3 fw-normal text-center mt-3">Please Login</h1>
      @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('loginError'))    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <main class="form-signin">
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required>
              <label for="email">Email address</label>
              @error('email')
                  <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

          </form>
          <small class="d-block text-center mt-3">Not Register ? <a href="/register" class="text-decoration-none">Register Now!</a></small>
      </main>
  </div>
</div>
@endsection