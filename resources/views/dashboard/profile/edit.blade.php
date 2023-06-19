@extends('dashboard.layouts.main')

@section('container')

<section class="section">
  <div class="section-header">
    <h1>{{ $title }}</h1>
  </div>
  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-10">
      <div class="card">
        <form method="post" action="/dashboard/profile/{{ $profile->user_id }}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group row align-items-center">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Lengkap</label>
              <div class="col-sm-6 col-md-9">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror " id="nama" value="{{ $profile->nama }}">
                @error("nama")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row align-items-center">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">No HP</label>
              <div class="col-sm-6 col-md-9">
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror " id="no_hp" value="{{ $profile->no_hp }}">
                @error("no_hp")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row align-items-center">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">NIP</label>
              <div class="col-sm-6 col-md-9">
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror " id="nip" value="{{ $profile->nip }}">
                @error("nip")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row align-items-center">
              <label for="site-description" class="form-control-label col-sm-3 text-md-right">Alamat</label>
              <div class="col-sm-6 col-md-9">
                <textarea class="form-control @error('alamat') is-invalid @enderror " name="alamat" id="alamat">{{ $profile->alamat }}</textarea>
                @error("alamat")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row align-items-center">
              <label class="form-control-label col-sm-3 text-md-right">Foto Profile</label>
              <div class="col-sm-6 col-md-9">
                <div class="custom-file">
                  <input type="hidden" name="oldFoto" value="{{ $profile->foto }}">
                  <input type="file" name="foto" class="custom-file-input" id="foto">
                  <label class="custom-file-label">Choose File</label>
                </div>
                <div class="form-text text-muted">Ukuran gambar tidak boleh lebih dari 5MB</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" id="save-btn">Edit <i class="fas fa-fw fa-edit"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



@endsection