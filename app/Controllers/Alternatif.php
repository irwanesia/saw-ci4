<?php

namespace App\Controllers;

use App\Models\AlternatifModel;

class Alternatif extends BaseController
{
    protected $alternatif;
    protected $dataBulan;
    protected $dataTahun;

    public function __construct()
    {
        if (session()->get('login') != "login") {
            // echo 'Access denied, Klik <a href="/login">login<a> untuk masuk kembali..';
            // exit;
        }
        $this->alternatif = new AlternatifModel();
        
        // membuat bulan untuk keperluan periode
        $this->dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
        // membuat range tahun untuk keperluan periode
        $thnAwal = 2022;
        $thnAkhir = intval(date('Y'));
        $jumlahThn = $thnAkhir - $thnAwal;
        $this->dataTahun = [];
        for ($i = 0; $i <= $jumlahThn; $i++) {
            $this->dataTahun[] = $thnAwal + $i;
        }
    }
    
    public function index($bulan = null, $tahun = null)
    {
        $data = [
            'title' => 'Data Alternatif',
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
            'alternatif' => $this->alternatif->getPeriode($bulan, $tahun) // Gunakan data alternatif berdasarkan periode
        ];
        return view('alternatif/index', $data);
    }

    public function autoKode()
    {
        return json_encode($this->alternatif->generateCode());
    }

    public function tambah()
    {
        // session dipindahkan ke basecontroller
        $data = [
            'title' => 'Tambah Data Alternatif',
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
            'validation' => \Config\Services::validation()
        ];
        return view('alternatif/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'alternatif' => [
                // 'rules' => 'required|is_unique[alternatif.alternatif]',
                'errors' => [
                    'required' => 'nama {field} harus diisi!',
                    // 'is_unique' => 'alternatif {field} sudah ada!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/alternatif/simpan')->withInput()->with('validation', $validation);
        }

        $this->alternatif->save([
            'id_bulan' => $this->request->getVar('bulan'),
            'id_tahun' => $this->request->getVar('tahun'),
            'kode' => $this->request->getVar('kode'),
            'alternatif' => $this->request->getVar('alternatif'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("Alternatif berhasil ditambahkan!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/alternatif');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Alternatif',
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
            'alternatif' => $this->alternatif->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/alternatif/edit', $data);
    }

    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'alternatif' => [
                // 'rules' => 'required|is_unique[alternatif.alternatif]',
                'errors' => [
                    'required' => 'nama {field} harus diisi!',
                    // 'is_unique' => 'alternatif {field} sudah ada!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/alternatif/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->alternatif->save([
            'id_alternatif' => $id,
            'id_bulan' =>  $this->request->getVar('bulan'),
            'id_tahun' =>  $this->request->getVar('tahun'),
            'kode' =>  $this->request->getVar('kode'),
            'alternatif' => $this->request->getVar('alternatif'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("Allternatif berhasil diupdate!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/alternatif');
    }

    public function delete($id)
    {
        $this->alternatif->delete($id);

        // pesan berhasil didelete
        $isipesan = '<script> alert("Data berhasil dihapus!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/alternatif');
    }
}
