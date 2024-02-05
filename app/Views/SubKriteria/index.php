<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Sub Kriteria</li>
        </ol>
    </nav>

    <!-- table data subkriteria -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan') ?>
    <?php endif ?>
    <?php foreach ($subkriteriaData as $data) : ?>
        <div class="card mt-5 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-muted">Data Subkriteria untuk Kriteria "<b><?= ucwords($data['kriteria']['kriteria']) ?></b>"</h6>
                <form action="/sub-kriteria/tambah/<?= $data['kriteria']['id_kriteria'] ?>" method="get" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="GET">
                    <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                </form>
            </div>

            <div class="card-body m-2">

                <div class="table-responsive">

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
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['subkriteria'] as $subkriteriaItem) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $subkriteriaItem['sub_kriteria'] ?></td>
                                            <td><?= $subkriteriaItem['nilai'] ?></td>
                                            <td>
                                                <form action="/sub-kriteria/edit/<?= $subkriteriaItem['id_sub_kriteria'] ?>" method="get" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="id_kriteria" value="<?= $subkriteriaItem['id_kriteria'] ?>">
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                                </form>
                                                <form action="/sub-kriteria/hapus/<?= $subkriteriaItem['id_sub_kriteria'] ?>" method="post" class="d-inline">
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
        </div>
    <?php endforeach ?>
</div>

<?= $this->endSection('content') ?>