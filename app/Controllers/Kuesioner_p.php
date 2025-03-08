<?php

namespace App\Controllers;

use App\Models\M_Kuesioner;
use App\Models\M_Respon;
use App\Models\M_Profil;
use App\Models\M_Akun;

class Kuesioner_p extends BaseController
{
    public function tampilKuesionerPengguna()
    {
        $M_Profil = new M_Profil();
        $M_Kuesioner = new M_Kuesioner();
        $M_Respon = new M_Respon();
        $M_User = new M_Akun();

        $id_user = session('id_user');
        $user = $M_User->find($id_user);
        $hasFilled = $M_Respon->where('id_user', $id_user)->countAllResults() > 0;

        return view('v_kuesioner_p', [
            'user' => $M_Profil->getDataProfil($id_user),
            'kuesioner' => $M_Kuesioner->findAll(),
            'hasFilled' => $hasFilled
        ]);
    }

    public function simpanJawaban()
    {
        $responModel = new M_Respon();
        $id_user = session()->get('id_user');

        // Cek apakah user sudah mengisi kuesioner
        if ($responModel->sudahMengisi($id_user)) {
            return redirect()->back()->with('message', 'Anda sudah mengisi kuesioner sebelumnya.');
        }

        $jawabanData = $this->request->getPost('jawaban');
        if (!empty($jawabanData) && is_array($jawabanData)) {
            $insertData = [];
            foreach ($jawabanData as $id_kuesioner => $jawaban) {
                if (!empty(trim($jawaban))) {
                    $insertData[] = [
                        'id_kuesioner' => $id_kuesioner,
                        'id_user' => $id_user,
                        'point' => $jawaban,
                    ];
                }
            }
            if (!empty($insertData)) {
                $responModel->insertBatch($insertData);
                return redirect()->back()->with('message', 'Terima kasih telah mengisi kuesioner!');
            }
        }
        return redirect()->back()->with('message', 'Harap isi semua pertanyaan!');
    }
}
