<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $leveluser = session()->get('leveluser');

        if ($leveluser !== 'Admin') {
            return redirect()->to(base_url('Login'))->with('error', 'Hanya admin yang dapat mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan khusus setelah request
    }
}
