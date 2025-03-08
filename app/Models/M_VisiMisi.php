<?php

namespace App\Models;

use CodeIgniter\Model;

class M_VisiMisi extends Model
{
    protected $table = 'visimisi'; 
    protected $primaryKey = 'idvisimisi';
    protected $allowedFields = ['visi', 'misi', 'struktur'];

    public function updateVisiMisi($dataToUpdate)
    {
        // Ambil ID dari data yang akan diupdate
        $idVisiMisi = 1; 

        // Update data sesuai dengan ID
        $this->set($dataToUpdate)->where('idvisimisi', $idVisiMisi)->update();
    }
    public function getVisiMisi($idVisiMisi)
    {
        return $this->find($idVisiMisi);
    }
}
