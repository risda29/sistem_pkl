<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PdfController extends Controller
{
    public function show($filename)
    {
        // Definisikan path ke folder tempat PDF disimpan
        $filepath = WRITEPATH . 'uploads/pdf/' . $filename;

        // Cek apakah file ada
        if (file_exists($filepath)) {
            // Mengembalikan file PDF untuk ditampilkan
            return $this->response->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                ->setBody(file_get_contents($filepath));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File PDF tidak ditemukan");
        }
    }
}
