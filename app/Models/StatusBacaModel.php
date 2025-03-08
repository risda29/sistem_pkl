<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusBacaModel extends Model
{
    protected $table = 'status_baca';
    protected $primaryKey = 'id_status';
    protected $allowedFields = ['id_user', 'id_kelas', 'id_story', 'status', 'waktu_baca'];

    // Method untuk mengambil semua status baca
    public function getStatusBaca()
    {
        return $this->select('user.username, user.email, user.leveluser, 
                          kelas.judul AS judul_kelas, story.judul AS judul_story, 
                          status_baca.status, status_baca.waktu_baca')
            ->join('user', 'user.id_user = status_baca.id_user', 'left')
            ->join('kelas', 'kelas.id_kelas = status_baca.id_kelas', 'left')
            ->join('story', 'story.id_story = status_baca.id_story', 'left')
            ->orderBy('status_baca.waktu_baca', 'DESC')
            ->findAll();
    }



    

    // Method untuk menambahkan atau memperbarui status baca
    public function updateStatusBaca($data)
    {
        $existingStatus = $this->where([
            'id_user' => $data['id_user'],
            'id_story' => $data['id_story']
        ])->first();

        if ($existingStatus) {
            // Jika sudah ada, perbarui status dan waktu baca
            $this->update($existingStatus['id_status'], [
                'status' => 'sudah terbaca',
                'waktu_baca' => date('Y-m-d H:i:s')
            ]);
        } else {
            // Jika belum ada, tambahkan status baru
            $this->insert([
                'id_user' => $data['id_user'],
                'id_story' => $data['id_story'],
                'status' => 'sudah terbaca',
                'waktu_baca' => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function updateStatusBacaKelas($data)
    {
        $existingStatus = $this->where([
            'id_user' => $data['id_user'],
            'id_kelas' => $data['id_kelas']
        ])->first();

        if ($existingStatus) {
            // Jika sudah ada, perbarui status dan waktu baca
            $this->update($existingStatus['id_status'], [
                'status' => 'sudah terbaca',
                'waktu_baca' => date('Y-m-d H:i:s')
            ]);
        } else {
            // Jika belum ada, tambahkan status baru
            $this->insert([
                'id_user' => $data['id_user'],
                'id_kelas' => $data['id_kelas'],
                'status' => 'sudah terbaca',
                'waktu_baca' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
