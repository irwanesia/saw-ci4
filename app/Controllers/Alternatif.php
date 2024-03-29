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
        // Pengecekan session login
        if (session()->get('login') != "login") {
            // Jika tidak ada session 'login', redirect ke halaman login dengan pesan error
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Data Nasabah',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
            'alternatif' => $this->alternatif->getPeriode($bulan, $tahun) // Gunakan data alternatif berdasarkan periode
        ];
        return view('alternatif/index', $data);
    }

    // public function autoKode()
    // {
    //     return json_encode($this->alternatif->generateCode());
    // }

    public function tambah($bulan = null, $tahun = null)
    {
        // Pengecekan session login
        if (session()->get('login') != "login") {
            // Jika tidak ada session 'login', redirect ke halaman login dengan pesan error
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Data Nasabah',
            'bulan' => $bulan,
            'tahun' => $tahun,
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
            return redirect()->to('/nasabah/simpan')->withInput()->with('validation', $validation);
        }

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $this->alternatif->save([
            'id_bulan' => $bulan,
            'id_tahun' => $tahun,
            'alternatif' => $this->request->getVar('alternatif'),
            'tgl_lahir' => $this->request->getVar('tglLahir'),
            'alamat' => $this->request->getVar('alamat'),
            'jns_kelamin' => $this->request->getVar('jnsKelamin'),
            'no_telp' => $this->request->getVar('noTelp'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("Nasabah berhasil ditambahkan!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/nasabah/periode/' . $bulan . '/' . $tahun);
    }

    public function edit($id)
    {
        // Pengecekan session login
        if (session()->get('login') != "login") {
            // Jika tidak ada session 'login', redirect ke halaman login dengan pesan error
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Edit Nasabah',
            'dataBulan' => $this->dataBulan,
            'dataTahun' => $this->dataTahun,
            'bulan' => $this->request->getVar('bulan'),
            'tahun' => $this->request->getVar('tahun'),
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
            return redirect()->to('/nasabah/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $this->alternatif->save([
            'id_alternatif' => $id,
            'id_bulan' =>  $bulan,
            'id_tahun' =>  $tahun,
            'alternatif' => $this->request->getVar('alternatif'),
            'tgl_lahir' => $this->request->getVar('tglLahir'),
            'alamat' => $this->request->getVar('alamat'),
            'jns_kelamin' => $this->request->getVar('jnsKelamin'),
            'no_telp' => $this->request->getVar('noTelp'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("Nasabah berhasil diupdate!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/nasabah/periode/' . $bulan . '/' . $tahun);
    }

    public function delete($id)
    {
        // Pengecekan session login
        if (session()->get('login') != "login") {
            // Jika tidak ada session 'login', redirect ke halaman login dengan pesan error
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
            return redirect()->to('/login');
        }

        $this->alternatif->delete($id);

        // pesan berhasil didelete
        $isipesan = '<script> alert("Data berhasil dihapus!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/nasabah');
    }
}
