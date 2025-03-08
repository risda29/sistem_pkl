<?php

namespace App\Controllers;

use App\Models\M_Kelas;
use App\Models\M_Story;
use App\Models\M_Interaktif;

class Home extends BaseController
{
    public function index() : string
    {
        $kelasModel = new M_Kelas();
        $storyModel = new M_Story();
        $interaktifModel = new M_Interaktif();

        $data = [
            'judul' => 'Home',
            'page'  => 'v_home',
            'kelas' => $kelasModel->getKelas(),
            'story' => $storyModel->getStory(),
            'interaktif' => $interaktifModel->getInteraktif(), // Mengirim data interaktif ke View
        ];

        return view('v_front_end', $data);
    }
}
