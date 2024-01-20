<?php

namespace App\Controllers;

class HitungMetode extends BaseController
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
            'title' => 'Perhitungan Metode SAW'
        ];
        return view('Perhitungan/index', $data);
    }
}
