<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted">Data Alternatif</h6>
            <a href="<?= base_url('/alternatif/tambah') ?>" class="btn btn-sm btn-primary">Tambah Alternatif</a>
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
<?= $this->endSection('content') ?>