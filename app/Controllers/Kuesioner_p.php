<?php
namespace App\Controllers;

use App\Models\M_Kuesioner;
use App\Models\ResponseModel;
use App\Models\M_Profil;
use App\Models\M_Akun;

class Kuesioner_p extends BaseController
{
    public function tampilKuesionerPengguna()
    {
        $M_Profil = new M_Profil();
        $M_Kuesioner = new M_Kuesioner();

        $M_User = new M_Akun();
        $user = $M_User->find(session('id_user'));

        if ($user['leveluser'] == 'Pengguna') {
            return view('v_kuesioner_p', [
                'user' => $M_Profil->getDataProfil(1),
                'kuesioner' => $M_Kuesioner->findAll(),
            ]);


        } else {
            return view('v_kuesioner', [
                'user' => $M_Profil->getDataProfil(1),
                'kuesioner' => $M_Kuesioner->findAll(),
            ]);
        }
    }

    public function simpanJawaban()
    {
        $responModel = new ResponseModel();
        $id_kuesioner = $this->request->getPost('id_kuesioner');
        $id_user = session()->get('id_user');
        $jawabanData = $this->request->getPost('jawaban');

        if (!empty($jawabanData) && is_array($jawabanData)) {
            $insertData = [];

            foreach ($jawabanData as $id_kuesioner => $jawaban) {
                if (!empty(trim($jawaban))) {
                    $insertData[] = [
                        'id_kuesioner' => $id_kuesioner,
                        'id_user' => $id_user,
                        'point ' => $jawaban,
                    ];
                }
            }

            if (!empty($insertData)) {
                $responModel->insertBatch($insertData); // Insert banyak data sekaligus
                session()->setFlashdata('message', 'terimakasiii telah menjawab');
                return redirect()->back();
            } else {
                session()->setFlashdata('message', 'Jawaban tidak valid');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('message', 'Harap isi jawabann');
            return redirect()->back();
        }
    }
}
