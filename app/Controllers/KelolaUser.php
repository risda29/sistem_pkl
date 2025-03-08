<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Akun;
use App\Models\StatusBacaModel;

class KelolaUser extends BaseController
{
    protected $UserModel;
    protected $StatusBacaModel;

    public function __construct()
    {
        $this->UserModel = new M_Akun();
        $this->StatusBacaModel = new StatusBacaModel();
    }

    public function index()
    {
        $session = session();

        // Ambil data user dari session
        $userData = [
            'username' => $session->get('username'),
            'leveluser' => $session->get('leveluser'),
            'email' => $session->get('email'),
            'telepon' => $session->get('telepon'),
            'ikutikelas' => $session->get('ikutikelas'),
            'status' => $session->get('status'),
            'nama' => $session->get('nama'),
            'ttl' => $session->get('ttl'),
            'alamat' => $session->get('alamat'),
            'pekerjaan' => $session->get('pekerjaan'),
            'instansi' => $session->get('instansi'),
            'bidang' => $session->get('bidang'),
            'manfaat' => $session->get('manfaat')
        ];

        $data = [
            'title' => 'Kelola User',
            'userData' => $userData,
            'user' => $this->UserModel->findAll(),
            'status_baca' => $this->StatusBacaModel->getStatusBaca()
        ];

        return view('v_user', $data);
    }

    public function setujuUser($id_user)
{
    // Validasi data tidak diperlukan jika hanya update status user
    $user = $this->UserModel->find($id_user);
    if (!$user) {
        return redirect()->back()->with('message', 'User tidak ditemukan.');
    }

    // Update status user menjadi "Setuju"
    $this->UserModel->update($id_user, ['status' => 'Setujui']);

    return redirect()->back()->with('message', 'User berhasil disetujui.');
}


    public function setujuiUser($id_user)
    {
        if (!$this->UserModel->find($id_user)) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Update status user menjadi "disetujui"
        $this->UserModel->update($id_user, ['status' => 'Setujui']);
        return redirect()->to(base_url('KelolaUser'))->with('success', 'User berhasil disetujui.');
    }

    public function tolakUser($id_user)
    {
        if (!$this->UserModel->find($id_user)) {
            return redirect()->back()->with('message', 'User tidak ditemukan.');
        }

        // Update status user menjadi "Tolak"
        $this->UserModel->update($id_user, ['status' => 'Tolak']);
        return redirect()->to(base_url('KelolaUser'))->with('success', 'User berhasil Ditolak');
    }

    public function markAsRead()
    {
        $request = service('request');
        $data = json_decode($request->getBody(), true);

        if (!empty($data['id_story']) && session()->has('id_user')) {
            $id_user = session('id_user');
            $id_story = $data['id_story'];

            // Gunakan model untuk update status baca
            $this->StatusBacaModel->updateStatusBaca($id_user, $id_story);

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid data or user not logged in']);
    }

    public function hapus($id_user)
    {
        if (!$this->UserModel->find($id_user)) {
            return redirect()->to(base_url('kelolauser/index'))->with('error', 'User tidak ditemukan.');
        }

        // Hapus user
        if ($this->UserModel->delete($id_user)) {
            return redirect()->to(base_url('kelolauser/index'))->with('success', 'Pengguna berhasil dihapus.');
        } else {
            return redirect()->to(base_url('kelolauser/index'))->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }
}
