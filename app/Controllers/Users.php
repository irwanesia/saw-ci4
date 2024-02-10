<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;

    public function __construct()
    {
        if (session()->get('login') != "login") {
            echo 'Access denied, Klik <a href="/">login<a> untuk masuk kembali..';
            exit;
        }
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

    public function tambah()
    {
        // session dipindahkan ke basecontroller
        $data = [
            'title' => 'Form Register User',
            'validation' => \Config\Services::validation()
        ];
        return view('Users/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'nama {field} harus diisi!',
                    'is_unique' => 'username {field} sudah ada!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password minimal harus memiliki panjang 6 karakter!'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi!',
                    'matches' => 'Konfirmasi password tidak cocok dengan password!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/simpan')->withInput()->with('validation', $validation);
        }

        // enkripsi password dengan Bcrypt
        $password = $this->request->getVar('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->users->save([
            'username' => $this->request->getVar('username'),
            'password' => $hashedPassword,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("User berhasil ditambahkan!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Users',
            'user' => $this->users->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/users/edit', $data);
    }

    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'nama {field} harus diisi!',
                    'is_unique' => 'username {field} sudah ada!',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password minimal harus memiliki panjang 6 karakter!',
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi!',
                    'matches' => 'Konfirmasi password tidak cocok dengan password!',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/edit/' . $id)->withInput()->with('validation', $validation);
        }

        // verifikasi password
        $password = $this->request->getVar('password');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->users->save([
            'id_user' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $hashedPassword,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ]);

        // pesan data berhasil ditambah
        $isipesan = '<script> alert("User berhasil ditambahkan!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $this->users->delete($id);

        // pesan berhasil didelete
        $isipesan = '<script> alert("Data berhasil dihapus!") </script>';
        session()->setFlashdata('pesan', $isipesan);

        return redirect()->to('/users');
    }
}
