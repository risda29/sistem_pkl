<?php

namespace App\Controllers;

use App\Models\M_Kelas;
use App\Models\M_Profil;
use App\Models\M_Akun;
use App\Models\M_Story;
use App\Models\M_Interaktif;
use App\Models\SurveyModel;

class Pengguna extends BaseController
{
    protected $kelasModel;
    protected $profilModel;
    protected $akunModel;
    protected $storyModel;
    protected $interaktifModel;
    // protected $surveyModel;

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Inisialisasi koneksi database
        $this->kelasModel = new M_Kelas();
        $this->profilModel = new M_Profil();
        $this->akunModel = new M_Akun();
        $this->storyModel = new M_Story();
        $this->interaktifModel = new M_Interaktif();
    }
    // public function dashboard()
    // {
    //     $userId = session()->get('id_user'); // Ambil ID pengguna yang sedang login

    //     $kelasInteraktif = $this->db->table('kelas_interaktif_pengguna')
    //         ->where('id_user', $userId)
    //         ->countAllResults(); // Hitung jumlah kelas yang diikuti pengguna

    //     $data = [
    //         'jumlah_interaktif' => $kelasInteraktif, // Kirim data ke view
    //     ];

    //     return view('v_home_pengguna', $data)
    //         . view('v_kelas_interaktif', $data)
    //         . view('v_kelas_pengguna', $data);
    // }
    public function index(): string
    {

        $session = session();
        $id_user = $session->get('id_user');

        $user = $this->akunModel->where('id_user', $id_user)->first();
        if (!$user) {
            return redirect()->to('/logout')->with('error', 'User tidak ditemukan.');
        }

        $showKelasInteraktif = ($user['ikutikelas'] === 'ya' && $user['ikutikelas'] === 'ya');

        $data = [
            'data' => $this->kelasModel->getKelas(),
            'userData' => $this->profilModel->getDataProfil($id_user),
            'user' => $this->profilModel->getDataProfil($id_user),
            'jumlah_pengguna' => $this->akunModel->jumlah_pengguna(),
            'jumlah_interaktif' => $this->interaktifModel->jumlah_interaktif(), // <-- Pastikan ini ada
            'jumlah_kelas' => $this->kelasModel->jumlah_kelas(),
            'jumlah_story' => $this->storyModel->jumlah_story(),
            'showKelasInteraktif' => $showKelasInteraktif


        ];

        return view('v_home_pengguna', $data) // Kirim data ke v_home_pengguna
            . view('template/sidebar_pengguna', $data)
            . view('v_kelas_pengguna', $data); // Kirim data ke sidebar_pengguna
    }
}
