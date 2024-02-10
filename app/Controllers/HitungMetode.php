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

    public function __construct()
    {
        if (session()->get('login') != "login") {
            echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
            exit;
        }
        $this->getNilai = new HitungMetodeModel();
        $this->penilaian = new PenilaianModel();
        $this->alternatif = new AlternatifModel();
        $this->kriteria = new KriteriaModel();
        $this->subKriteria = new SubKriteriaModel();
    }

    public function index()
    {

        $kriteria = $this->penilaian->getDistinctKriteria();
        $dataPenilaian = $this->penilaian->getAllPenilaian();
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
        ]);
    }
}
