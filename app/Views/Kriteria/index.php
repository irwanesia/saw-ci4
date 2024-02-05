<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted">Data Kriteria</h6>
            <a href="<?= base_url('/kriteria/tambah') ?>" class="btn btn-sm btn-primary">Tambah Kriteria</a>
        </div>
        <div class="card-body m-2">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan') ?>
            <?php endif ?>
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
                                <td><?= $row['kriteria'] ?></td>
                                <td><?= $row['type'] ?></td>
                                <td><?= $row['bobot'] ?></td>
                                <td><?= $row['ada_pilihan'] == 0 ? "Pilih Langsung" : "Input Sub Kriteria" ?></td>
                                <td>
                                    <form action="/kriteria/edit/<?= $row['id_kriteria'] ?>" method="get" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="GET">
                                        <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                    </form>
                                    <form action="/kriteria/hapus/<?= $row['id_kriteria'] ?>" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>