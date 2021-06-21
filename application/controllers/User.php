<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        cek_login();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            'user' => $this->UserModel->getUser()->result()
        ];

        // var_dump($data['user']);
        // die;
        $this->load->view('layouts/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit_user($id_user)
    {
        $data['title'] = 'Edit Data User';
        $data['user'] = $this->UserModel->getUserById($id_user);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('user/edit_user', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->UserModel->editUser();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil mengubah data user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('user/index');
        }
    }

    public function hapus_user($id_user)
    {
        $this->UserModel->hapusUser($id_user);
        redirect('user/index');
    }
}
