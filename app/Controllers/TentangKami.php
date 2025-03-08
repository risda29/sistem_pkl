<?php

namespace App\Controllers;

use App\Models\M_TentangKami;
use App\Models\M_Profil;


class TentangKami extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Menginisialisasi session
        $this->session = \Config\Services::session();
    }

    public function index(): string 
    {
        $model = new M_karya();
        $data['karya'] = $model->getkarya(); // Mengambil data karya dari model.

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(1); // Mengambil data profil

        return view('v_data_karya', $data);
    }

    public function proses_tambah_karya()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'tanggal' => 'required',
            'youtube_link' => 'required|valid_url',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Data untuk di-insert ke database
            $data = [
                'id_karya' => '',
                'judul' => $this->request->getPost('judul'),
                'tanggal' => $this->request->getPost('tanggal'),
                'youtube_link' => $this->request->getPost('youtube_link'),
            ];

            $karyaModel = new M_Karya();
            $karyaModel->proses_tambah_karya($data);

            session()->setFlashdata('message', 'Karya Kami berhasil ditambahkan.');
            return redirect()->to(base_url('karya/index'));
        } else {
            return view('v_data_karya', ['validation' => $validation]);
        }
    }



    public function hapus_karya($id_karya)
    {
        $model = new M_karya();
        $karya = $model->getkarya($id_karya);
    
        if (empty($karya)) {
            session()->setFlashdata('error', 'Karya tidak ditemukan.');
            return redirect()->to(base_url('karya/index'));
        }
    
        // Proses penghapusan karya
        $hapus = $model->hapus_karya($id_karya);
    
        // Validasi setelah penghapusan
        if ($hapus) {
            session()->setFlashdata('success', 'Karya Kami berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus karya.');
        }
        session()->setFlashdata('message', 'Karya berhasil diupdate');
    
        return redirect()->to(base_url('karya/index'));
    }

    public function update($id_karya)
    {
        // Cek jika pengguna adalah admin
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit Karya');
            return redirect()->to(base_url('Karya/index'));
        }

        $model = new M_karya();
        $data['karya'] = $model->getkarya($id_karya);
        return view('v_edit_karya', $data); // Ubah view menjadi v_edit_karya agar bisa edit
    }

    public function update_karya($id_karya)
{
    
    // Cek jika pengguna adalah admin
    if ($this->session->get('leveluser') !== 'Admin') {
        session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit Karya');
        return redirect()->to(base_url('Karya/index'));
    }

    $model = new M_karya();
    $karya = $model->getkarya($id_karya);

    if (empty($karya)) {
        session()->setFlashdata('message', 'karya tidak ditemukan');
        return redirect()->to(base_url('karya/index'));
    }

    $data = [
        'id_karya' => $id_karya,
        'judul' => $this->request->getPost('judul'),
        'tanggal' => $this->request->getPost('tanggal'),
        // 'artikel' => $this->request->getPost('artikel'),
        'youtube_link' => $this->request->getPost('youtube_link'),
    ];

    $model->update_karya($data);

    session()->setFlashdata('message', 'karya kami berhasil diupdate');
    return redirect()->to(base_url('karya/index'));
}

public function tampilkarya(): string
{
   
    $model = new M_Karya();
    $data['karya'] = $model->getKarya();
  
    $data = [
        'judul' => 'Visi Misi',
        'page'  => 'v_halaman_karya',
        // 'data' => $data['data'],
        'karya' => $data['karya'],
       
    ];
    return view('v_front_end', $data);
}
    public function detail($id_karya)
    {
        $model = new M_karya();
        $data['karya'] = $model->getkaryaById($id_karya);

    

        $viewData = [
            'judul' => 'Detail karya',
            'page' => 'v_detail_karya_pilihan',
            'karya' => $data['karya'],
          
        ];

        $data = array_merge($data, $viewData);

        return view('v_front_end', $data);}
}
