<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="border-0 mx-auto h-75">
    <h5 class="text-center mt-5 mb-5">Sistem Pendukung Keputusan Metode SAW <br>
    (Simple Additive Weighting)</h5>
    <div class="row">
        <div class="col-4">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="card border-0 bg-light text-dark shadow-lg mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Data Users</h5>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text">4</h1>
                            <img src="<?= base_url('icon/users.png')?>" width="70"  alt="">
                        </div>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-4">
            <a href="<?= base_url('/kriteria') ?>" class="text-decoration-none">
                <div class="card border-0 bg-light text-dark shadow-lg mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Data Kriteria</h5>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text">5</h1>
                            <img src="<?= base_url('icon/criteria.png')?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-4">
            <a href="<?= base_url('/alternatif') ?>" class="text-decoration-none">
                <div class="card border-0 bg-light text-dark shadow-lg mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Data Alternatif</h5>
                            <div class="d-flex justify-content-between">
                                <h1 class="card-text">12</h1>
                                <img src="<?= base_url('icon/alternatif.png')?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>        
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-4">
            <a href="<?= base_url('/penilaian-alternatif') ?>" class="text-decoration-none">
                <div class="card border-0 bg-light text-dark shadow-lg mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Penilaian Alternatif</h5>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Some quick example text to.</p>
                            <img src="<?= base_url('icon/dashboard.png')?>" width="70"  alt="">
                        </div>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-4">
            <a href="<?= base_url('/hitung-saw') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg text-dark bg-light mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Perhitungan SAW</h5>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Some quick example text to.</p>
                            <img src="<?= base_url('icon/process.png')?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-4">
            <a href="<?= base_url('/hasil') ?>" class="text-decoration-none">
                <div class="card border-0 shadow-lg text-dark bg-light mb-3" style="max-width: 22rem;" id="menu">
                <div class="card-body">
                        <h5 class="card-title">Hasil</h5>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Some quick example text to.</p>
                            <img src="<?= base_url('icon/output.png')?>" width="70" alt="">
                        </div>
                    </div>
                </div>
            </a>        
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="col-4">
            <a href="<?= base_url('/users') ?>" class="text-decoration-none">
                <div class="card border-0 bg-light text-dark shadow-lg mb-3" style="max-width: 22rem;" id="menu">
                    <div class="card-body">
                        <h5 class="card-title">Data Users</h5>
                        <div class="d-flex justify-content-between">
                            <h1 class="card-text">4</h1>
                            <img src="<?= base_url('icon/users.png')?>" width="70"  alt="">
                        </div>
                    </div>
                </div>
            </a>    
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>