<?php

namespace App\Controllers;

use App\Models\AlternatifModel;

class Alternatif extends BaseController
{
    protected $alternatif;

    public function __construct()
    {
        if (session()->get('login') != "login") {
            // echo 'Access denied, Klik <a href="/login">login<a> untuk masuk kembali..';
            // exit;
        }
        $this->alternatif = new AlternatifModel();
    }

    public function index($bulan, $tahun)
    {
        // membuat bulan untuk keperluan periode
        $dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // membuat range tahun untuk keperluan periode
        $thnAwal = 2022;
        $thnAkhir = intval(date('Y'));
        $jumlahThn = $thnAkhir - $thnAwal;
        $dataTahun = [];
        for ($i = 0; $i <= $jumlahThn; $i++) {
            $dataTahun[] = $thnAwal + $i;
        }

        // $bulan = $this->request->getVar('bulan');
        // $tahun = $this->request->getVar('tahun');

        // Inisialisasi variabel untuk menampung data alternatif
        // $alternatif = [];

        // Cek apakah bulan dan tahun telah ditentukan
        // if (!is_null($bulan) && !is_null($tahun)) {
        // Konversi bulan dari nama ke angka
        // $bulanAngka = array_search($bulan, $dataBulan) + 1; // Mengasumsikan bulan disimpan dalam bentuk angka di database

        // Konversi tahun dari 4 digit ke 2 digit terakhir
        // $tahunDuaDigit = substr($tahun, -2);

        // Dapatkan data alternatif berdasarkan periode
        // $alternatif = $this->alternatif->getPeriode($bulan, $tahun);
        // dd($alternatif);
        // }

        $data = [
            'title' => 'Data Alternatif',
            'dataBulan' => $dataBulan,
            'dataTahun' => $dataTahun,
            'alternatif' => $this->alternatif->getPeriode($bulan, $tahun) // Gunakan data alternatif berdasarkan periode
        ];
        return view('alternatif/index', $data);
    }

    public function periode()
    {
        // Logic untuk mengambil data berdasarkan bulan dan tahun
        // Kirim data ke view
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
