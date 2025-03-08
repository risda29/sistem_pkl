<?php

function check_ikuti_kelas()
{
    $M_Akun = new \App\Models\M_Akun();
    $user = $M_Akun->find(session()->get('id_user'));
    return $user && strtolower($user['ikutikelas']) == 'ya';
}

function check_jumlah_interaktif()
{
    $M_Interaktif = new \App\Models\M_Interaktif();
    $jumlah_interaktif = $M_Interaktif->jumlah_interaktif();
    return !empty($jumlah_interaktif) && $jumlah_interaktif > 0;
}

function get_jumlah_interaktif()
{
    $M_Interaktif = new \App\Models\M_Interaktif();
    return $M_Interaktif->jumlah_interaktif();

}