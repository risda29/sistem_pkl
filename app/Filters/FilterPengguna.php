<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterPengguna implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('leveluser') !== 'Pengguna') {
            return redirect()->to(base_url('Login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan khusus setelah request
    }
}
