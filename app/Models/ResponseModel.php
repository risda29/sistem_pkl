<?php
namespace App\Models;
use CodeIgniter\Model;
class ResponseModel extends Model
{
    protected $table = 'kuesioner_user';
    protected $primaryKey = 'id_kuesioner_user';
    protected $allowedFields = ['id_user', 'id_kuesioner', 'point'];
}