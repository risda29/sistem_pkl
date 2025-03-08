<?php

namespace App\Controllers;

use App\Models\M_Story;
use App\Models\M_Profil;
use App\Models\M_Interaktif;



class Kelasinteraktif_pengguna extends BaseController
{
    protected $session;
    protected $interaktifModel;

    public function __construct()
    {
        // Menginisialisasi session
        $this->session = \Config\Services::session();
        $this->interaktifModel = new M_Interaktif();
    }
    public function getStatus()
    {
        // To get statuses waiting for admin approval
        $waitingApproval = $this->interaktifModel->getInteraktifStatus('menunggu setujui admin');

        // To get statuses waiting for rejection
        $waitingRejection = $this->interaktifModel->getInteraktifStatus('menunggu tolak');

        // To get approved statuses
        $approved = $this->interaktifModel->getInteraktifStatus('setujui');

        // You can now pass these statuses to your view or handle them as needed
        return view('status_view', [
            'waitingApproval' => $waitingApproval,
            'waitingRejection' => $waitingRejection,
            'approved' => $approved
        ]);
    }

    public function index(): string
    {
        $model = new M_Interaktif();
        $data['interaktif'] = $model->getInteraktif();

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(session()->get('id_user')); // Mengambil data profil
        $data['user'] = $M_Profil->getDataProfil(session()->get('id_user')); // Mengambil data profil
        $data['jumlah_interaktif'] = $this->interaktifModel->jumlah_interaktif();
        return view('v_kelasinteraktif_pengguna', $data);
    }
}