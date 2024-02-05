<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data kriteria</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="text-muted">Edit Data Kriteria</h6>
            <a href="<?= base_url('/kriteria') ?>" class="btn btn-secondary btn-sm"></span>
                <span class="text">Kembali</span>
            </a>
        </div>

        <form action="/kriteria/update/<?= $kriteria['id_kriteria'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-body px-5 py-4 mb-4">
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Kode Kriteria</label>
                        <input autocomplete="off" type="text" name="kode" value="<?= $kriteria['kode_kriteria'] ?>" class="form-control" readonly />
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Nama Kriteria</label>
                        <input autocomplete="off" type="text" name="kriteria" value="<?= $kriteria['kriteria'] ?>" class="form-control <?= ($validation->hasError('kriteria')) ? 'is-invalid' : ''; ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('kriteria'); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Type Kriteria</label>
                        <select name="type" class="form-control" required>\
                            <option value="Benefit" <?= $kriteria['type'] == 'Benefit' ? 'selected' : '' ?>>Benefit</option>
                            <option value="Cost" <?= $kriteria['type'] == 'Cost' ? 'selected' : '' ?>>Cost</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Bobot</label>
                        <input type="number" name="bobot" value="<?= $kriteria['bobot'] ?>" class="form-control" required />
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Cara Penilaian</label>
                        <select name="adaPilihan" class="form-control" required>
                            <option value="0" <?= $kriteria['ada_pilihan'] == 0 ? 'selected' : '' ?>>Input Langsung</option>
                            <option value="1" <?= $kriteria['ada_pilihan'] == 1 ? 'selected' : '' ?>>Pilih Sub Kriteria</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button name="submit" value="submit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info btn-sm"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>