<?php

namespace App\Controllers;

use App\Models\M_Kelas;
use App\Models\M_Profil;
use App\Models\M_Akun;
use App\Models\M_Story;
use App\Models\StatusBacaModel;

class Kelas extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $model = new M_Kelas();
        $data['kelas'] = $model->getKelas();

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(1);

        return view('v_kelas', $data);
    }
 
       public function proses_tambah_kelas()
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
                'id_kelas' => '',
                'judul' => $_POST['judul'],
                'tanggal' => $_POST['tanggal'],
                'link_tree' => $_POST['link_tree'],
                'artikel' => $_POST['artikel'],
                'youtube_link' => $_POST['youtube_link'],
                'gambar' => $namaGambar,
                'tugas_link' => $this->request->getPost('tugas_link'),
                'respon_link' => $this->request->getPost('respon_link')
            ];
    
            $kelasModel = new M_kelas();
            $kelasModel->proses_tambah_kelas($data);
    
            session()->setFlashdata('message', 'kelas berhasil ditambah');
                return redirect()->back();
        } else {
            return view('v_kelas', ['validation' => $validation]);
        }
    }
    
    

    public function update($id_kelas): RedirectResponse|string
    {

        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit kelas');
            return redirect()->to(base_url('Kelas/index'));
        }

        $model = new M_Kelas();
        $data['kelas'] = $model->getKelas($id_kelas);
        return view('v_edit_kelas', $data);
    }

    public function update_kelas($id_kelas)
    {
        // Cek jika pengguna adalah admin
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit kelas');
            return redirect()->to(base_url('Kelas/index'));
        }
    
        $model = new M_kelas();
        $kelas = $model->getkelas($id_kelas);
    
        if (empty($kelas)) {
            session()->setFlashdata('message', 'kelas tidak ditemukan');
            return redirect()->to(base_url('kelas/index'));
        }
    
        // Data untuk diupdate
        $data = [
            'id_kelas' => $id_kelas,
            'judul' => $this->request->getPost('judul'),
            'tanggal' => $this->request->getPost('tanggal'),
            'artikel' => $this->request->getPost('artikel'),
            'youtube_link' => $this->request->getPost('youtube_link'),
            'link_tree' => $_POST['link_tree'],
            'tugas' => $this->request->getPost('tugas'),
            'respon_link' => $this->request->getPost('respon_link'),
        ];
    
        // Cek jika ada file gambar yang diupload
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama jika ada
            if (!empty($kelas['gambar']) && file_exists('foto/' . $kelas['gambar'])) {
                unlink('foto/' . $kelas['gambar']);
            }
    
            // Simpan gambar baru
            $gambar->move('foto');
            $data['gambar'] = $gambar->getName(); // Menyimpan nama gambar baru
        } else {
            $data['gambar'] = $kelas['gambar']; // Menggunakan gambar lama jika tidak ada gambar baru
        }
    
    
    
        // Update kelas di database
        $model->update_kelas($data);
    
        session()->setFlashdata('message', 'kelas berhasil diupdate');
        return redirect()->back();

    }
    

    public function tampilkelas(): string
    {
     
        $model = new M_Kelas();
        $data['kelas'] = $model->getKelas();

    

        $data['judul'] = 'Kelas Data';
        $data['page'] = 'v_halaman_kelas';

        return view('v_front_end', $data);
    }

    public function detail($id_kelas)
    {
        $model = new M_Kelas();
        $data['kelas'] = $model->getKelasById($id_kelas); // Menggunakan method dari model


        $modelStory = new M_Story();
        $data['story'] = $modelStory->getStory();

        // Data yang akan disertakan dalam view
        $viewData = [
            'judul' => 'Detail Kelas',
            'page' => 'v_detail_kelas_pilihan',
            'kelas' => $data['kelas'],
            'story' => $data['story'],
           
        ];

        $data = array_merge($data, $viewData);

        return view('v_front_end', $data);
}



    public function hapus_kelas($id_kelas)
    {
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk mengedit kelas');
            return redirect()->to(base_url('Kelas/index'));
        }

        $model = new M_Kelas();
        $model->hapus_kelas($id_kelas);

        session()->setFlashdata('message', 'Kelas berhasil dihapus');
        return redirect()->to(base_url('Kelas/index'));}

        public function selesaiBaca($idKelas)
        {
            $idUser = session()->get('id_user'); // Ambil id_user dari session
    
            $this->statusBacaModel->updateStatusBaca([
                'id_user' => $idUser,
                'id_kelas' => $idKelas,
            ]);
    
            return redirect()->back()->with('message', 'Status baca berhasil diperbarui');
        }


            public function preview()
            {
                $file = $this->request->getFile('pdf');
        
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $filePath = WRITEPATH . 'uploads/' . $file->getName();
                    $file->move(WRITEPATH . 'uploads');
        
                    // Baca konten PDF
                    $pdfContent = file_get_contents($filePath);
        
                    // Tampilkan PDF sebagai preview
                    return $this->response->setHeader('Content-Type', 'application/pdf')
                                          ->setBody($pdfContent);
                }
        
                return $this->response->setStatusCode(400)
                                      ->setBody('Invalid PDF file.');
            }
        }