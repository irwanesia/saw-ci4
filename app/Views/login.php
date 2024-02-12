<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class=" d-flex justify-content-center">
    <div class="card mb-3 p-5 m-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/icon/process.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('msg'); ?>
                        </div>
                    <?php endif; ?>
                    <form class="form-group" action="<?= site_url('login/auth'); ?>" method="post">
                        <div>
                            <input type="text" class="form-control mb-2" name="username" placeholder="Username" required>
                        </div>
                        <div>
                            <input type="password" class="form-control mb-2" name="password" placeholder="Pasword" required>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>