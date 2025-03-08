<?php

namespace App\Controllers;

use App\Models\M_VisiMisi;
use App\Models\M_Profil;
use App\Models\M_Kelas;
use App\Models\M_Story;


// Abstract Class
abstract class AbstractVisiMisiController extends BaseController
{
    // Abstract Method
    abstract protected function performUpdate($dataToUpdate);
}

class VisiMisi extends AbstractVisiMisiController
{
    public function index()
    {
        $model = new M_VisiMisi();
        $data['visiData'] = $model->getVisiMisi(1);

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(1);

        return view('v_visi_misi', $data);
    }

    public function tampilvisimisi(): string
    {
        $model = new M_Kelas();
        $data['kelas'] = $model->getKelas();
        $model = new M_Story();
        $data['story'] = $model->getStory();
        $model = new M_VisiMisi();
        $data['visiData'] = $model->getVisiMisi(1);

        $data = [
            'judul' => 'Visi Misi',
            'page'  => 'v_halaman_visi_misi',
            'kelas' => $data['kelas'],
            'story' => $data['story'],
            'visiData' => $data['visiData'],
        ];
        return view('v_front_end', $data);
    }

    public function updateVisiMisi()
    {
        $model = new M_VisiMisi();

        // Ambil data visi dan misi dari formulir
        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');

        // Pastikan bahwa data yang akan diupdate tidak kosong
        if (!empty($visi) || !empty($misi)) {
            // Data yang ingin diupdate
            $dataToUpdate = [];

            // Tambahkan data visi jika ada
            if (!empty($visi)) {
                $dataToUpdate['visi'] = $visi;
            }

            if (!empty($misi)) {
                $dataToUpdate['misi'] = $misi;
            }

            // Update data visi dan misi
            $this->performUpdate($dataToUpdate);

            session()->setFlashdata('success', 'Data visi dan misi berhasil diupdate.');

            return redirect()->to(base_url('VisiMisi/index'));
        } else {
            session()->setFlashdata('success', 'Tidak ada perubahan pada data visi dan misi.');

            return redirect()->to(base_url('VisiMisi/index'));
        }
    }

    // Implementasi Abstract Method
    protected function performUpdate($dataToUpdate)
    {
        $model = new M_VisiMisi();
        $model->updateVisiMisi($dataToUpdate);
    }
}
