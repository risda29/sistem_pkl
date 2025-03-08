<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Register extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'id_regis';
    protected $allowedFields = ['nama', 'email', 'password'];


    protected $validationRules = [
        'nama'     => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|is_unique[register.email]',
        'password' => 'required|min_length[5]|max_length[255]',
    ];

 
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar.',
            'valid_email' => 'Format email tidak valid.'
        ],
        'password' => [
            'min_length' => 'Password harus memiliki minimal 5 karakter.',
            'max_length' => 'Password tidak boleh lebih dari 255 karakter.',
        ]
    ];

 
    public function validateRegister($data)
    {
        if (!$this->validate($data)) {
            return $this->errors();  
        }
        return true;
    }
}
