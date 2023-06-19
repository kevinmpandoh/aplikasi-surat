@extends('dashboard.layouts.main')

@section('container')


<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-8">
        
            <div class="card author-box card-primary shadow">
              <div class="card-body">
                <div class="author-box-left">                  
                    <img alt="image" src="{{ asset('storage/' . $profile->foto) }}" class="rounded-circle author-box-picture" style="width: 100px;height:100px;object-fit:cover;" >                                        
                  <div class="clearfix"></div>
                  <a href="/dashboard/profile/{{ $profile->user_id }}/edit" class="btn btn-primary mt-3">Edit <i class="fas fa-fw fa-edit"></i></a>
                </div>
                <div class="author-box-details">
                  <div class="author-box-name">
                    <div class="text-primary font-weight-bold" >{{ $profile->nama }}</div>
                  </div>
                  <div class="author-box-job">Role : {{ $profile->user->role->keterangan }}</div>
                  <div class="author-box-description">
                    <div class="row">
                      <div class="col-lg-2">                      
                        <div class="font-weight-bold mb-2" >Alamat</div>
                        <div class="font-weight-bold mb-2">No. HP</div>
                        <div class="font-weight-bold mb-2">NIP</div>                        
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-2" >: {{ $profile->alamat }}</div>
                        <div class="mb-2">: {{ $profile->no_hp }}</div>
                        <div class="mb-2">: {{ $profile->nip }}</div>
                      </div>
                    </div>
                  </div>                                     
                </div>
              </div>
            </div>                                      
      </div>
    </div>
  </div>
</section>



@endsection