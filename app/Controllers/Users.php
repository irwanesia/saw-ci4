<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->users = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Users',
            'users' => $this->users->findAll()
        ];
        return view('Users/index', $data);
    }
}
