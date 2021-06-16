<?php

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['DokterModel', 'PasienModel', 'ObatModel', 'RekmedisModel']);
    }

    public function index()
    {
        $this->proses_login();
    }

    public function myProfile()
    {
        $dokter = $this->DokterModel->cekData(['kode_dokter' => $this->session->userdata('kode_dokter')])->row_array();
        // var_dump($dokter);
        // die;

        foreach ($dokter as $dok) {
            $data = [
                'title' => 'Profil Dokter',
                'nama_dokter' => $dokter['nama_dokter'],
                'tgl_lahir' => $dokter['tgl_lahir'],
                'jenis_kelamin' => $dokter['jenis_kelamin'],
                'spesialis' => $dokter['spesialis']
            ];
        }

        $this->load->view('dokter/my_profile', $data);
    }

    public function periksa_pasien()
    {
        $data = [
            'title' => 'Pemeriksaan Pasien',
            'pasien' => $this->PasienModel->getPasien()->result()
        ];
        // var_dump($data['pasien']);
        // die;

        $this->load->view('dokter/periksa_pasien', $data);
    }

    public function rekam_medis($id_pasien)
    {
        $where = ['id_pasien' => $id_pasien];
        $data = [
            'title' => 'Rekam Medis Pasien',
            'pasien' => $this->PasienModel->edit_data($where)->row_array(),
            'dokter' => $this->DokterModel->getDokter()->result(),
            'obat' => $this->ObatModel->getObat()->result()
        ];
        // var_dump($data['pasien']);
        // die;

        $this->load->view('dokter/rekam_medis', $data);
    }

    public function proses_rekam()
    {
        $id_pasien = $this->input->post('id_pasien');
        $no_pendaftaran = $this->input->post('no_pendaftaran');
        $nama_dokter = $this->input->post('nama_dokter');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $nama_obat = $this->input->post('nama_obat');

        $data = [
            'id_pasien' => $id_pasien,
            'no_rmdk' => mt_rand(),
            'no_pendaftaran' => $no_pendaftaran,
            'nama_pasien' => $nama_pasien,
            'nama_dokter' => $nama_dokter,
            'keluhan' => $keluhan,
            'diagnosa' => $diagnosa,
            'nama_obat' => $nama_obat
        ];
        // var_dump($data);
        // die;
        $this->PasienModel->insert_rekmedis($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil melakukan pemeriksaan pasien.</div>');
        redirect('dokter/periksa_pasien');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah data dokter';

        $this->load->view('layouts/header', $data);
        $this->load->view('dokter/tambah_data');
        $this->load->view('layouts/footer');
    }

    public function proses_tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Field nama belum diisi.'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Harap mengisi tanggal lahir.'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Field jenis kelamin belum diisi.'
        ]);
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required', [
            'required' => 'Field spesialis belum diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah data dokter';

            $this->load->view('layouts/header', $data);
            $this->load->view('dokter/tambah_data');
            $this->load->view('layouts/footer');
        } else {
            $data = [
                'kode_dokter' => mt_rand(),
                'nama_dokter' => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'spesialis' => $this->input->post('spesialis')
            ];
            // var_dump($data);
            // die;
            $this->DokterModel->tambahDokter($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat anda telah berhasil menambah data dengan kode dokter ' . $data['kode_dokter'] . '. </div>');
            redirect('dokter/login');
        }
    }

    public function edit_dokter($id)
    {
        $data['title'] = 'Edit Data Dokter';
        $data['dokter'] = $this->DokterModel->getDokterById($id);
        $data['spesialis'] = ['UMUM', 'THT', 'KULIT & KELAMIN'];
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('dokter/edit_dokter', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->DokterModel->updateData();
            redirect('dashboard/daftar_dokter');
        }
    }

    public function login()
    {
        $data['title'] = 'Login Dokter';
        $this->load->view('dokter/login', $data);
    }

    public function proses_login()
    {
        $kode_dokter = $this->input->post('kode_dokter', true);
        $password = $this->input->post('password', true);

        $dokter = $this->DokterModel->cekData(['kode_dokter' => $kode_dokter])->row_array();

        // Jika dokter ada
        if ($dokter) {
            // Cek tanggal lahirnya sebagai password
            if ($password == $dokter['tgl_lahir']) {
                $data = [
                    'kode_dokter' => $dokter['kode_dokter'],
                    'nama_dokter' => $dokter['nama_dokter'],
                    'spesialis' => $dokter['spesialis'],
                    'jenis_kelamin' => $dokter['jenis_kelamin']
                ];
                // var_dump($data);
                // die;
                $this->session->set_userdata($data);
                redirect('dokter/myProfile');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kode Dokter / Tanggal Lahir salah</div>');
                redirect('dokter/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kode Dokter salah</div>');
            redirect('dokter/login');
        }
    }

    public function hapus_dokter($id)
    {
        $where = ['id_dokter' => $id];
        $this->DokterModel->hapusDokter($where);
        redirect('dashboard/daftar_dokter');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_dokter');
        $this->session->unset_userdata('tgl_lahir');
        $this->session->unset_userdata('jenis_kelamin');
        $this->session->unset_userdata('spesialis');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout</div>');

        redirect(base_url());
    }
}
