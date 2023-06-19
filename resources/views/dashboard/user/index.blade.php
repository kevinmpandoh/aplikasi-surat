@extends('dashboard.layouts.main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg">
                <div class="card shadow">
                    <div class="card-body">

                        {{-- <a href="" class="btn btn-primary mb-4 tampilModalTambahUser" data-toggle="modal" data-target="#ubahUser">Tambah <i class="fas fa-fw fa-plus"></i></a> --}}

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Penempatan</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if (!isset($user->profile->nama))
                                        <td>-</td>
                                    @else
                                        <td>{{ $user->profile->nama }}</td>                                        
                                    @endif
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->penempatan->keterangan }}</td>
                                    <td>{{ $user->role->keterangan }}</td>
                                    @if ($user->is_active == 1)
                                    <td>
                                        <div class="badge badge-success">Ya</div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="badge badge-danger">Tidak</div>                                        
                                    </td>
                                    @endif
                                    
                                    <td>                                        
                                        <a href="" data-id="{{ $user->id }}" data-csrf="{{ csrf_token() }}" class="btn btn-warning btn-sm mr-1 tampilModalUbahUser"  data-toggle="modal" data-target="#ubahUser" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm mr-1 border-0" data-toggle="tooltip" title="Hapus"><i class="fas fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="ubahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">                    
                    @csrf
                    <input type="hidden" id="method" name="_method" value="">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select name="penempatan_id" id="penempatan_id" class="form-control">
                            <option value="">-Pilih Penempatan-</option>
                            @foreach ($penempatan as $p)
                                <option value="{{ $p->id }}">{{ $p->keterangan }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">-Pilih Role-</option>
                            @foreach ($role as $r)
                                <option value="{{ $r->id }}">{{ $r->keterangan }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="form-group user">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active">
                            <label for="is_active" class="form-check-label">Aktif ?</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection