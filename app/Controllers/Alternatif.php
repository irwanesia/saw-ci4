<?php

namespace App\Controllers;

class Alternatif extends BaseController
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
            'title' => 'Data Alternatif'
        ];
        return view('Alternatif/index', $data);
    }
}
