<?php
namespace App\Models;
use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'survey';
    protected $primaryKey = 'id_survey';
    protected $allowedFields = ['question'];
}