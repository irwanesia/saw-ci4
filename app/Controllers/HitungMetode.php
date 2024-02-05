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
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->getNilai = new HitungMetodeModel();
        $this->penilaian = new PenilaianModel();
        $this->alternatif = new AlternatifModel();
        $this->kriteria = new KriteriaModel();
        $this->subKriteria = new SubKriteriaModel();
    }


    // if ($key['ada_pilihan'] == 1) {
    // 	$q4 = mysqli_query($koneksi, "SELECT sub_kriteria.nilai FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$keys[id_alternatif]' AND penilaian.id_kriteria='$key[id_kriteria]'");
    // 	$data = mysqli_fetch_array($q4);
    // 	echo $data['nilai'];
    // } else {
    // 	$q4 = mysqli_query($koneksi, "SELECT nilai FROM penilaian WHERE id_alternatif='$keys[id_alternatif]' AND id_kriteria='$key[id_kriteria]'");
    // 	$data = mysqli_fetch_array($q4);
    // 	echo $data['nilai'];
    // }

    public function index()
    {
        // Dapatkan semua data alternatif
        $alternatifList = $this->alternatif->findAll();
        // Dapatkan semua data kriteria
        $kriteriaList = $this->kriteria->findAll();

        // Inisialisasi array untuk menyimpan data penilaian
        $allData = [];

        // Looping data alternatif
        foreach ($alternatifList as $alternatif) {
            // looping data kriteria
            foreach ($kriteriaList as $kriteria) {
                // lakukan join table
                $nilaiSubkriteria = $this->getNilai->getNilaiSubKriteria($alternatif['id_alternatif'], $kriteria['id_kriteria']);
                $nilaiById = $this->getNilai->getNilaiById($alternatif['id_alternatif'], $kriteria['id_kriteria']);

                // Tambahkan data subkriteria ke dalam array
            }
            $allData[] = [
                'alternatif' => $alternatif,
                'kriteria' => $kriteria,
                'nilaiSubkriteria' => $nilaiSubkriteria,
                'nilaiById' => $nilaiById,
            ];
        }

        // Kirim data ke view
        return view('Perhitungan/index', [
            'title' => 'Perhitungan Metode SAW',
            'allData' => $allData,
            'kriteria' => $this->kriteria->findAll()
        ]);
    }
}
