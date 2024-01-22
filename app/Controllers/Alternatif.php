<?php

namespace App\Controllers;

use App\Models\AlternatifModel;

class Alternatif extends BaseController
{
    protected $alternatif;

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->alternatif = new AlternatifModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Alternatif',
            'alternatif' => $this->alternatif->findAll(),
        ];
        return view('Alternatif/index', $data);
    }
}
