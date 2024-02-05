<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="mx-5 my-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perhitungan Metode SAW</li>
        </ol>
    </nav>
    <h5 class="mt-5">Perhitungan Metode SAW</h5>

    <div class="card mt-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted"># Bobot Preferensi (w)</h6>
        </div>
        <div class="card-body m-2">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan') ?>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <?php foreach ($kriteria as $key) : ?>
                                <th><?= $key['kode_kriteria'] ?> (<?= $key['type'] ?>)</th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <?php foreach ($kriteria as $key) : ?>
                                <td>
                                    <?= $key['bobot']; ?>
                                </td>
                            <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted"># Matriks Keputusan (x)</h6>
        </div>
        <div class="card-body m-2">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan') ?>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr align="center">
                            <th width="5%" rowspan="2">No</th>
                            <th>Nama Alternatif</th>
                            <?php foreach ($kriteria as $key) : ?>
                                <th><?= $key['kode_kriteria'] ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php // var_dump($allData);
                        $no = 1;
                        foreach ($allData as $data) : ?>
                            <tr align="center">
                                <td><?= $no; ?></td>
                                <td align="left"><?= $data['alternatif']['alternatif'] ?></td>
                                <?php foreach ($data['kriteria'] as $key) : ?>
                                    <td>
                                        <?php // var_dump($key) 
                                        ?>
                                        <?php if (($data['kriteria']['ada_pilihan']) == 1) : ?>
                                            <?php // var_dump($data['nilaiSubkriteria'])
                                            ?>
                                            <?php var_dump($data['nilaiById'][0]['id_kriteria'])
                                            ?>
                                        <?php else : ?>
                                            <?php echo "test" ?>
                                        <?php endif ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>