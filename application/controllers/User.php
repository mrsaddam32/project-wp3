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
}
