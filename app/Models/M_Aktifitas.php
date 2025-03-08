<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Aktifitas extends Model
{
    // Nama tabel sesuai dengan yang Anda inginkan
    protected $table = 'aktifitas';  // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_aktifitas';  // Kolom primary key
    protected $allowedFields = [
        'id_user',          // Kolom ID pengguna
        'id_story',         // Kolom ID Story (Storyteller)
        'id_kelas',         // Kolom ID Kelas Data
        'tipe_aktifitas',   // Kolom Tipe Aktivitas
        'detail_aktifitas', // Kolom Detail Aktivitas
        'created_at',       // Kolom Tanggal Dibuat
    ];

    // Validasi
    protected $validationRules = [
        'id_user' => 'required|integer',
        'id_story' => 'permit_empty|integer',  // ID Story (Storyteller) bisa kosong
        'id_kelas' => 'permit_empty|integer',  // ID Kelas Data bisa kosong
        'tipe_aktifitas' => 'required|string|max_length[255]',
        'detail_aktifitas' => 'required|string',
        'created_at' => 'required|valid_date[Y-m-d H:i:s]',
    ];

    // Mengambil aktivitas beserta data terkait (kelas, story, dan user)
//     public function getAktifitasWithRelations($id_user = null)
//     {
//         // Menambahkan join ke tabel kelas, story, dan user
//         $builder = $this->builder();
//         $builder->select('aktifitas.*, kelas.judul as kelas_judul, story.judul as story_judul, user.username as user_username');
//         $builder->join('kelas', 'kelas.id_kelas = aktifitas.id_kelas', 'left');
//         $builder->join('story', id_story_story = aktifitas.id_story', 'left');
//         $builder->join('user', 'user.id_user = aktifitas.id_user', 'left');
        
//         // Jika ada id_user, filter aktivitas berdasarkan user_id
//         if ($id_user) {
//             $builder->where('aktifitas.id_user', $id_user);
//         }

//         // Mengambil hasil query
//         return $builder->get()->getResultArray();
//     }
// }
}