<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username', 'email', 'telepon', 'nama', 'ttl', 'alamat', 'pekerjaan', 
        'instansi', 'bidang', 'manfaat', 'ikutikelas', 'password', 'reset_token', 
        'token_expiry', 'create_at', 'update_at', 'status', 'kelas_interaktif', 'leveluser'
    ];

    public function getUserById($id)
    {
        return $this->where('id', $id)->first();
    }
}
