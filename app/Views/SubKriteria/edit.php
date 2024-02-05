<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Sub Kriteria</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="text-muted">Edit Sub Kriteria Untuk Kriteria "<b><?= ucwords($kriteria[0]['kriteria']) ?></b>"</h6>
            <a href="<?= base_url('/sub-kriteria') ?>" class="btn btn-secondary btn-sm"></span>
                <span class="text">Kembali</span>
            </a>
        </div>

        <form action="/sub-kriteria/update/<?= $subKriteria['id_sub_kriteria'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-body px-5 py-4 mb-4">
                <div class="row">
                    <input type="hidden" value="<?= $subKriteria['id_kriteria'] ?>" name="idKriteria">
                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Nama Sub Kriteria</label>
                        <input type="text" name="subKriteria" class="form-control <?= ($validation->hasError('subKriteria')) ? 'is-invalid' : ''; ?>" value="<?= $subKriteria['sub_kriteria'] ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('subKriteria'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Nilai</label>
                        <input type="number" name="nilai" value="<?= $subKriteria['nilai'] ?>" class="form-control" required />
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