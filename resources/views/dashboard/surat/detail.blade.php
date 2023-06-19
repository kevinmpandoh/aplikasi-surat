@extends('dashboard.layouts.main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card shadow my-5 pb-5">
                    <div class=" card-body p-0">
                        <div class="p-3" style="background-color: <?= $surat['background'] ?>;">
                            <div class="row text-center">
                                <div class="col-2">
                                    <img src="{{ asset('storage/' . $surat->logo) }}" width="100">
                                </div>
                                <div class="col-8">
                                    <div class="text-uppercase font-weight-bold" style="font-size: 2rem;"><?= $surat['head']; ?></div>
                                    <div>Alamat : <?= $surat['alamat']; ?></div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <hr style="border:2px solid #222">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <div class="text-capitalize font-weight-bold" style="text-decoration:underline;"><?= $surat['nama_surat']; ?></div>
                                <div><?= $surat['no_surat']; ?></div>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-11 text-justify">
                                <?= $surat['konten']; ?>
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-between">
                            <div class="col-3 ml-4">
                                <div>
                                    <div>Tembusan :</div>
                                    <ol>
                                        <?php foreach ($tembusan as $t) : ?>
                                            <li><?= $t['keterangan']; ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div><?= $surat['tempat']; ?>,<?= date(" d F Y", strtotime($surat['tgl_surat'])); ?></div>
                                <img src="{{ asset('storage/' . $surat->ttd) }}" width="120">
                                <div class="font-weight-bold"><?= $surat['penanggung_jawab']; ?></div>
                                <div><small>NIP : <?= $surat['nip']; ?></small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection