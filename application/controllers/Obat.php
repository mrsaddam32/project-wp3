<?php

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ObatModel');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah Data Obat';
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('obat/tambah_obat');
            $this->load->view('layouts/footer');
        } else {
            $this->ObatModel->tambahObat();
            redirect('dashboard/daftar_obat');
        }
    }

    public function edit_obat($id_obat)
    {
        $data['title'] = 'Edit Data Obat';
        $data['obat'] = $this->ObatModel->getObatById($id_obat);
        $data['satuan'] = ['Kaplet', 'Tablet', 'Pil', 'Cream', 'Syrup'];

        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('obat/edit_obat', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->ObatModel->updateObat();
            redirect('dashboard/daftar_obat');
        }
    }

    public function hapus_obat($id)
    {
        $where = array('id_obat' => $id);
        $this->ObatModel->hapusObat($where);
        redirect('dashboard/daftar_obat');
    }
}
