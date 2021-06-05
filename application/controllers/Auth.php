<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function login()
    {
        $data['title'] = 'Login';

        $this->load->view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';

        $this->load->view('auth/register', $data);
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Field nama belum diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
            'required' => 'Field username belum diisi',
            'is_unique' => 'Username telah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|trim|matches[password2]', [
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]', [
            'matches' => 'Password Tidak Sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 'Administrator',
                'tgl_registrasi' => time()
            ];
            // var_dump($data);
            // die;
            $this->UserModel->tambahData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat anda telah berhasil melakukan register. </div>');
            redirect('auth/login');
        }
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);

        $user = $this->UserModel->cekData(['username' => $username])->row_array();

        // Jika usernya ada
        if ($user) {
            // Cek Password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'role' => $user['role']
                ];
                // var_dump($data);
                // die;

                $this->session->set_userdata($data);
                if ($user['role'] == 'Administrator') {
                    redirect('dashboard');
                } else if ($user['role'] == 'Dokter') {
                    redirect('dashboard/dokter');
                } else {
                    redirect('dashboard/pasien');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password / Username salah</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak terdaftar di database</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout</div>');

        redirect(base_url());
    }
}
