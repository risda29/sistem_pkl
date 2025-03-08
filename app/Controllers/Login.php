<?php
namespace App\Controllers;

use App\Models\ModelLogin;


class Login extends BaseController
{

    public function register()
    {
        return view('v_register');
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (session()->get('id_user')) {
            return $this->redirectByRole(); // Fungsi untuk redirect berdasarkan role user
        }

        if ($this->request->getMethod() === 'post') {
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $recaptchaSecretKey = '6LcWqq8qAAAAAPoUNIF_bNRLaSi3_TSLh4aK0jE-';

            // Verifikasi reCAPTCHA
            if (!$this->verifyRecaptcha($recaptchaResponse, $recaptchaSecretKey)) {
                session()->setFlashdata('error', 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
                return redirect()->to(base_url('Login'));
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Inisialisasi model dan cari user berdasarkan username dan password
            $userModel = new ModelLogin();
            $user = $userModel->getUserByUsernameAndPassword($username, $password);

            if ($user !== null) {
                if (!isset($user['id_user'])) {
                    session()->setFlashdata('error', 'Terjadi kesalahan pada data user. Silakan hubungi admin.');
                    return redirect()->to(base_url('Login'));
                }

                // Cek apakah akun sudah disetujui oleh admin
                if ($user['status'] === 'Menunggu') {  // Sesuai dengan ENUM di database
                    session()->setFlashdata('error', 'Akun Anda masih menunggu.');
                    return redirect()->to(base_url('Login'));
                }

                // Simpan data user ke dalam session
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'leveluser' => $user['leveluser'],
                    'isLoggedIn' => true

                ]);

                session()->setFlashdata('loginSuccess', 'Login berhasil!');
                return $this->redirectByRole();
            } else {
                session()->setFlashdata('error', 'Username atau Password salah.');
                return redirect()->to(base_url('Login'));
            }

        }

        // Tampilkan halaman login jika belum ada request POST
        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Home'));
    }

    private function redirectByRole()
    {
        $role = session()->get('leveluser');
        if (!$role) {
            session()->destroy();
            return redirect()->to(base_url('Login'));
        }

        switch ($role) {
            case 'Admin':
                return redirect()->to(base_url('Admin'));
            case 'Pengguna':
                return redirect()->to(base_url('Pengguna'));
            default:
                session()->destroy();
                return redirect()->to(base_url('Login'));
        }
    }

    private function verifyRecaptcha($response, $secretKey)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $response
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $resultData = json_decode($result, true);
        return isset($resultData['success']) && $resultData['success'];
    }
}
