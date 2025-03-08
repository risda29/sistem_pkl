<?php

namespace App\Controllers;

use App\Models\M_Profil;
use App\Models\M_Akun;
class Profil_Pengguna extends BaseController
{
    protected $M_Profil;
    protected $M_Akun;

    public function __construct()
    {
        $this->M_Profil = new M_Profil();
        $this->M_Akun = new M_Akun();
    }

    public function index()
    {
        $data = [
            'userData' => $this->M_Profil->getDataProfil(1),
            'user' => $this->M_Profil->getDataProfil(1),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'instansi' => $this->request->getPost('instansi'),
            'bidang' => $this->request->getPost('bidang'),
            'ikutikelas' => $this->request->getPost('ikutikelas'),
            'manfaat' => $this->request->getPost('manfaat'),
        ];

        echo view('v_edit_profil_pengguna', $data);
    }

    public function edit_profil_pengguna()
    {
        $id = 1;
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userData = $this->M_Akun->getDataAkun($id) ?? [];
        if (empty($userData)) {
            $userData = [
                'username' => '',
                'email' => '',
                'password' => ''
            ];
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'instansi' => $this->request->getPost('instansi'),
            'bidang' => $this->request->getPost('bidang'),
            'ikutikelas' => $this->request->getPost('ikutikelas'),
            'manfaat' => $this->request->getPost('manfaat'),
        ];
        $alerts = [];

        if ($username !== '' && isset($userData['username']) && $username !== $userData['username']) {
            $data['username'] = $username;
            $alerts[] = 'Username telah diubah.';
        }

        if ($email !== '' && isset($userData['email']) && $email !== $userData['email']) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailDomain = explode('@', $email);
                if ($emailDomain[1] === 'gmail.com') {
                    $data['email'] = $email;
                    $alerts[] = 'Email telah diubah.';
                } else {
                    $alerts[] = 'Email harus menggunakan domain gmail.com.';
                }
            } else {
                $alerts[] = 'Format email tidak valid.';
            }
        }

        if ($password !== '') {
            if (strlen($password) >= 5) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $data['password'] = $hashedPassword;
                $alerts[] = 'Password telah diubah.';
            } else {
                $alerts[] = 'Password harus terdiri dari minimal 5 karakter.';
            }
        }

        if (!empty($data)) {
            $this->M_Akun->updateDataAkun($id, $data);
            $alerts[] = 'Profil berhasil diperbarui.';
        } else {
            $alerts[] = 'Tidak ada perubahan pada profil.';
        }

        $session = session();
        $session->setFlashdata('alerts', $alerts);

        return redirect()->to('/Profil_Pengguna/index');
    }

    public function __destruct()
    {
        $this->M_Profil = null;
        $this->M_Akun = null;
    }
}
