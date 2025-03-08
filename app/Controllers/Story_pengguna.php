<?php

namespace App\Controllers;

use App\Models\M_Story;
use App\Models\M_Profil;
use App\Models\M_Kelas;




class Story_pengguna extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Menginisialisasi session
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $model = new M_story();
        $data['story'] = $model->getstory(); // Mengambil data story dari model.

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(1); // Mengambil data profil
        $data['user'] = $M_Profil->getDataProfil(1); // Mengambil data profil

        return view('v_story_pengguna', $data);
    }
}