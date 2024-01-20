<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hasil</li>
    </ol>
    </nav>
        <h5 class="card-header mt-5 mb-3">Hasil</h5>
       
    
</div>

<?= $this->endSection('content') ?>