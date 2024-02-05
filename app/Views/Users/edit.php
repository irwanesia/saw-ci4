<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Users</li>
        </ol>
    </nav>
    <div class="card mt-5 shadow-sm">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="text-muted">Tambah Data User</h6>
            <a href="<?= base_url('/users') ?>" class="btn btn-secondary btn-sm"></span>
                <span class="text">Kembali</span>
            </a>
        </div>

        <form action="/users/update/<?= $user['id_user'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-body px-5 py-4 mb-4">
                <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Username</label>
                        <input autocomplete="off" type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= (old('username'))  ? old('username') : $user['username'] ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Password</label>
                        <input autocomplete="off" type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Ulangi Password</label>
                        <input autocomplete="off" type="password" name="confirm_password" class="form-control <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : ''; ?>" />
                        <div class="invalid-feedback">
                            <?= $validation->getError('confirm_password'); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Nama</label>
                        <input autocomplete="off" type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control" required />
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">E-Mail</label>
                        <input autocomplete="off" type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required />
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label class="form-label">Level</label>
                        <select name="role" class="form-control" required>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Administrator</option>
                            <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>User</option>
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
</div>
<?= $this->endSection('content') ?>