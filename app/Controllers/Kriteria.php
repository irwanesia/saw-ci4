<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;

class Kriteria extends BaseController
{
    protected $kriteria;
    protected $subKriteria;

    public function __construct()
    {
        // if (session()->get('login') != "login") {
        //     echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
        //     exit;
        // }
        $this->kriteria = new KriteriaModel();
        $this->subKriteria = new SubKriteriaModel();
    }
    
    public function index($id)
    {
        $data = [
            'title' => 'Data Kriteria',
            'kriteria'=> $this->kriteria->findAll(),
            'subKriteria'=> $this->subKriteria->find($id),
        ];
        return view('Kriteria/index', $data);
    }
}
