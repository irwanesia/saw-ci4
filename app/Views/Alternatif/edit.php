<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mt-5 shadow-sm">
    <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="text-muted">Edit Data Nasabah</h6>
    </div>

    <form action="/nasabah/update/<?= $alternatif['id_alternatif'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="card-body px-5 py-4 mb-4">
            <input type="hidden" name="id" value="<?= $alternatif['id_alternatif'] ?>">
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Periode Bulan</label>
                    <select class="form-control" name="bulan">
                        <?php foreach ($dataBulan as $key => $bulan) : ?>
                            <option value="<?= $key + 1 ?>" <?= ($key + 1) == $alternatif['id_bulan'] ? 'selected' : '' ?>><?= $bulan ?></option>
                        <?php endforeach ?>
                    </select>
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
            <div class="row mt-4">
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Nama Nasabah</label>
                    <input autocomplete="off" type="text" name="alternatif" class="form-control <?= ($validation->hasError('alternatif')) ? 'is-invalid' : ''; ?>" value="<?= $alternatif['alternatif'] ?>" />
                    <div class="invalid-feedback">
                        <?= $validation->getError('alternatif'); ?>
                    </div>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Tgl Lahir</label>
                    <input autocomplete="off" type="date" name="tglLahir" class="form-control <?= ($validation->hasError('tglLahir')) ? 'is-invalid' : ''; ?>" value="<?= $alternatif['tgl_lahir'] ?>" />
                    <div class="invalid-feedback">
                        <?= $validation->getError('tglLahir'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 mt-2">
                    <label class="form-label">Alamat Nasabah</label>
                    <textarea name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" cols=" 30" rows="3"><?= $alternatif['alamat'] ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jnsKelamin">
                        <option value="#" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="l" <?= $alternatif['jns_kelamin'] == "l" ? "selected" : "" ?>>Laki-laki</option>
                        <option value="p" <?= $alternatif['jns_kelamin'] == "p" ? "selected" : "" ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label class="form-label">No Telp</label>
                    <input autocomplete="off" type="text" name="noTelp" class="form-control <?= ($validation->hasError('noTelp')) ? 'is-invalid' : ''; ?>" value="<?= $alternatif['no_telp'] ?>" />
                    <div class="invalid-feedback">
                        <?= $validation->getError('noTelp'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
            <a href="<?= base_url('/nasabah/periode/') . $bulan . '/' . $tahun ?>" class="btn btn-secondary btn-sm"></span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>