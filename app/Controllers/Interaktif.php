<?php
namespace App\Controllers;

use App\Models\M_Interaktif;
use App\Models\M_Profil;
use App\Models\M_Story;

class Interaktif extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $model = new M_Interaktif();
        $data['interaktif'] = $model->getInteraktif();

        $M_Profil = new M_Profil();
        $data['userData'] = $M_Profil->getDataProfil(1);

        return view('v_kelas_interaktif', $data);
    }

    public function proses_tambah_interaktif()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'deskripsi' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
            'link_zoom' => 'required|valid_url',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('foto', $namaGambar);

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'link_zoom' => $this->request->getPost('link_zoom'),
            'link_tree' => $_POST['link_tree'],
        ];

        $interaktifModel = new M_Interaktif();
        $interaktifModel->proses_tambah_interaktif($data);

        session()->setFlashdata('message', 'Interaktif berhasil ditambahkan.');
        return redirect()->to(base_url('interaktif/index'));
    }

    public function update($id_interaktif)
    {
        $model = new M_Interaktif();
        $data['interaktif'] = $model->getInteraktif($id_interaktif);
    
        if (empty($data['interaktif'])) {
            session()->setFlashdata('message', 'Interaktif tidak ditemukan.');
            return redirect()->to(base_url('interaktif/index'));
        }
    
        return view('v_edit_interaktif', $data);
    }
    
    public function update_interaktif($id_interaktif)
    {
        $model = new M_Interaktif();
        $interaktif = $model->getInteraktif($id_interaktif);
    
        if (empty($interaktif)) {
            session()->setFlashdata('message', 'Interaktif tidak ditemukan.');
            return redirect()->to(base_url('interaktif/index'));
        }
    
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            if ($interaktif['gambar'] && file_exists('foto/' . $interaktif['gambar'])) {
                unlink('foto/' . $interaktif['gambar']);
            }
    
            $namaGambar = $gambar->getRandomName();
            $gambar->move('foto', $namaGambar);
        } else {
            $namaGambar = $interaktif['gambar'];
        }
    
        $data = [
            'id_interaktif' => $id_interaktif,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'link_zoom' => $this->request->getPost('link_zoom'),
            'link_tree' => $this->request->getPost('link_tree'),
        ];
    
        $model->update_interaktif($data);
    
        session()->setFlashdata('message', 'Interaktif berhasil diupdate.');
        return redirect()->to(base_url('interaktif/index'));
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

    private function checkAdminPermission()
    {
        return $this->session->get('leveluser') !== 'Admin';
    }
    
    public function tampilinteraktif(): string
    {
        $model = new M_Interaktif();
        $data['interaktif'] = $model->getInteraktif();

        $modelStruktur = new M_Struktur();
        $data['struktur'] = $modelStruktur->getStruktur();

        $modelVisiMisi = new M_VisiMisi();
        $data['visiData'] = $modelVisiMisi->getVisiMisi(1);

        $data['judul'] = 'Interaktif Data';
        $data['page'] = 'v_halaman_kelas_interaktif';

        return view('v_front_end', $data);
    }

    public function detail($id_interaktif)
    {
        $model = new M_Interaktif();
        $data['interaktif'] = $model->getInteraktifById($id_interaktif);

        if (empty($data['interaktif'])) {
            session()->setFlashdata('message', 'Interaktif tidak ditemukan.');
            return redirect()->to(base_url('interaktif/index'));
        }

        $modelStruktur = new M_Struktur();
        $data['struktur'] = $modelStruktur->getStruktur();

        $modelStory = new M_Story();
        $data['story'] = $modelStory->getStory();

        $modelVisiMisi = new M_VisiMisi();
        $data['visiData'] = $modelVisiMisi->getVisiMisi(1);

        $data['judul'] = 'Detail Interaktif';
        $data['page'] = 'v_detail_interaktif_pilihan';

        return view('v_front_end', $data);
    }

    public function hapus_interaktif($id_interaktif)
    {
        if ($this->session->get('leveluser') !== 'Admin') {
            session()->setFlashdata('message', 'Anda tidak memiliki izin untuk menghapus interaktif.');
            return redirect()->to(base_url('interaktif/index'));
        }

        $model = new M_Interaktif();
        $interaktif = $model->getInteraktif($id_interaktif);

        if (empty($interaktif)) {
            session()->setFlashdata('message', 'Interaktif tidak ditemukan.');
            return redirect()->to(base_url('interaktif/index'));
        }

        if ($interaktif['gambar'] && file_exists('foto/' . $interaktif['gambar'])) {
            unlink('foto/' . $interaktif['gambar']);
        }

        $model->hapus_interaktif($id_interaktif);

        session()->setFlashdata('message', 'Interaktif berhasil dihapus.');
        return redirect()->to(base_url('interaktif/index'));}}