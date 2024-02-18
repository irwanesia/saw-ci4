<?php

namespace App\Controllers;

use App\Models\HitungMetodeModel;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use App\Models\SubKriteriaModel;

class HitungMetode extends BaseController
{
    protected $getNilai;
    protected $penilaian;
    protected $alternatif;
    protected $kriteria;
    protected $subKriteria;
    protected $dataBulan;
    protected $dataTahun;

    public function __construct()
    {
        if (session()->get('login') != "login") {
            // echo 'Access denied, Klik <a href="/login">login<a> untuk masuk kembali..';
            // exit;
        }
        $this->getNilai = new HitungMetodeModel();
        $this->penilaian = new PenilaianModel();
        $this->alternatif = new AlternatifModel();
        $this->kriteria = new KriteriaModel();
        $this->subKriteria = new SubKriteriaModel();
        // membuat bulan untuk keperluan periode
        $this->dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // membuat range tahun untuk keperluan periode
        $thnAwal = 2022;
        $thnAkhir = intval(date('Y'));
        $jumlahThn = $thnAkhir - $thnAwal;
        $this->dataTahun = [];
        for ($i = 0; $i <= $jumlahThn; $i++) {
            $this->dataTahun[] = $thnAwal + $i;
        }
    }

    public function index($bulan = null, $tahun = null)
    {

        $kriteria = $this->penilaian->getDistinctKriteria();
        $dataPenilaian = $this->penilaian->getAllPenilaian($bulan, $tahun);
        $nilaiMaxMin = $this->penilaian->getNilaiMaxMin();

        $data = [];
        foreach ($dataPenilaian as $penilaian) {
            $data[$penilaian['alternatif']][$penilaian['id_kriteria']] = $penilaian['nilai'];
        }

        // $nilaiMax = [];
        foreach ($nilaiMaxMin as $nMax) {
            $nilaiMax[] = $nMax['nilaiMax'];
        }
        foreach ($nilaiMaxMin as $nMin) {
            $nilaiMin[] = $nMin['nilaiMin'];
        }

        return view('Perhitungan/index', [
            'title' => 'Perhitungan Metode SAW',
            'kriteria' => $kriteria,
            'data' => $data,
            'alternatif' => $this->alternatif->findAll(),
            'nilaiMax' => $nilaiMax,
            'nilaiMin' => $nilaiMin,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
        ]);
    }

    public function simpan()
    {
        // Dapatkan array dari input
        $alternatif = $this->request->getVar('alternatif');
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $nilai = $this->request->getVar('nilai');
        // Menyimpan setiap entry
        $this->penilaian->save([
            'alternatif' => $alternatif,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'nilai' => $nilai
        ]);

        return redirect()->to('/perhitungan/periode/' . $bulan . '/' . $tahun);
    }
}
