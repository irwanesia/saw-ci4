<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use App\Models\AlternatifModel;
use App\Models\PenilaianModel;
use App\Models\UsersModel;
use App\Models\HasilModel;

class Dashboard extends BaseController
{
    protected $kriteria;
    protected $subKriteria;
    protected $alternatif;
    protected $penilaianAlternatif;
    protected $user;
    protected $hasil;

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->kriteria = new KriteriaModel();
        $this->subKriteria = new subKriteriaModel();
        $this->alternatif = new AlternatifModel();
        $this->penilaianAlternatif = new PenilaianModel();
        $this->user = new UsersModel();
        $this->hasil = new HasilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('dashboard', $data);
    }

    public function home()
    {
        $data = [
            'title' => 'SPK SAW',
            'countKriteria' => $this->kriteria->countAllResults(),
            'countSubKriteria' => $this->subKriteria->countAllResults(),
            'countAlternatif' => $this->alternatif->countAllResults(),
            'countPenilaianAlternatif' => $this->penilaianAlternatif->countAllResults(),
            'countUser' => $this->user->countAllResults(),
            'countHasil' => $this->hasil->countAllResults(),

        ];
        return view('index', $data);
    }
}
