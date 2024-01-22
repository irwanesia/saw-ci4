<?php

namespace App\Controllers;

use App\Models\PenilaianModel;
use App\Models\AlternatifModel;

class Penilaian extends BaseController
{
    protected $penilaian;
    protected $alternatif;

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->penilaian = new PenilaianModel();
        $this->alternatif = new AlternatifModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Penilaian Alternatif',
            'penilaian' => $this->penilaian->findAll(),
            'alternatif' => $this->alternatif->findAll(),
        ];
        return view('Penilaian/index', $data);
    }
}
