<?php
namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\M_Aktifitas;  // Model Aktifitas yang sesuai dengan tabel 'aktifitas'
use App\Models\M_Profil;
use App\Models\M_Story;
use App\Models\M_Kelas;

class UserController extends BaseController
{
    protected $m_Aktifitas;

    public function __construct()
    {
        // Menggunakan model M_Aktifitas
        $this->m_Aktifitas = new M_Aktifitas();
    }

    public function detail($id_user)
    {
        // Inisialisasi model yang dibutuhkan
        $modelLogin = new ModelLogin();
        $modelProfil = new M_Profil(); // Menggunakan M_Profil
        $modelStory = new M_Story();
        $modelKelas = new M_Kelas();

        // Mengambil data story dan kelas
        $data['story'] = $modelStory->getstory(); // Mengambil data story
        $data['kelas'] = $modelKelas->getKelas();  // Mengambil data kelas

        // Ambil data pengguna berdasarkan ID
        $user = $modelLogin->find($id_user);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna tidak ditemukan');
        }

        // Ambil data terkait pengguna
        $data['user'] = $user;

        // Mencatat aktivitas 'melihat detail' untuk kelas atau story
        $this->recordDetailActivity($id_user, 'melihat detail pengguna');

        // Ambil aktivitas pengguna yang relevan (hanya aktivitas terkait link PDF, YouTube, gambar, Google Meet)
        $data['aktifitas'] = $this->m_Aktifitas->getAktifitasWithRelations($id_user); // Memanggil getAktifitasWithRelations

        // Filter aktivitas berdasarkan tipe (klik pdf, youtube, gambar, google meet)
        $filteredAktifitas = [];
        foreach ($data['aktifitas'] as $item) {
            if (in_array($item['tipe_aktifitas'], ['klik pdf', 'klik youtube', 'klik gambar', 'klik google meet'])) {
                $filteredAktifitas[] = $item;
            }
        }

        // Menyaring data aktivitas untuk dikirim ke view
        $data['aktifitas'] = $filteredAktifitas;

        // Kirim data ke view
        return view('user_detail', $data);
    }



    // Method untuk mencatat aktivitas melihat detail
    private function recordDetailActivity($id_user, $activity_type)
    {
        $this->m_Aktifitas->save([
            'id_user' => $id_user,  // ID pengguna yang melihat
            'tipe_aktifitas' => $activity_type,  // Tipe aktivitas (melihat detail pengguna)
            'detail_aktifitas' => 'Melihat detail pengguna dengan ID ' . $id_user,  // Deskripsi aktivitas
            'created_at' => date('Y-m-d H:i:s')  // Tanggal waktu aktivitas
        ]);
    }

    // Method untuk mencatat aktivitas ketika melihat detail kelas atau story
    private function recordViewDetail($id_user, $activity_type, $item_title)
    {
        $this->m_Aktifitas->save([
            'id_user' => $id_user,  // ID pengguna yang melihat
            'tipe_aktifitas' => $activity_type,  // Tipe aktivitas (melihat detail kelas, story, dll)
            'detail_aktifitas' => 'Melihat detail ' . $item_title,  // Deskripsi aktivitas
            'created_at' => date('Y-m-d H:i:s')  // Tanggal waktu aktivitas
        ]);
    }



}
