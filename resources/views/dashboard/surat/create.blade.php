@extends('dashboard.layouts.main')

@section('container')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/dashboard/surat" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Head Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('head') is-invalid @enderror " name="head" autocomplete="off" value="{{ old('head') }}" autofocus>

                                    @error("head")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror " name="alamat" autocomplete="off" value="{{ old('alamat') }}">

                                    @error("alamat")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('nama_surat') is-invalid @enderror " name="nama_surat" autocomplete="off" value="{{ old('nama_surat') }}">

                                    @error("nama_surat")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror " name="no_surat" value="{{ old('no_surat') }}" autocomplete="off">

                                    @error("no_surat")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('tempat') is-invalid @enderror " name="tempat" value="{{ old('tempat') }}" autocomplete="off">

                                    @error("tempat")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penanggung Jawab Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror " value="{{ old('penanggung_jawab') }}" name="penanggung_jawab" autocomplete="off">

                                    @error("penanggung_jawab")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            @if (!$profile->nip)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror " name="nip" autocomplete="off" value="{{ old("nip") }}">

                                    @error("nip")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            @else
                                <input type="hidden" name="nip" value="{{ $profile->nip }}">
                            @endif
                            
                            <div class="form-group row mb-4">

                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control datepicker @error('tgl_surat') is-invalid @enderror " name="tgl_surat" autocomplete="off" value="{{ old('tgl_surat') }}">

                                    @error("tgl_surat")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Surat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="color" class="form-control colorpickerinput" value="#ffffff" name="background">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea id="konten" class="summernote-simple" name="konten">{{ old("konten") }}</textarea>
                                    @error('konten')
                                    <p class="text-danger text-small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-4">
                                <div class="col-lg-3">
                                    <label class="col-form-label text-left col-lg-8">Tanda Tangan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview2" class="image-preview">
                                            <label for="image-upload2" id="image-label2">Choose File</label>
                                            <input type="file" name="ttd" id="image-upload2" class="@error('ttd') is-invalid @enderror" />
                                            @error("ttd")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 ml-5">
                                    <label class="col-form-label text-left col-lg-8">Logo Surat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="logo" id="image-upload" class="@error('logo') is-invalid @enderror" />
                                            @error("logo")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Tambah Surat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection