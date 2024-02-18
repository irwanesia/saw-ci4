<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mt-5 shadow-sm">
    <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="text-muted">Tambah Data Alternatif</h6>
        <a href="<?= base_url('/alternatif/periode/') . $bulan . '/' . $tahun ?>" class="btn btn-secondary btn-sm"></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <form action="/alternatif/update/<?= $alternatif['id_alternatif'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="card-body px-5 py-4 mb-4">
            <input type="hidden" name="id" value="<?= $alternatif['id_alternatif'] ?>">
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Kode Alternatif</label>
                    <input type="text" name="kode" class="form-control" value="<?= $alternatif['kode'] ?>" readonly />
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Periode Bulan</label>
                    <select class="form-control" name="bulan">
                        <?php foreach ($dataBulan as $key => $bulan) : ?>
                            <option value="<?= $key + 1 ?>" <?= ($key + 1) == $alternatif['id_bulan'] ? 'selected' : '' ?>><?= $bulan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Nama Alternatif</label>
                    <input autocomplete="off" type="text" name="alternatif" value="<?= $alternatif['alternatif'] ?>" class="form-control <?= ($validation->hasError('alternatif')) ? 'is-invalid' : ''; ?>" />
                    <div class="invalid-feedback">
                        <?= $validation->getError('alternatif'); ?>
                    </div>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Periode Tahun</label>
                    <select class="form-control" name="tahun">
                        <option value="#" disabled selected>-- Pilih Tahun --</option>
                        <?php foreach ($dataTahun as $key => $tahun) : ?>
                            <option value="<?= 2 . $key + 2 ?>" <?= (2 . $key + 2) == $alternatif['id_tahun'] ? 'selected' : '' ?>><?= $tahun ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info btn-sm"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>