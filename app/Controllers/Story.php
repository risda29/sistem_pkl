<?php

namespace App\Controllers;

use App\Models\M_Story;
use App\Models\M_Kelas;
use App\Models\M_Profil;
use App\Models\M_Akun;
use App\Models\StatusBacaModel;


class Story extends BaseController
{
    protected $session;
    protected $statusBacaModel;


    public function __construct()
    {
        // Menginisialisasi session
        $this->session = \Config\Services::session();
        $this->statusBacaModel = new StatusBacaModel();
    }

    public function index(): string
    {
        $model = new M_story();
        $data['story'] = $model->getstory(); // Mengambil data story dari model.
        $M_Profil = new M_Profil();

        $session = session();
        $id_user = $session->get('id_user');
        $data['user'] = $id_user;

        $data['userData'] = $M_Profil->getDataProfil(1); // Mengambil data profil
        return view('v_data_story', $data);
    }

    public function proses_tambah_story()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'tanggal' => 'required',
            'artikel' => 'required',
            'youtube_link' => 'required|valid_url',
            'tugas_link' => 'required|valid_url|regex_match[/^https:\/\/docs\.google\.com\/forms\/d\/e\//]',
            'respon_link' => 'required|valid_url',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $gambar = $this->request->getFile('gambar');
            $namaGambar = $gambar->getRandomName();
            $gambar->move('foto', $namaGambar);
          

            // Data untuk di-insert ke database
            $data = [
                'id_story' => '',
                'judul' => $_POST['judul'],
                'tanggal' => $_POST['tanggal'],
                'link_tree' => $_POST['link_tree'],
                'artikel' => $_POST['artikel'],
                'youtube_link' => $_POST['youtube_link'],
                'gambar' => $namaGambar,
                'tugas_link' => $this->request->getPost('tugas_link'),
                'respon_link' => $this->request->getPost('respon_link')
            ];

            $storyModel = new M_story();
            $storyModel->proses_tambah_story($data);

            session()->setFlashdata('message', 'story berhasil ditambah');
            return redirect()->to(base_url('story/index'));
        } else {
            return view('v_data_story', ['validation' => $validation]);
        }
    }

    public function hapus($id_story)
    {
        $model = new M_story();
        $story = $model->getstory($id_story);

        if (empty($story)) {
            session()->setFlashdata('error', 'Story tidak ditemukan.');
            return redirect()->to(base_url('story/index'));
        }

        if ($story['gambar'] && file_exists('foto/' . $story['gambar'])) {
            unlink('foto/' . $story['gambar']); // Hapus file gambar
        }

        $model->hapus_story($id_story);
        // session()->setFlashdata('success', 'Story berhasil dihapus.');
        session()->setFlashdata('message', 'Story berhasil di Hapus');
        return redirect()->to(base_url('story/index'));
    }

    public function edit($id_story)
    {
        $model = new M_story();
        $data['story'] = $model->getstory($id_story);

        // if (empty($data['story'])) {
        //     session()->setFlashdata('error', 'Story tidak ditemukan.');
        //     return redirect()->to(base_url('story/index'));
        // }
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit Story');
            return redirect()->to(base_url('Story/index'));
        }

        return view('v_edit_story', $data);
    }


    public function update($id_story)
    {
        $model = new M_story();
        $story = $model->getstory($id_story);

        // Periksa jika pengguna adalah Admin
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit Story');
            return redirect()->to(base_url('Story/index'));
        }

        // Ambil data dari form
        $data = [
            'judul' => $this->request->getPost('judul'),
            'tanggal' => $this->request->getPost('tanggal'),
            'link_tree' => $this->request->getPost('link_tree'),
            'artikel' => $this->request->getPost('artikel'),
            'youtube_link' => $this->request->getPost('youtube_link'),
            'tugas_link' => $this->request->getPost('tugas_link'),
            'respon_link' => $this->request->getPost('respon_link')
        ];

        // Cek jika ada file gambar yang diupload
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($story['gambar'] && file_exists('foto/' . $story['gambar'])) {
                unlink('foto/' . $story['gambar']); // Hapus gambar lama
            }

            // Simpan gambar baru
            $gambar->move('foto');
            $data['gambar'] = $gambar->getName(); // Simpan nama gambar baru
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru
            $data['gambar'] = $story['gambar'];
        }

        // Update story di database
        $model->update_story($id_story, $data);

        session()->setFlashdata('success', 'Story berhasil diperbarui.');
        return redirect()->to(base_url('story/index'));
    }





    public function update_story($id_story)
    {
        // Cek jika pengguna adalah admin
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit kelas');
            return redirect()->to(base_url('Story/index'));
        }

        $model = new M_story();
        $story = $model->getstory($id_story);

        if (empty($story)) {
            session()->setFlashdata('message', 'Story tidak ditemukan');
            return redirect()->to(base_url('story/index'));
        }

        // Data untuk diupdate
        $data = [
            'id_story' => $id_story,
            'judul' => $this->request->getPost('judul'),
            'tanggal' => $this->request->getPost('tanggal'),
            'link_tree' => $this->request->getPost('link_tree'),
            'artikel' => $this->request->getPost('artikel'),
            'youtube_link' => $this->request->getPost('youtube_link'),
            'tugas_link' => $this->request->getPost('tugas_link'),
            'respon_link' => $this->request->getPost('respon_link'),
        ];

        // Cek jika ada file gambar yang diupload
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama jika ada
            if (!empty($story['gambar']) && file_exists('foto/' . $story['gambar'])) {
                unlink('foto/' . $story['gambar']);
            }

            // Simpan gambar baru
            $gambar->move('foto');
            $data['gambar'] = $gambar->getName(); // Menyimpan nama gambar baru
        } else {
            $data['gambar'] = $story['gambar']; // Menggunakan gambar lama jika tidak ada gambar baru
        }

       

        // Update story di database
        $model->update_story($data);

        session()->setFlashdata('message', 'Story berhasil diupdate');
        return redirect()->to(base_url('story/index'));
    }



    public function tampilstory(): string
    {
        // $model = new M_Data();
        // $data['data'] = $model->getData();
     
        $model = new M_Story();
        $data['story'] = $model->getStory();
        

        $data = [
            'judul' => 'Visi Misi',
            'page' => 'v_halaman_story',
            // 'data' => $data['data'],
            'story' => $data['story'],
          
        ];
        return view('v_front_end', $data);
    
    }
    // Method untuk memperbarui status baca ketika tombol "Selesai Baca" ditekan
    public function selesaiBaca($idStory)
    {
        $idUser = session()->get('id_user'); // Ambil id_user dari session

        $this->statusBacaModel->updateStatusBaca([
            'id_user' => $idUser,
            'id_story' => $idStory,
        ]);

        return redirect()->back()->with('message', 'Status baca berhasil diperbarui');
    }
    
    public function detail($id_story)
    {
        $model = new M_Story();
        $data['story'] = $model->getStoryById($id_story); // Menggunakan method dari model


        $modelKelas= new M_Kelas();
        $data['kelas'] = $modelKelas->getKelas();
        // Data yang akan disertakan dalam view
        $viewData = [
            'judul' => 'Detail Story',
            'page' => 'v_detail_story_pilihan',
            'kelas' => $data['kelas'],
            'story' => $data['story'],
        ];
    
        $data = array_merge($data, $viewData);
        return view('v_front_end', $viewData);
    }
}    
