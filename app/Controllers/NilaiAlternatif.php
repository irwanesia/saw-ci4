<?php

namespace App\Controllers;

class NilaiAlternatif extends BaseController
{

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
    }
    
    public function index()
    {
        $data = [
            'title' => 'Penilaian Alternatif'
        ];
        return view('NilaiAlternatif/index', $data);
    }
}
