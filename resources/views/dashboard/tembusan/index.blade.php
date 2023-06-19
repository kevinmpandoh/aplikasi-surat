@extends('dashboard.layouts.main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg">                                
                <div class="card card-primary shadow">
                    <div class="card-body">

                        <a href="" class="btn btn-primary mb-4 tampilModalTambahTembusan" data-toggle="modal" data-target="#tambahTembusan">Tambah <i class="fas fa-fw fa-plus"></i></a>

                        @if ($tembusan->count())
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</td>
                                    <th>Nama Surat</td>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                                                    
                                @foreach ($tembusan as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->no_surat }}</td>
                                    <td>{{ $t->nama_surat }}</td>
                                    <td>{{ $t->keterangan }}</td>
                                    <td>
                                        <a href="" data-id="{{ $t->id }}" data-csrf="{{ csrf_token() }}" class="btn btn-warning btn-sm mr-1 tampilModalUbahTembusan"  data-toggle="modal" data-target="#tambahTembusan" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="/dashboard/tembusan/{{ $t->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm border-0 tombolHapus" data-confirm-delete="true" data-toggle="tooltip" title="Hapus"><i class="fas fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h6 class="text-mute text-center">- Belum ada tembusan -</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="tambahTembusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Tembusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">                    
                    @csrf
                    <input type="hidden" name="_method" id="method" value="">
                    <div class="form-group">
                        <select name="no_surat" id="no_surat" class="form-control">
                            <option value="">-Pilih Surat-</option>

                            @foreach ($surat as $s)
                                <option value="{{ $s->no_surat }}">{{ $s->nama_surat }}</option>                            
                            @endforeach
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off">
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