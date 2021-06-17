<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['UserModel', 'PasienModel', 'DokterModel', 'ObatModel', 'RekmedisModel']);
        $this->load->library('pdf');
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

    public function cetak_pdf_pasien()
    {
        $data = [
            'user' => $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array(),
            'pasien' => $this->PasienModel->getPasien()->result(),
            'title' => 'Laporan Data Pasien'
        ];
        $this->load->view('dashboard/print_pdf_pasien', $data);
        // Config pdf
        $paper_size = 'A4'; // Ukuran Kertas
        $orientation = 'landscape'; // Format kertas
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        // Converting to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("Laporan_data_pasien.pdf", ['Attachment' => 0]);
    }

    public function cetak_pdf_dokter()
    {
        $data = [
            'user' => $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array(),
            'dokter' => $this->DokterModel->getDokter()->result(),
            'title' => 'Laporan Data Dokter'
        ];
        $this->load->view('dashboard/print_pdf_dokter', $data);
        // Config pdf
        $paper_size = 'A4'; // Ukuran Kertas
        $orientation = 'landscape'; // Format kertas
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        // Converting to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("Laporan_data_dokter.pdf", ['Attachment' => 0]);
    }

    public function cetak_pdf_obat()
    {
        $data = [
            'user' => $this->UserModel->cekData(['username' => $this->session->userdata('username')])->row_array(),
            'obat' => $this->ObatModel->getObat()->result(),
            'title' => 'Laporan Data Obat'
        ];
        $this->load->view('dashboard/print_pdf_obat', $data);
        // Config pdf
        $paper_size = 'A4'; // Ukuran Kertas
        $orientation = 'landscape'; // Format kertas
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size, $orientation);
        // Converting to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("Laporan_data_obat.pdf", ['Attachment' => 0]);
    }
}
