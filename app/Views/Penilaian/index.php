<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h5>Daftar Data Penilaian</h5>
            <!-- <a href="#tambah-kriteria" class="btn btn-sm btn-primary">Tambah Kriteria</a> -->
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
                        <th>Alternatif</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($alternatif as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode'] ?></td>
                                <td><?= $row['alternatif'] ?></td>
                                <td>
                                    <?php if ($row['isPenilaianExists']) : ?>
                                        <!-- Tombol Edit -->
                                        <form action="/penilaian/edit/<?= $row['id_alternatif'] ?>" method="get" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="GET">
                                            <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                        </form>
                                    <?php else : ?>
                                        <!-- Tombol Input -->
                                        <form action="/penilaian/tambah/<?= $row['id_alternatif'] ?>" method="get" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="GET">
                                            <button type="submit" class="btn btn-sm btn-primary">Input</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection('content') ?>