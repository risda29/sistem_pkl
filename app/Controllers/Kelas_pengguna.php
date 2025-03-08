<?php

namespace App\Controllers;

use App\Models\M_Kelas;
use App\Models\M_Profil;
use App\Models\M_Story;
use App\Models\StatusBacaModel;

class Kelas_pengguna extends BaseController
{
    protected $session;

    protected $statusBacaModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->statusBacaModel = new StatusBacaModel();
    }

    public function index(): string
    {
        $model = new M_Kelas();
        $data['kelas'] = $model->getKelas();

        $M_Profil = new M_Profil();
        $data['user'] = $M_Profil->getDataProfil(1);
        

        return view('v_kelas_pengguna', $data);
    }

    public function selesaiBaca($idKelas)
    {
        $idUser = session()->get('id_user'); // Ambil id_user dari session

        $this->statusBacaModel->updateStatusBacaKelas([
            'id_user' => $idUser,
            'id_kelas' => $idKelas,
        ]);

        return redirect()->back()->with('message', 'Status baca berhasil diperbarui');
    }

}