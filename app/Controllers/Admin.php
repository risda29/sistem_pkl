<?php

namespace App\Controllers;

use App\Models\M_Kelas;
use App\Models\M_Profil;
use App\Models\M_Akun;
use App\Models\M_Story;

class Admin extends BaseController
{
    public function index(): string
    {
        $kelas = new M_Kelas();
        $M_Profil = new M_Profil();
        $M_Akun = new M_Akun();
        $M_Kelas = new M_Kelas();
        $M_Story = new M_Story();

        $data = [
            'data' => $kelas->getKelas(),
            'userData' => $M_Profil->getDataProfil(1),
            'jumlah_pengguna' => $M_Akun->jumlah_pengguna(), // tambahkan koma di sini 
            'jumlah_kelas' => $M_Kelas->jumlah_kelas(),
            'jumlah_story' => $M_Story->jumlah_story()
        ];

        return view('v_back_end', $data);


    }
}