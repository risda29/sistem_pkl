<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Respon extends Model
{
    protected $table = 'kuesioner_user';
    protected $primaryKey = 'id_kuesioner_user';
    protected $allowedFields = ['id_user', 'id_kuesioner', 'point'];

    public function sudahMengisi($id_user)
    {
        return $this->where('id_user', $id_user)->countAllResults() > 0;
    }

    public function getJawabanStatistik()
    {
        return $this->select('id_kuesioner, point, COUNT(*) as jumlah')
            ->groupBy('id_kuesioner, point')
            ->findAll();
    }
}
