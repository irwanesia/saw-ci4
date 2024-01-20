<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
    </ol>
    </nav>

    <!-- menu data kriteria dan sub kriteria -->
    <ul class="nav nav-tabs mt-5 mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="kriteria-tab" data-bs-toggle="tab" data-bs-target="#kriteria" type="button" role="tab" aria-controls="kriteria" aria-selected="true">Data Kriteria</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="subKriteria-tab" data-bs-toggle="tab" data-bs-target="#subKriteria" type="button" role="tab" aria-controls="subKriteria" aria-selected="false">Data Sub Kriteria</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kriteria" role="tabpanel" aria-labelledby="kriteria-tab">
            <!-- <h5 class="card-header">Data Kriteria</h5> -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="subKriteria" role="tabpanel" aria-labelledby="profile-tab">
            <!-- <h5 class="card-header mt-n5 mb-5">Data Kriteria</h5> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </div>
    
</div>

<?= $this->endSection('content') ?>