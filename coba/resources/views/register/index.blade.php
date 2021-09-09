@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
      <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal text-center mt-5">Registration Form</h1>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
              <label for="name">Name</label>
              @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            <div class="form-floating">
              <input type="password" class="form-control @error('name') is-invalid @enderror rounded-bottom" id="password" name="password" placeholder="Password" required>
              <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </div>

          </form>
          <small class="d-block text-center mt-3">Already Registered ? <a href="/login" class="text-decoration-none">Login Now!</a></small>
      </main>
  </div>
</div>
@endsection