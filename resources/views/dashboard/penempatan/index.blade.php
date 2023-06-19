@extends('dashboard.layouts.main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body">

                        <a href="" class="btn btn-primary mb-4 tampilModalTambahPenempatan" data-toggle="modal" data-target="#exampleModal">Tambah <i class="fas fa-fw fa-plus"></i></a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penempatan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>
                                        <a href="" data-id="{{ $p->id }}" data-csrf="{{ csrf_token() }}" class="btn btn-warning btn-sm mr-1 tampilModalUbahPenempatan" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="/dashboard/penempatan/{{ $p->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm  border-0" data-toggle="tooltip" title="Hapus"><i class="fas fa-fw fa-trash"></i> </button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Penempatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/penempatan" method="post">
                    @csrf
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-fw fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection