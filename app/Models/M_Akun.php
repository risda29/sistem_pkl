<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Akun extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username', 'email', 'telepon', 'nama', 'ttl', 'alamat', 'pekerjaan', 
        'instansi', 'bidang', 'manfaat', 'ikutikelas', 'password', 'reset_token', 
        'token_expiry', 'create_at', 'update_at', 'status', 'kelas_interaktif', 'leveluser'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'create_at';
    protected $updatedField = 'update_at';

    public function getInteraktifIkutikKelas($ikutikelas = 'ya')
    {
        return $this->where('ikutikelas', $ikutikelas)
                    ->orderBy('create_at', 'DESC') 
                    ->findAll();
    }

    public function getPengguna()
    {
        return $this->findAll();
    }
    public function getDataAkun()
    {
        return $this->findAll();
    }
    public function updateDataAkun($id_user, $data)
    {
        return $this->update($id_user, $data);
    }
    
    public function jumlah_pengguna()
    {
        return $this->where('ikutikelas', 'ya')->countAllResults();
    }

    public function ubahIsRead($id_user)
    {
        if ($this->find($id_user)) {
            $this->update($id_user, ['is_read' => 1]);
            return $this->db->affectedRows() > 0;
        }
        return false;
    }

    public function getPenggunaByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function simpanTokenReset($email, $token, $expiry)
    {
        return $this->where('email', $email)
                    ->set(['reset_token' => $token, 'token_expiry' => $expiry])
                    ->update();
    }

    public function hapusTokenReset($email)
    {
        return $this->where('email', $email)
                    ->set(['reset_token' => null, 'token_expiry' => null])
                    ->update();
    }

    public function ubahPassword($email, $hashedPassword)
    {
        return $this->where('email', $email)
                    ->set(['password' => $hashedPassword, 'reset_token' => null, 'token_expiry' => null])
                    ->update();
    }

    public function hapus($id_user)
    {
        return $this->delete($id_user);
    }

    public function cekLogin($email)
    {
        return $this->where('email', $email)->first();
    }
}
