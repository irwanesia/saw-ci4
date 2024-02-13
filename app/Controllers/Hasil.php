<?php

namespace App\Controllers;

use App\Models\HasilModel;

class Hasil extends BaseController
{
    protected $hasil;

    public function __construct()
    {
        if (session()->get('login') != "login") {
            // echo 'Access denied, Klik <a href="/login">login<a> untuk masuk kembali..';
            // exit;
        }
        $this->hasil = new HasilModel();
    }

    public function index()
    {
        $tahun = $this->request->getVar('tahun');

        $data = [
            'title' => 'Data Hasil',
            'bulan' => $this->hasil->getDataByTahun($tahun)
        ];
        return view('Hasil/index', $data);
    }
}
