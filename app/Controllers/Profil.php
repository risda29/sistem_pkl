<?php

namespace App\Controllers;

use App\Models\M_Profil;

class Profil extends BaseController
{
    protected $M_Profil;

    public function __construct()
    {
        $this->M_Profil = new M_Profil();
    }
    public function index()
    {
        $data['userData'] = $this->M_Profil->getDataProfil(1);

        echo view('v_edit_profil', $data);
    }

    public function someControllerMethod()
    {
        $session = session();
        $userData = $session->get('userData');
        if (!$userData) {
            // Inisialisasi userData jika null
            $userData = [
                'username' => 'Guest',
                'email' => 'guest@example.com'
            ];
        }
        $data['userData'] = $userData;
        return view('template/sidebar', $data);
    }

    public function edit_profil()
    {
        $id = 1;
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $M_Profil = new M_Profil();

        $data = [];
        $alerts = [];

        if ($username !== '') {
            $data['username'] = $username;
            $alerts[] = 'Username telah diubah.';
        }

        if ($email !== '') {
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
            $M_Profil->updateDataProfil($id, $data);
            $alerts[] = 'Profil berhasil diperbarui.';
        } else {
            $alerts[] = 'Tidak ada perubahan pada profil.';
        }

        $session = session();

        $session->setFlashdata('alerts', $alerts);

        return redirect()->to('/Profil/index');
    }
    public function __destruct()
    {
        $this->M_Profil = null;
    }

}
