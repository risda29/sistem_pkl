<?php

namespace App\Models;
use CodeIgniter\Model;

class M_Kelas extends Model
{
    // PROPERTI 
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['judul', 'tanggal', 'link_tree', 'artikel', 'gambar', 'youtube_link', 'id_user','tugas_link', 'respon_link'];

 

    // Model untuk tabel story
    public function jumlah_kelas()
    {
        return $this->countAll();
    }

    // Fungsi untuk menghitung jumlah data di tabel story
  

    // Fungsi untuk menghitung jumlah total data di tabel story
  
    // Method untuk mendapatkan jumlah kelas yang diikuti oleh pengguna
    public function getKelasCountByUserId($id_user)
    {
        return $this->where('id_user', $id_user) // Menyaring berdasarkan id_user
                    ->countAllResults(); // Menghitung jumlah hasil
    }

    public function getKelas($id_kelas = null)
    {
        if ($id_kelas === null) {
            return $this->findAll();
        } else {
            return $this->find($id_kelas);
        }
    }

    public function proses_tambah_kelas($data)
    {
        return $this->insert($data);
    }

    public function hapus_kelas($id_kelas)
    {
        return $this->where('id_kelas', $id_kelas)->delete();
    }

    public function update_kelas($data)
    {
        $id_kelas = $data['id_kelas'];
        if (isset($data['gambar']) && is_string($data['gambar'])) {
            $gambarName = $data['gambar'];
        } elseif (isset($data['gambar']) && $data['gambar']->isValid() && !$data['gambar']->hasMoved()) {
            $gambarName = $data['gambar']->getName();
            if ($data['gambar']->move('foto', $gambarName)) {
                $pathGambarDatabase = 'foto' . $gambarName;
                $data['gambar'] = $pathGambarDatabase;
            } else {
                echo 'Gagal memindahkan file gambar.';
                die();
            }
        }
        $this->update($id_kelas, $data);
        return $data;
    }

    public function getKelasById($id_kelas)
    {
        return $this->db->table('kelas')->where(['id_kelas' => $id_kelas])->get()->getRow();
    }
}
