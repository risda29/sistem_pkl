<?php

namespace App\Models;
use CodeIgniter\Model;

class M_Story extends Model
{
    //PROPERTI 
    protected $table = 'story';
    protected $primaryKey = 'id_story';
    protected $allowedFields = ['judul', 'tanggal', 'link_tree', 'artikel', 'gambar', 'youtube_link', 'tugas_link', 'respon_link'];
    public function getstory($id_story = null)
    {
        if ($id_story === null) {
            return $this->findAll();
        } else {
            return $this->find($id_story);
        }
    }

    public function ubah_is_read($id_story)
    {
        return $this->update($id_story, ['is_read' => 1]);
    }
    public function jumlah_story()
    {
        return $this->countAll();
    }
    public function hapus_story($id_story)
    {
        return $this->db->table('story')->where('id_story', $id_story)->delete();
    }



    public function getKelasCountByUserId($id_user)
    {
        return $this->where('id_user', $id_user) // Menyaring berdasarkan id_user
            ->countAllResults(); // Menghitung jumlah hasil
    }



    public function proses_tambah_story($data)
    {
        return $this->insert($data);
    }

    public function update_story($data)
    {
        $id_story = $data['id_story'];

        // Periksa jika gambar adalah string
        if (isset($data['gambar']) && is_string($data['gambar'])) {
            $gambarName = $data['gambar'];
        }
        // Periksa jika gambar adalah objek file yang valid
        elseif (isset($data['gambar']) && is_object($data['gambar']) && $data['gambar']->isValid() && !$data['gambar']->hasMoved()) {
            $gambarName = $data['gambar']->getName();
            if ($data['gambar']->move('foto', $gambarName)) {
                $pathGambarDatabase = 'foto/' . $gambarName;
                $data['gambar'] = $pathGambarDatabase;
            } else {
                echo 'Gagal memindahkan file gambar.';
                die();
            }
        }

        // Update data
        $this->update($id_story, $data);
        return $data;
    }

    public function getstoryById($id_story)
    {
        return $this->db->table('story')->where(['id_story' => $id_story])->get()->getRow();
    }
}
