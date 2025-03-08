<?php

namespace App\Controllers;

use App\Models\M_Register;
use App\Models\M_Akun;
use App\Models\ModelLogin;

class Akun extends BaseController
{
    public function index()
    {
        $page = $this->request->getGet('page');

        if ($page === 'register') {
            return view('v_register');
        } elseif ($page === 'lupa_password') {
            return view('v_lupa_password');
        }

        return view('v_register');
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

    public function register()
    {
        $ModelLogin = new ModelLogin();
    
        // Ambil data input dari form
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email'    => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon'    => $this->request->getPost('telepon'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'instansi' => $this->request->getPost('instansi'),
            'bidang' => $this->request->getPost('bidang'),
            'ikutikelas'    => $this->request->getPost('ikutikelas'),
            'manfaat' => $this->request->getPost('manfaat'),
        ];
    
        // Validasi data
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[100]|is_unique[user.username]',
            'email'    => 'required|valid_email|is_unique[user.email]',
            'telepon'  => 'required|numeric|is_unique[user.telepon]',
            'password' => 'required|min_length[5]|max_length[255]',
        ])) {
            dd($this->validator->getErrors());
            // Tampilkan error dan kembalikan input yang sudah dimasukkan
            return redirect()->back()->withInput()->with('error', 'Ada kesalahan pada input data.')
                ->with('validation', $this->validator);  // Pastikan data validator dikirim ke view
        }
    
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Data yang akan disimpan ke tabel
        $insertData = [
            'username'   => $data['username'],
            'password'   => $hashedPassword,
            'email'      => $data['email'],
            'telepon'    => $data['telepon'],
            'nama'       => $data['nama'],
            'ttl' => date('Y-m-d'),
            'alamat'     => $data['alamat'],
            'kabupaten'  => $data['kabupaten'],
            'provinsi'   => $data['provinsi'],
            'pekerjaan'  => $data['pekerjaan'],
            'instansi'   => $data['instansi'],
            'bidang'     => $data['bidang'],
            'ikutikelas' => $data['ikutikelas'],
            'manfaat'    => $data['manfaat'],
            'leveluser'  => 'pengguna',  // Anda bisa mengganti sesuai dengan kebutuhan
            'create_at'  => date('Y-m-d H:i:s'),  // Waktu saat pendaftaran
            'update_at'  => date('Y-m-d H:i:s'),  // Waktu saat pendaftaran (seharusnya sama)
        ];
    
        // Cek apakah data berhasil disimpan
        if ($ModelLogin->insert($insertData)) {
            // Redirect ke halaman login setelah berhasil
            return redirect()->to(base_url('Login'))->with('success', 'Selamat Pendaftaran Berhasil! Terimakasih telah menjadi bagian dari Data Storyteller Indonesia. Untuk pendaftaran kelas interaktif akan dikonfirmasikan ke calon peserta melalui Nomer Whatsapp masing-masing.');
        } else {
            // Jika gagal, tampilkan error
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }
    
    

    public function resetPassword()
    {
        $M_Akun = new M_Akun();

        $emailAddress = $this->request->getPost('email');
        $user = $M_Akun->where('email', $emailAddress)->first();

        if ($user) {
            $current_time = time();

            if ($user['token_expiry'] < $current_time) {
                $token = bin2hex(random_bytes(3)); // Generate token reset password
                $expiry = $current_time + 300; // Set expiration time to 50 seconds from now

                $M_Akun->where('email', $emailAddress)->set(['reset_token' => $token, 'token_expiry' => $expiry])->update();

                // Simpan email ke dalam session sebelum redirect
                session()->set('emailForReset', $emailAddress);

                $email = \Config\Services::email();
                $email->setFrom('webelearning@gmail.com', 'Token Reset Password');
                $email->setTo($emailAddress);
                $email->setSubject('Reset Password');
                // Tambahkan informasi bahwa token reset berlaku selama 50 detik
                $message = 'Token reset password Anda: ' . $token . '. Token ini berlaku selama 5 menit.';
                $email->setMessage($message);

                if ($email->send()) {
                    $Userdata = [
                        'email' => $emailAddress,
                        'resetToken' => $token,
                    ];
                    return view('v_edit_password', $Userdata);
                } else {
                    // Log email errors
                    log_message('error', $email->printDebugger(['headers']));
                    return redirect()->to(site_url('Akun/index'))->with('error', 'Gagal mengirim email. Silakan coba lagi.');
                }
            } else {
                return redirect()->to(site_url('Akun/index'))->with('error', 'Token reset masih aktif.');
            }
        } else {
            return redirect()->to(site_url('Akun/index'))->with('error', 'Email tidak ditemukan.');
        }
    }

    // Fungsi untuk update password
    public function updatePassword()
    {
        $M_Akun = new M_Akun();

        $email = session()->get('emailForReset');
        $resetToken = $this->request->getPost('resetToken');
        $password = $this->request->getPost('password');

        $user = $M_Akun->where('email', $email)->first();

        if ($user && $user['reset_token'] === $resetToken) {
            $tokenExpiry = $user['token_expiry'];
            $currentTime = time();

            if ($currentTime <= $tokenExpiry) {
                $confirmPassword = $this->request->getPost('confirmPassword');

                if ($password === $confirmPassword) {
                    // Validasi panjang password minimal 5 karakter
                    if (strlen($password) >= 5) {
                        // Validasi apakah password mengandung spasi
                        if (strpos($password, ' ') === false) {
                            // Hash password baru sebelum disimpan
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                            // Jika password berhasil diubah, set reset_token dan token_expiry ke null
                            $M_Akun->where('email', $email)->set([
                                'password' => $hashedPassword,
                                'reset_token' => null,
                                'token_expiry' => null // Sesuaikan dengan kolom yang sesuai pada tabel basis data
                            ])->update();

                            return redirect()->to(base_url('Login'))->with('success', 'Password berhasil diubah. Silakan login.');
                        } else {
                            $data['email'] = $email;
                            $data['error'] = 'Password tidak boleh mengandung spasi.';
                            return view('v_edit_password', $data);
                        }
                    } else {
                        $data['email'] = $email;
                        $data['error'] = 'Password harus memiliki minimal 5 karakter.';
                        return view('v_edit_password', $data);
                    }
                } else {
                    $data['email'] = $email;
                    $data['error'] = 'Konfirmasi password tidak sesuai.';
                    return view('v_edit_password', $data);
                }
            } else {
                $data['email'] = $email;
                $data['error'] = 'Token reset sudah kadaluarsa. Silakan minta reset token kembali.';
                return view('v_edit_password', $data);
            }
        } else {
            $data['email'] = $email;
            $data['error'] = 'Token reset tidak valid.';
            return view('v_edit_password', $data);
        }
    }

    // Fungsi untuk mengirim ulang token
    public function kirimUlangToken()
    {
        $emailAddress = session()->get('emailForReset');

        if ($emailAddress) {
            $M_Akun = new M_Akun();
            $user = $M_Akun->where('email', $emailAddress)->first();

            if ($user) {
                $current_time = time();

                if ($user['token_expiry'] < $current_time) {
                    $token = bin2hex(random_bytes(3)); // Generate new reset password token
                    $expiry = $current_time + 50; // Set expiration time to 50 seconds from now

                    $M_Akun->set(['reset_token' => $token, 'token_expiry' => $expiry])
                        ->where('email', $emailAddress)
                        ->update();

                    $email = \Config\Services::email();
                    $email->setFrom('webdesabatibati@gmail.com', 'Token Reset Password');
                    $email->setTo($emailAddress);
                    $email->setSubject('Reset Password');

                    // Contoh isi pesan email
                    $message = 'Token reset password baru Anda: ' . $token . '. Token ini berlaku selama 50 detik.';
                    $email->setMessage($message);

                    // Kirim email
                    if ($email->send()) {
                        $data = [
                            'email' => $emailAddress,
                            'resetToken' => $token,
                        ];
                        return view('v_edit_password', $data);
                    } else {
                        $data['email'] = $emailAddress;
                        $data['error'] = 'Gagal mengirim ulang email.';
                        return view('v_edit_password', $data);
                    }
                } else {
                    $data['email'] = $emailAddress;
                    $data['error'] = 'Token reset masih aktif.';
                    return view('v_edit_password', $data);
                }
            } else {
                $data['email'] = $emailAddress;
                $data['error'] = 'Email tidak ditemukan.';
                return view('v_edit_password', $data);
            }
        }
    }
}