<?php

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['PasienModel', 'RekmedisModel', 'ObatModel']);
        // cek_login_pasien();
    }

    public function index()
    {
        $this->proses_login();
    }

    public function myProfile()
    {
        $pasien = $this->PasienModel->cekData(['no_pendaftaran' => $this->session->userdata('no_pendaftaran')])->row_array();
        // var_dump($pasien);
        // die;
        foreach ($pasien as $pas) {
            $data = [
                'title' => 'Profile Pasien',
                'rek_medis' => $this->RekmedisModel->cekData(['no_pendaftaran' => $this->session->userdata('no_pendaftaran')])->row_array(),
                'nama_pasien' => $pasien['nama_pasien'],
                'tgl_lahir' => $pasien['tgl_lahir'],
                'keluhan' => $pasien['keluhan'],
                'kategori' => $pasien['kategori'],
                'umur' => $pasien['umur'],
                'jenis_kelamin' => $pasien['jenis_kelamin'],
                'tgl_daftar' => $pasien['tgl_daftar']
            ];
        }

        $this->load->view('pasien/my_profile', $data);
    }

    public function rekam_medis()
    {
        $pasien = $this->PasienModel->cekData(['no_pendaftaran' => $this->session->userdata('no_pendaftaran')])->row_array();
        $rekMedis = $this->RekmedisModel->cekData(['no_pendaftaran' => $this->session->userdata('no_pendaftaran')])->row_array();
        // var_dump($rekMedis);
        // die;
        foreach ($pasien as $pas) {
            $data = [
                'title' => 'Hasil Rekam Medis',
                'nama_pasien' => $pasien['nama_pasien'],
                'jenis_kelamin' => $pasien['jenis_kelamin'],
                'keluhan' => $pasien['keluhan'],
                'tgl_daftar' => $pasien['tgl_daftar']
            ];
        }

        foreach ($rekMedis as $rm) {
            $data = [
                'title' => 'Hasil Rekam Medis',
                'nama_pasien' => $rekMedis['nama_pasien'],
                'nama_dokter' => $rekMedis['nama_dokter'],
                'no_rmdk' => $rekMedis['no_rmdk'],
                'tgl_rmdk' => $rekMedis['tgl_rmdk'],
                'keluhan' => $rekMedis['keluhan'],
                'diagnosa' => $rekMedis['diagnosa'],
                'nama_obat' => $rekMedis['nama_obat']
            ];
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
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Field kategori belum diisi.'
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
                'kategori' => $this->input->post('kategori'),
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
                    'no_pendaftaran' => $pasien['no_pendaftaran'],
                    'nama_pasien' => $pasien['nama_pasien'],
                    'umur' => $pasien['umur'],
                    'jenis_kelamin' => $pasien['jenis_kelamin']
                ];
                // var_dump($data);
                // die;
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Selamat Datang ! <strong>' . $data['nama_pasien'] . '</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('pasien/myProfile');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">No Pendaftaran / Tanggal Lahir salah</div>');
                redirect('pasien/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">No Pendaftaran salah</div>');
            redirect('pasien/login');
        }
    }

    public function edit_data($id_pasien)
    {
        $data['title'] = 'Edit Data Pasien';
        $data['pasien'] = $this->PasienModel->getPasienById($id_pasien);
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['kategori'] = ['UMUM', 'THT', 'KULIT & KELAMIN'];

        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('pasien/edit_pasien', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->PasienModel->editPasien();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil mengubah data pasien.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('dashboard/daftar_pasien');
        }
    }

    public function hapus_data($id_pasien)
    {
        $this->PasienModel->hapusData($id_pasien);
        redirect('dashboard/daftar_pasien');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_pasien');
        $this->session->unset_userdata('umur');
        $this->session->unset_userdata('jenis_kelamin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda berhasil Logout.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect(base_url());
    }
}
