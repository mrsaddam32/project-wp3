<?php

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['PasienModel', 'RekmedisModel']);
        // cek_login_pasien();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pasien';
        $pasien = $this->PasienModel->getPasien()->result();
        // var_dump($pasien);
        // die;
        foreach ($pasien as $pas) {
            $data['no_pendaftaran'] = $pas->no_pendaftaran;
            $data['nama_pasien'] = $pas->nama_pasien;
            $data['umur'] = $pas->umur;
            $data['tgl_lahir'] = $pas->tgl_lahir;
            $data['jenis_kelamin'] = $pas->jenis_kelamin;
            $data['tgl_daftar'] = $pas->tgl_daftar;
        }

        $this->load->view('pasien/index', $data);
    }

    public function rekam_medis()
    {
        $data['title'] = 'Hasil Rekam Medis';
        $rekMedis = $this->RekmedisModel->getAllData()->result();
        // var_dump($rekMedis);
        // die;
        foreach ($rekMedis as $row) {
            $data['no_rmdk'] = $row->no_rmdk;
            $data['no_pendaftaran'] = $row->no_pendaftaran;
            $data['nama_pasien'] = $row->nama_pasien;
            $data['nama_dokter'] = $row->nama_dokter;
            $data['tgl_rmdk'] = $row->tgl_rmdk;
            $data['keluhan'] = $row->keluhan;
            $data['diagnosa'] = $row->diagnosa;
            $data['nama_obat'] = $row->nama_obat;
        }

        $this->load->view('pasien/rekam_medis', $data);
    }

    public function register()
    {
        $data['title'] = 'Register Pasien';

        $this->load->view('pasien/register', $data);
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Field nama belum diisi.'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Harap mengisi tanggal lahir.'
        ]);
        $this->form_validation->set_rules('umur', 'Umur', 'required', [
            'required' => 'Field umur belum diisi.'
        ]);
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required', [
            'required' => 'Field keluhan belum diisi.'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Field jenis kelamin belum diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Pasien';
            $this->load->view('pasien/register', $data);
        } else {
            $data = [
                'no_pendaftaran' => mt_rand(),
                'nama_pasien' => htmlspecialchars($this->input->post('nama')),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'keluhan' => $this->input->post('keluhan'),
                'umur' => $this->input->post('umur'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            ];
            // var_dump($data);
            // die;
            $this->PasienModel->tambahPasien($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat anda telah berhasil melakukan register dengan nomor pendaftaran' . $data['no_pendaftaran'] . '. </div>');
            redirect('pasien/login');
        }
    }

    public function login()
    {
        $data['title'] = 'Login Pasien';

        $this->load->view('pasien/login', $data);
    }

    public function proses_login()
    {
        $no_pendaftaran = $this->input->post('no_pendaftaran', true);
        $password = $this->input->post('password', true);

        $pasien = $this->PasienModel->cekData(['no_pendaftaran' => $no_pendaftaran])->row_array();

        // Jika pasien ada
        if ($pasien) {
            // Cek tanggal lahirnya sebagai password
            if ($password == $pasien['tgl_lahir']) {
                $data = [
                    'nama_pasien' => $pasien['nama_pasien'],
                    'umur' => $pasien['umur'],
                    'jenis_kelamin' => $pasien['jenis_kelamin']
                ];
                // var_dump($data);
                // die;
                redirect('pasien', $data);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">No Pendaftaran / Tanggal Lahir salah</div>');
                redirect('pasien/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">No Pendaftaran salah</div>');
            redirect('pasien/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_pasien');
        $this->session->unset_userdata('umur');
        $this->session->unset_userdata('jenis_kelamin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout</div>');

        redirect(base_url());
    }
}
