<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Alternatif</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="text-muted">Tambah Data Alternatif</h6>
            <a href="<?= base_url('/alternatif') ?>" class="btn btn-secondary btn-sm"></span>
                <span class="text">Kembali</span>
            </a>
        </div>

        <form action="/alternatif/update/<?= $alternatif['id_alternatif'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-body px-5 py-4 mb-4">
                <input type="hidden" name="id" value="<?= $alternatif['id_alternatif'] ?>">
                <div class="row">
                    <div class="form-group col-md-12 mt-2">
                        <label class="form-label">Kode Alternatif</label>
                        <input type="text" name="kode" class="form-control" value="<?= $alternatif['kode'] ?>" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 mt-2">
                        <label class="form-label">Nama Alternatif</label>
                        <input autocomplete="off" type="text" name="alternatif" value="<?= $alternatif['alternatif'] ?>" class="form-control <?= ($validation->hasError('alternatif')) ? 'is-invalid' : ''; ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('alternatif'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button name="submit" value="submit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info btn-sm"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>