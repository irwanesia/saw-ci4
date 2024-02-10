<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="border-0 mx-5 h-75">
    <div class="container bg-primary rounded">
        <div class="row mt-5">
            <div class="col-md-6 align-self-center">
                <img src="<?= base_url('icon/criteria.png') ?>" class="align-self-center" width="270" alt="">
            </div>
            <div class="col-md-6 text-white align-self-center">
                <h1>Aplikasi SPK</h1>
                <h5 class="my-3">Menggunakan Metode (<i>Simple Additive Weighting</i>)</h5>
                <a href="" class="btn rounded-pill btn-outline-light">Dashboard</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Dashboard</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"></h1>
                            <img src="<?= base_url('icon/dashboard.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/kriteria') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Kriteria</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countKriteria ?></h1>
                            <img src="<?= base_url('icon/criteria.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/sub-kriteria') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Sub Kriteria</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countSubKriteria ?></h1>
                            <img src="<?= base_url('icon/checklist.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/alternatif') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Alternatif</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countAlternatif ?></h1>
                            <img src="<?= base_url('icon/alternatif.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/list-penilaian') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Penilaian Alternatif</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countPenilaianAlternatif ?></h1>
                            <img src="<?= base_url('icon/input.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/hitung-saw') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Perhitungan SAW</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"></h1>
                            <img src="<?= base_url('icon/process.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/hasil') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Hasil</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countHasil ?></h1>
                            <img src="<?= base_url('icon/output.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg mb-3" id="menu">
                    <div class="card-body">
                        <h6 class="card-title">Users</h6>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text"><?= $countUser ?></h1>
                            <img src="<?= base_url('icon/users.png') ?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>