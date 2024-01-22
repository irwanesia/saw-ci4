<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
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
        <div class="tab-pane fade show active" id="kriteria" role="tabpanel" aria-labelledby="kriteria-tab">
        <div class="d-flex justify-content-end">
            <a href="/tambah-kriteria" class="btn btn-primary float-end">Tambah Kriteria</a>
        </div>
            <div class="table-responsive">
                <table class="table">
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
                        <?php foreach($kriteria as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['kode_kriteria'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['type'] ?></td>
                            <td><?= $row['bobot'] ?></td>
                            <td><?= $row['ada_pilihan'] ?></td>
                            <td>
                            <a href="/edit-kriteria" class="btn btn-secondary">Edit</a>
                            <a href="/hapus-kriteria" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="subKriteria" role="tabpanel" aria-labelledby="profile-tab">
            <?php foreach($kriteria as $row) : ?>
                <?php // $id = $row['id_kriteria'] ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($subKriteria as $sub) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $sub['nama'] ?></td>
                                <td><?= $sub['nilai'] ?></td>
                                <td>
                                <a href="/edit-kriteria" class="btn btn-secondary">Edit</a>
                            <a href="/hapus-kriteria" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    </div>
    
</div>

<?= $this->endSection('content') ?>