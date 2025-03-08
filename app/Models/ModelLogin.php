<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'user'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key
    protected $allowedFields = [
        'username',
        'password',
        'email',
        'telepon',
        'nama',
        'ttl',
        'alamat',
        'bidang',
        'kabupaten',
        'provinsi',
        'instansi',
        'pekerjaan',
        'manfaat',
        'ikutikelas',
        'reset_token',
        'token_expiry',
        'create_at',
        'update_at',
        'is_read',
        'leveluser'
    ]; // Kolom yang diizinkan untuk insert/update
    protected $useTimestamps = true;
    protected $createdField = 'create_at';
    protected $updatedField = 'update_at';

    public function getUserStatus()
    {
        $db = db_connect();
        $query = $db->query("
            SELECT u.id_user, u.username, u.email, u.leveluser, 
                   IF(uss.is_read = 1, 'Read ✔', 'Unread') AS status
            FROM users u
            LEFT JOIN user_story_status uss ON u.id_user = uss.user_id
        ");
        return $query->getResultArray();
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function proses_tambah_user($data)
    {
        return $this->insert($data);
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
   
}
