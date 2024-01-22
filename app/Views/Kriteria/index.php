<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
        </ol>
    </nav>

    <!-- menu data kriteria dan sub kriteria -->
    <ul class="nav nav-tabs mt-5 mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="kriteria-tab" data-bs-toggle="tab" data-bs-target="#kriteria" type="button" role="tab" aria-controls="kriteria" aria-selected="true">Data Kriteria</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="subKriteria-tab" data-bs-toggle="tab" data-bs-target="#subKriteria" type="button" role="tab" aria-controls="subKriteria" aria-selected="false">Data Sub Kriteria</button>
        </li>
    </ul>
    <div class="tab-content mb-5" id="myTabContent">
        <!-- untuk data kriteria -->
        <div class="tab-pane fade show active" id="kriteria" role="tabpanel" aria-labelledby="kriteria-tab">
            <div class="card mt-5 shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Kriteria</h5>
                    <a href="#tambah-kriteria" class="btn btn-sm btn-primary">Tambah Kriteria</a>
                </div>
                <div class="card-body m-2">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Kriteria</th>
                                <th>Type</th>
                                <th>Bobot</th>
                                <th>Cara Penilaian</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                <?php foreach ($kriteria as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode_kriteria'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['type'] ?></td>
                                        <td><?= $row['bobot'] ?></td>
                                        <td><?= $row['ada_pilihan'] ?></td>
                                        <td>
                                            <a href="/edit-kriteria" class="btn btn-sm btn-secondary">Edit</a>
                                            <a href="/hapus-kriteria" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- untuk data sub kriteria -->
        <div class="tab-pane fade" id="subKriteria" role="tabpanel" aria-labelledby="profile-tab">
            <?php foreach ($subkriteriaData as $data) : ?>
                <h2></h2>
                <div class="card mt-5 shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Data Subkriteria untuk Kriteria "<?= $data['kriteria']['nama'] ?>"</h5>
                        <a href="#tambahSubKriteria<?= $data['kriteria']['id_kriteria'] ?>" data-toggle="modal" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>

                    <!-- modal -->
                    <div class="modal fade" id="tambahSubKriteria<?= $data['kriteria']['id_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah <?= $data['kriteria']['nama'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <input type="text" name="id_kriteria" value="<?= $data['kriteria']['id_kriteria'] ?>" hidden>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nama Sub Kriteria</label>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nilai</label>
                                            <input autocomplete="off" step="0.001" type="number" name="nilai" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" name="tambahSubKriteria" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- table data subkriteria -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Sub Kriteria</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['subkriteria'] as $subkriteriaItem) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $subkriteriaItem['nama'] ?></td>
                                            <td><?= $subkriteriaItem['nilai'] ?></td>
                                            <td>
                                                <a href="/edit-kriteria" class="btn btn-sm btn-secondary">Edit</a>
                                                <a href="/hapus-kriteria" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>



</div>

<?= $this->endSection('content') ?>