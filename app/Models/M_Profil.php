<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Profil extends Model
{
    protected $table = 'user'; // Ganti 'user' dengan nama tabel Anda
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username', 'email', 'telepon', 'nama', 'ttl', 'alamat', 'pekerjaan', 
        'instansi', 'bidang', 'manfaat', 'ikutikelas', 'password', 'reset_token', 
        'token_expiry', 'create_at', 'update_at', 'status', 'kelas_interaktif', 'leveluser'
    ];

    public function getDataProfil($id_user)
    {
        return $this->where('id_user', $id_user)->first(); // Mengambil data berdasarkan id_user
    }

    public function updateDataProfil($id_user, $data)
    {
        // Melakukan update data berdasarkan id_user
        return $this->update($id_user, $data);}


}