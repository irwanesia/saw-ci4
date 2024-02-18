<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row mt-5 mb-3">
    <div class="col-md-9">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <a href="<?= base_url('/kriteria') ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-lg mb-3" id="menu">
                        <div class="card-body">
                            <h6 class="card-title align-self-center fw-bold">Data Kriteria</h6>
                            <div class="d-flex mt-3 justify-content-between">
                                <h3>3</h3>
                                <span class=""><i class="fas fa-clipboard"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="<?= base_url('/alternatif') ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-lg mb-3" id="menu">
                        <div class="card-body">
                            <h6 class="card-title align-self-center fw-bold">Data Alternatif</h6>
                            <div class="d-flex mt-3 justify-content-between">
                                <h3>3</h3>
                                <span class=""><i class="fas fa-map-signs"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="<?= base_url('/hasil') ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-lg mb-3" id="menu">
                        <div class="card-body">
                            <h6 class="card-title align-self-center fw-bold">Data Hasil</h6>
                            <div class="d-flex mt-3 justify-content-between">
                                <h3>3</h3>
                                <span class=""><i class="fas fa-poll"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6">
                <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-lg mb-3" id="menu">
                        <div class="card-body">
                            <h6 class="card-title align-self-center fw-bold">Data Users</h6>
                            <div class="d-flex mt-3 justify-content-between">
                                <h3>3</h3>
                                <span class=""><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-xs-12 text-center">
            <small>Pie Chart Keseluruhan Data</small>
        </div>
        <canvas class="mt-2" id="pieChart"></canvas>
    </div>
</div>
<div class="card border-0 shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <form action="">
                            <select name="tahun" id="" class="form-select" aria-label="Default select example">
                                <option value="#" disabled selected>-Pilih Tahun-</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="col-xs-12 text-center">
                            <h6>Grafik Layak/Tidak Layak Pertahun</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <canvas class="mt-5" id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>