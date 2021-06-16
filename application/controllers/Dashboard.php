<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['UserModel', 'PasienModel', 'DokterModel', 'ObatModel', 'RekmedisModel']);
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            // Pengecekan sudah login/belum
            $user = $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array();
            $data = [
                'nama' => $user['nama'],
                'role' => $user['role'],
                'title' => 'Dashboard Admin'
            ];

            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('layouts/footer');
        } else {
            $data['title'] = 'Home';
            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard/index');
            $this->load->view('layouts/footer');
        }
    }

    public function daftar_pasien()
    {
        if ($this->session->userdata('username')) {
            // Pengecekan sudah login/belum
            $user = $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array();
            $data = [
                'nama' => $user['nama'],
                'role' => $user['role'],
                'title' => 'Dashboard Admin',
                'pasien' => $this->PasienModel->getPasien()->result(),
                'rek_medis' => $this->RekmedisModel->cekData(['no_pendaftaran' => $this->session->userdata('no_pendaftaran')])->row_array()
            ];

            // var_dump($data['pasien']);
            // die;

            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard/daftar_pasien', $data);
            $this->load->view('layouts/footer');
        }
    }

    public function daftar_dokter()
    {
        if ($this->session->userdata('username')) {
            // Pengecekan sudah login/belum
            $user = $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array();
            $data = [
                'nama' => $user['nama'],
                'role' => $user['role'],
                'title' => 'Dashboard Admin',
                'dokter' => $this->DokterModel->getDokter()->result()
            ];
            // var_dump($data['pasien']);
            // die;

            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard/daftar_dokter', $data);
            $this->load->view('layouts/footer');
        }
    }

    public function daftar_obat()
    {
        if ($this->session->userdata('username')) {
            // Pengecekan sudah login/belum
            $user = $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array();
            $data = [
                'nama' => $user['nama'],
                'role' => $user['role'],
                'title' => 'Dashboard Admin',
                'obat' => $this->ObatModel->getObat()->result()
            ];
            // var_dump($data['pasien']);
            // die;

            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard/daftar_obat', $data);
            $this->load->view('layouts/footer');
        }
    }
}
