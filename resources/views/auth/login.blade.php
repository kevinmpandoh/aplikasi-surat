@extends('auth.layouts.main')

@section('container')

<div class="card card-primary">
  <div class="card-header d-block text-center mt-3">
    <h4>{{ $title }}</h4>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      {{ session('success') }}
    </div>
  </div>
  @endif

  @if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      {{ session('loginError') }}
    </div>
  </div>
  @endif

  <div class="card-body">
    <form method="POST" action="/login">
      <div class="form-group">
        @csrf
        <label for="username">Usernmae</label>
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1"  autofocus autocomplete="off" value="{{ old('username') }}">
        @error("username")
          <div class="invalid-feedback">
            Username tidak boleh kosong
          </div>
        @enderror
      </div>
      <div class="form-group">
        <div class="d-block">
          <label for="password" class="control-label">Password</label>
          <div class="float-right">
            <a href="" class="text-small">
              Lupa Password?
            </a>
          </div>
        </div>
        <input id="password" type="password" class="form-control @error("password") is-invalid @enderror" name="password" tabindex="2" >
        @error("password")
          <div class="invalid-feedback">
            Password tidak boleh kosong
          </div>
        @enderror
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
          <label class="custom-control-label" for="remember-me">Ingat saya</label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Login
        </button>
      </div>
    </form>
    <div class="mt-5 text-muted text-center">
      Belum punya akun? <a href="/register">Daftar</a>
    </div>
  </div>
</div>

@endsection