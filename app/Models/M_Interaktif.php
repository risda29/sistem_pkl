<?php
namespace App\Models;
use CodeIgniter\Model;

class M_Interaktif extends Model
{
    protected $table = 'interaktif';
    protected $primaryKey = 'id_interaktif';
    protected $allowedFields = ['deskripsi', 'link_tree', 'gambar', 'link_zoom'];

    public function getInteraktif($id_interaktif = null)
    {
        if ($id_interaktif === null) {
            return $this->findAll();
        } else {
            return $this->find($id_interaktif);
        }
    }

    public function proses_tambah_interaktif($data)
    {
        return $this->insert($data);
    }



    public function hapus_interaktif($id_interaktif)
    {
        return $this->where('id_interaktif', $id_interaktif)->delete();
    }



    public function update_interaktif($data)
    {
        $id_interaktif = $data['id_interaktif'];
        if (isset($data['gambar']) && is_string($data['gambar'])) {
            $gambarName = $data['gambar'];
        } elseif (isset($data['gambar']) && $data['gambar']->isValid() && !$data['gambar']->hasMoved()) {
            $gambarName = $data['gambar']->getName();
            if ($data['gambar']->move('foto', $gambarName)) {
                $pathGambarDatabase = 'foto' . $gambarName;
                $data['gambar'] = $pathGambarDatabase;
            } else {
                echo 'Gagal memindahkan file gambar.';
                die();
            }
        }
        $this->update($id_interaktif, $data);
        return $data;

    }
    public function getInteraktifStatus()
{
    return $this->select('user.username, user.email, user.leveluser, user.ikutikelas, user.status,
                         interaktif.id_interaktif, interaktif.deskripsi, interaktif.gambar, interaktif.link_zoom')
                ->join('user', 'user.id_user = interaktif.id_user', 'left')
                ->orderBy('user.id_user', 'DESC')
                ->findAll();
}

    public function jumlah_interaktif()
    {
        return $this->countAll();
    }

    public function getInteraktifById($id_interaktifs)
    {
        return $this->db->table('interaktifs')->where(['id_interaktifs' => $id_interaktifs])->get()->getRow();}}
