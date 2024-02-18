<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mt-5 shadow-sm">
    <!-- /.card-header -->
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Pilih Periode</h6>
    </div>
    <form id="periodeForm">
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="bulanA" id="bulanA">
                        <option value="#" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach ($dataBulan as $key => $month) : ?>
                            <option value="<?= $key + 1 ?>" <?= ($key + 1) == $bulan ? 'selected' : '' ?>><?= $month ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="tahunA" id="tahunA">
                        <option value="#" disabled selected>-- Pilih Tahun --</option>
                        <?php foreach ($dataTahun as $key => $year) : ?>
                            <option value="<?= 2 . $key + 2 ?>" <?= (2 . $key + 2) == $tahun ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- notifikasi pesan -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan') ?>
<?php endif ?>

<!-- cek apakah ada data alternatif -->
<?php if (!empty($alternatif)) : ?>
    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h5>Daftar Data Penilaian</h5>
            <!-- <a href="#tambah-kriteria" class="btn btn-sm btn-primary">Tambah Kriteria</a> -->
        </div>
        <div class="card-body m-2">
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
                                    <?php if (!empty(($row['isPenilaianExists']))) : ?>
                                        <!-- Tombol Edit -->
                                        <form action="/penilaian/edit/<?= $row['id_alternatif'] ?>" method="get" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="bulan" value="<?= $bulan ?>">
                                            <input type="hidden" name="tahun" value="<?= $tahun ?>">
                                            <input type="hidden" name="_method" value="GET">
                                            <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                        </form>
                                    <?php else : ?>
                                        <!-- Tombol Input -->
                                        <form action="/penilaian/tambah/<?= $row['id_alternatif'] ?>" method="get" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="bulan" value="<?= $bulan ?>">
                                            <input type="hidden" name="tahun" value="<?= $tahun ?>">
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
    <!-- jika tidak ada data tampilkan pesan -->
<?php else : ?>
    <div class="alert alert-info mt-5" role="alert">
        Data tidak ada atau Silakan pilih bulan dan tahun terlebih dahulu untuk menampilkan data!
    </div>
<?php endif ?>
<?= $this->endSection('content') ?>