<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card mt-5 shadow-sm">
    <!-- /.card-header -->
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Pilih Periode</h6>
    </div>
    <form id="periodeForm">
        <div class="row">
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="bulanP" id="bulanP">
                        <option value="#" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach ($dataBulan as $key => $month) : ?>
                            <option value="<?= $key + 1 ?>" <?= ($key + 1) == $bulan ? 'selected' : '' ?>><?= $month ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <select class="form-control" name="tahunP" id="tahunP">
                        <option value="#" disabled selected>-- Pilih Tahun --</option>
                        <?php foreach ($dataTahun as $key => $year) : ?>
                            <option value="<?= 2 . $key + 2 ?>" <?= (2 . $key + 2) == $tahun ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- cek apakah ada data alternatif -->
<?php if (!empty($data)) : ?>
    <h5 class="mt-5">Perhitungan Metode SAW</h5>

    <div class="card mt-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted"># Bobot Preferensi (W)</h6>
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
            <h6 class="text-muted"># Matriks Keputusan (X)</h6>
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
                            <th>Alternatif</th>
                            <?php foreach ($kriteria as $key) : ?>
                                <th><?= $key['kode_kriteria'] ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $nama_alternatif => $nilaiKriteria) : ?>
                            <tr align="center">
                                <td><?= $no; ?></td>
                                <td align="left"><?= $nama_alternatif ?></td>
                                <?php foreach ($kriteria as $key) : ?>
                                    <td><?= $nilaiKriteria[$key['id_kriteria']] ?? '-'; ?></td>
                                <?php endforeach ?>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted"># Matriks Ternormalisasi (R)</h6>
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
                        <?php $no = 1; ?>
                        <?php foreach ($data as $nama_alternatif => $nilaiKriteria) : ?>
                            <tr align="center">
                                <td><?= $no; ?></td>
                                <td align="left"><?= $nama_alternatif ?></td>
                                <?php foreach ($kriteria as $index => $key) : ?>
                                    <?php
                                    $nilai = array_key_exists($key['id_kriteria'], $nilaiKriteria) ? $nilaiKriteria[$key['id_kriteria']] : '-';
                                    if ($nilai !== '-') {
                                        // Asumsikan bahwa indeks $nilaiMax sesuai dengan urutan kriteria berdasarkan id_kriteria
                                        // Karena $nilaiMax diindeks mulai dari 0, kita gunakan $index yang juga dimulai dari 0 dalam loop kriteria
                                        if ($key['type'] == "Benefit") {
                                            $nilaiDiBagi = $nilai / $nilaiMax[$index];
                                        } else {
                                            $nilaiDiBagi = $nilaiMin[$index] / $nilai;
                                        }
                                    } else {
                                        $nilaiDiBagi = $nilai; // Jika tidak ada nilai, tetapkan '-' sebagai output
                                    }
                                    ?>
                                    <td><?= round($nilaiDiBagi, 3) ?></td>
                                <?php endforeach ?>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h6 class="text-muted"># Perhitungan/Nilai Preferensi (V)</h6>
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
                            <th>Perhitungan</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $nama_alternatif => $nilaiKriteria) : ?>
                            <tr align="center">
                                <td><?= $no; ?></td>
                                <td align="left"><?= $nama_alternatif ?></td>
                                <td align="left">
                                    SUM
                                    <?php $nilai_v = 0; ?>
                                    <?php foreach ($kriteria as $index => $key) : ?>
                                        <?php
                                        $nilai = array_key_exists($key['id_kriteria'], $nilaiKriteria) ? $nilaiKriteria[$key['id_kriteria']] : '-';
                                        if ($nilai !== '-') {
                                            // Asumsikan bahwa indeks $nilaiMax sesuai dengan urutan kriteria berdasarkan id_kriteria
                                            // Karena $nilaiMax diindeks mulai dari 0, kita gunakan $index yang juga dimulai dari 0 dalam loop kriteria
                                            if ($key['type'] == "Benefit") {
                                                $nilaiDiBagi = $nilai / $nilaiMax[$index];
                                            } else {
                                                $nilaiDiBagi = $nilaiMin[$index] / $nilai;
                                            }
                                        } else {
                                            $nilaiDiBagi = $nilai; // Jika tidak ada nilai, tetapkan '-' sebagai output
                                        }
                                        $perkalianBobot = $key['bobot'] * $nilaiDiBagi;
                                        $nilai_v += $perkalianBobot;
                                        echo "(" . $key['bobot'] . " x " . round($nilaiDiBagi, 3) . ") ";
                                        ?>
                                    <?php endforeach ?>
                                </td>
                                <td><?= round($nilai_v, 3) ?></td>
                            </tr>
                            <form id="formHasil" method="post">
                                <?= csrf_field() ?>
                                <input type="text" name="alternatif[]" value="<?= $nama_alternatif ?>">
                                <input type="hidden" name="bulan[]" value="<?= $bulan ?>">
                                <input type="hidden" name="tahun[]" value="<?= $tahun ?>">
                                <input type="hidden" name="nilai[]" value="<?= $nilai_v ?>">
                            </form>
                            <?php $no++; ?>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- jika tidak ada data tampilkan pesan -->
<?php else : ?>
    <div class="alert alert-info mt-5" role="alert">
        Data tidak ada atau Silakan pilih bulan dan tahun terlebih dahulu untuk menampilkan data!
    </div>
<?php endif ?>

<?= $this->endSection('content') ?>