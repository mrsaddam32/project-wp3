<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak. Anda belum login</div>');
        redirect('auth/login');
    } else {
        $role = $ci->session->userdata('role');
        $id_user = $ci->session->userdata('id_user');
    }
}

function cek_login_pasien()
{
    $ci = get_instance();

    if (!$ci->session->userdata('no_pendaftaran')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak. Anda belum login</div>');
        redirect('pasien/login');
    } else {
        $nama = $ci->session->userdata('nama');
        $umur = $ci->session->userdata('umur');
        $jenis_kelamin = $ci->session->userdata('jenis_kelamin');
    }
}

function cek_login_dokter()
{
    $ci = get_instance();

    if ($ci->session->userdata('kode_dokter')) {
        // $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akses ditolak. Anda belum login</div>');
        // redirect('dokter/login');
        $nama_dokter = $ci->session->userdata('nama_dokter');
        $tgl_lahir = $ci->session->userdata('tgl_lahir');
        $jenis_kelamin = $ci->session->userdata('jenis_kelamin');
        $spesialis = $ci->session->userdata('spesialis');
    }
}
