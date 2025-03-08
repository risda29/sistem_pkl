<?php

namespace App\Controllers;

use App\Models\{M_Akun, M_Kuesioner, M_Profil, M_Respon};
use CodeIgniter\Controller;

class Kuesioner extends BaseController
{
    public function index()
    {
        $M_Profil = new M_Profil();
        $M_Kuesioner = new M_Kuesioner();
        $M_User = new M_Akun();
        $M_Respon = new M_Respon();

        $id_user = session('id_user');
        $user = $M_User->find($id_user);
        $sudahMengisi = $M_Respon->sudahMengisi($id_user);

        // Ambil data statistik dari database
        $statistik = [];
        foreach ($M_Respon->getJawabanStatistik() as $data) {
            $statistik[$data['id_kuesioner']][$data['point']] = $data['jumlah'];
        }

        if ($user['leveluser'] == 'Pengguna') {
            return view('v_kuesioner_p', [
                'user' => $M_Profil->getDataProfil(1),
                'kuesioner' => $M_Kuesioner->findAll(),
                'sudahMengisi' => $sudahMengisi,
            ]);
        } else {
            return view('v_kuesioner', [
                'user' => $M_Profil->getDataProfil(1),
                'kuesioner' => $M_Kuesioner->findAll(),
                'statistik' => $statistik, // Kirim data statistik ke view
            ]);
        }
    }


    public function tambah()
    {
        $M_Kuesioner = new M_Kuesioner();
        $M_Kuesioner->insert([
            'pertanyaan' => $this->request->getPost('pertanyaan')
        ]);

        session()->setFlashdata('success', 'Pertanyaan berhasil ditambahkan.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $M_Kuesioner = new M_Kuesioner();
        $M_Kuesioner->update($id, [
            'pertanyaan' => $this->request->getPost('pertanyaan')
        ]);

        session()->setFlashdata('success', 'Pertanyaan berhasil diperbarui.');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $M_Kuesioner = new M_Kuesioner();
        $M_Kuesioner->delete($id);

        session()->setFlashdata('success', 'Pertanyaan berhasil dihapus.');
        return redirect()->back();
    }
}
