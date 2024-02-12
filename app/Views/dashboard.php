<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
        <div class="card border-0 shadow-lg mt-5 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
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
                                    <h5>Grafik Layak/Tidak Layak Pertahun</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <canvas class="mt-5" id="barChart"></canvas>
                    </div>
                    <div class="col-md-3">
                        <div class="col-xs-12 text-center">
                            <h5>Grafik Layak/Tidak Layak Keseluruhan Data</h5>
                        </div>
                        <canvas class="mt-5" id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection('content') ?>