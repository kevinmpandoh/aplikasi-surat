@extends('dashboard.layouts.main')

@section('container')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg">                            
                <div class="card">
                    <div class="card-body shadow">
                        
                        
                        <a href="/dashboard/surat/create" class="btn btn-primary mb-4">Tambah <i class="fas fa-fw fa-plus"></i> </a>
                        
                        @if ($surats->count())
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Surat</th>
                                    <th>Nama Surat</th>
                                    <th>Konten</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                                                    
                                @foreach ($surats as $surat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surat->no_surat }}</td>
                                    <td>{{ $surat->nama_surat }}</td>
                                    <td>{!! Str::substr($surat->konten, 0, 50) !!}</td>
                                    <td><a href="#" class="font-weight-600"><img src="{{ asset('storage/' . $surat->user->profile->foto) }}" alt="avatar" width="30" height="30" class="rounded-circle mr-1">{{ $surat->user->profile->nama }}</a></td>
                                    {{-- <td>{{ $surat->user->profile->nama }}</td> --}}
                                    <td>
                                        @can('admin')
                                            <a href="/dashboard/surat/{{ $surat->id }}/edit" class="btn btn-warning btn-sm mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="/dashboard/surat/{{ $surat->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger mr-1 btn-sm" data-toggle="tooltip" title="Delete" ><i class="fas fa-trash"></i></button>
                                            </form>                                            
                                        @endcan                                    
                                        <a href="/dashboard/surat/{{ $surat->id }}" class="btn btn-icon btn-info mr-1 btn-sm" data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle"></i></a>                                        
                                        <a href="/dashboard/surat/{{ $surat->id }}/cetak" class="btn btn-success btn-sm" data-toggle="tooltip" title="PDF"><i class="fas fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @else
                        <h6 class="text-mute text-center">- Surat tidak ditemukkan -</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection