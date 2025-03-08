<?php

namespace App\Controllers;

use App\Models\M_Profil;

class Dashboard extends BaseController
{
    protected $M_Profil;

    public function __construct()
    {
        // Pastikan model profil ada untuk mengambil data profil pengguna
        $this->M_Profil = new M_Profil();
    }

    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = session()->get('user');  // Pastikan sesi sudah menyimpan data pengguna yang login

        // Ambil data lainnya yang diperlukan untuk dashboard
        $data['user'] = $user;

        // Mengambil jumlah kelas dan story terkait dengan user
        $data['kelas_count'] = $this->M_Profil->countKelasByUser($user['id_user']);  // Jumlah kelas untuk user tertentu
        $data['story_count'] = $this->M_Profil->countStoryByUser($user['id_user']);  // Jumlah story untuk user tertentu

        // Mengambil jumlah total kelas dan story secara keseluruhan
        $data['total_kelas'] = $this->M_Profil->countAllKelas();  // Total kelas di database
        $data['total_story'] = $this->M_Profil->countAllStory();  // Total story di database

        // Kirim data ke view dashboard
        return view('dashboard', $data);
    }
}
