<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class=" d-flex justify-content-center">
    <div class="card m-5 px-5 py-3">
        <div class="row mb-3 text-center">
            <h3>Log In</h3>
        </div>    
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('msg'); ?>
                        </div>
                    <?php endif; ?>
                    <form class="form-group" action="<?= site_url('/login/auth'); ?>" method="post">
                        <div>
                            <input type="text" class="form-control mb-2" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control mb-2" name="password" placeholder="Pasword" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>