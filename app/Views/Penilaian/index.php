<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penilaian</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h5>Daftar Data Penilaian</h5>
            <!-- <a href="#tambah-kriteria" class="btn btn-sm btn-primary">Tambah Kriteria</a> -->
        </div>
        <div class="card-body m-2">
            <div class="table-responsive">
                <table id="myTable" class="table">
                    <thead>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        <?php foreach ($alternatif as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td>
                                    <a href="/edit-alternatif" class="btn btn-sm btn-secondary">Edit</a>
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