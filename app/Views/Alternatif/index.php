<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mt-5 shadow-sm">
    <!-- /.card-header -->
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Pilih Periode</h6>
        <a href="<?= base_url('/alternatif/tambah') ?>" class="btn btn-sm btn-primary">+ Tambah Alternatif</a>
    </div>
    <form id="periodeForm">
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="bulan" id="bulan">
                        <option value="#" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach ($dataBulan as $key => $bulan) : ?>
                            <option value="<?= $key + 1 ?>"><?= $bulan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="#" disabled selected>-- Pilih Tahun --</option>
                        <?php foreach ($dataTahun as $key => $tahun) : ?>
                            <option value="<?= 2 . $key + 2 ?>" ><?= $tahun ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- cek apakah ada data alternatif -->
<?php if (!empty($alternatif)) : ?>
    <div class="card mt-4 shadow-sm">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Data Aternatif</h6>
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
                        <th>Nama Alternatif</th>
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
                                    <form action="/alternatif/edit/<?= $row['id_alternatif'] ?>" method="get" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="GET">
                                        <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                    </form>
                                    <form action="/alternatif/hapus/<?= $row['id_alternatif'] ?>" method="post" class="d-inline">
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
    <!-- jika tidak ada data tampilkan pesan -->
<?php else : ?>
    <div class="alert alert-info mt-5" role="alert">
        Silakan pilih bulan dan tahun terlebih dahulu untuk menampilkan data!
    </div>
<?php endif ?>

<?= $this->endSection('content') ?>