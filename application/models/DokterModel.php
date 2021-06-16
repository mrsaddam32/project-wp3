<?php

class DokterModel extends CI_Model
{
    public function getDokter()
    {
        return $this->db->get('dokter');
    }

    public function tambahDokter($data = null)
    {
        $this->db->insert('dokter', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function getDokterById($id)
    {
        return $this->db->get_where('dokter', ['id_dokter' => $id])->row_array();
    }

    public function updateData()
    {
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'spesialis' => $this->input->post('spesialis', true)
        ];

        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->update('dokter', $data);
    }

    public function hapusDokter($where)
    {
        $this->db->where($where);
        $this->db->delete('dokter');
    }
}
