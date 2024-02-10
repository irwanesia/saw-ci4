<?php

namespace App\Controllers;

class Hasil extends BaseController
{

    public function __construct()
    {
        if (session()->get('login') != "login") {
            // echo 'Access denied, Klik <a href="/login">login<a> untuk masuk kembali..';
            // exit;
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data Hasil'
        ];
        return view('Hasil/index', $data);
    }
}
