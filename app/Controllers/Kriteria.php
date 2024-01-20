<?php

namespace App\Controllers;

class Kriteria extends BaseController
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
            'title' => 'Data Kriteria'
        ];
        return view('Kriteria/index', $data);
    }
}
