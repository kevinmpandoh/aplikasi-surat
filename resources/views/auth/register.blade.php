@extends('auth.layouts.main')

@section('container')
    
<div class="card card-primary">
  <div class="card-header d-block text-center mt-3"><h4>{{ $title }}</h4></div>

  <div class="card-body">
    <form method="post" action="/register">                  
        @csrf        
      <div class="form-group">
        <label for="usernmae">Username</label>
        <input id="usernmae" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autofocus autocomplete="off">        
        @error("username")
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
        
      </div>

      <div class="row">
        <div class="form-group col-6">
          <label for="password" class="d-block">Password</label>
          <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" autocomplete="off">
          @error("password")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group col-6">
          <label for="password2" class="d-block">Konfirmasi Password</label>
          <input id="password2" type="password" class="form-control @error('password2') is-invalid @enderror" name="password2" autocomplete="off"  >
          @error("password2")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-6">
          <label>Role</label>
          <select class="form-control selectric @error('role_id') is-invalid @enderror" name="role_id">
            <option value="">-Pilih Role-</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" >{{ $role->keterangan }}</option>                
            @endforeach
          </select>
          @error('role_id')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="form-group col-6">
          <label>Penempatan</label>
          <select class="form-control selectric @error('penempatan_id') is-invalid @enderror" name="penempatan_id">
            <option value="">-Pilih Penempatan-</option>
            @foreach ($penempatan as $p)
              <option value="{{ $p->id }}" >{{ $p->keterangan }}</option>                
            @endforeach                                          
          </select>
          @error('penempatan_id')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
          
        </div>
        
      </div>                  

      
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block">
              Daftar
            </button>
      </div>
      <div class="mt-5 text-muted text-center">
        Sudah punya akun ? <a href="/">Login</a>
      </div>
    </form>
  </div>
</div>
@endsection