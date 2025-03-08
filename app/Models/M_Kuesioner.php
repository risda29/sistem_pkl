<?php

namespace App\Models;
use CodeIgniter\Model;

class M_Kuesioner extends Model
{
    protected $table = 'kuesioner';
    protected $primaryKey = 'id_kuesioner';
    protected $allowedFields = [
        'pertanyaan'
    ];
}