<?php

namespace App\Controllers;

class Users extends BaseController
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
            'title' => 'Users'
        ];
        return view('Users/index', $data);
    }
}
