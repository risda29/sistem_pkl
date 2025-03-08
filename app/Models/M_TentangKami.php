<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TentangKami extends Model
{
    protected $table = 'tentangkami'; // Nama tabel
    protected $primaryKey = 'id_tentang'; // Primary key
    protected $allowedFields = [
        'visi',
        'misi',
        'deskripsi'
    ]; 


    public function getkarya($id_karya = null)
    {
        if ($id_karya === null) {
            return $this->findAll();
        } else {
            return $this->find($id_karya);
        }
    }
    public function proses_tambah_karya($data)
    {
        return $this->insert($data);
    }
    public function hapus_karya($id_karya)
    {
        return $this->db->table('karya')->where('id_karya', $id_karya)->delete();
    }
    public function update_karya($data)
    {
        $id_karya = $data['id_karya'];
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
        $this->update($id_karya, $data);
        return $data;

    }
    public function getkaryaById($id_karya)
    {
        return $this->db->table('karya')->where(['id_karya' => $id_karya])->get()->getRow();
    }
}
