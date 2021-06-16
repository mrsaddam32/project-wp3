<?php

class ObatModel extends CI_Model
{
    public function getObat()
    {
        return $this->db->get('obat');
    }

    public function tambahObat()
    {
        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'satuan' => $this->input->post('satuan', true),
            'stok' => $this->input->post('stok', true)
        ];
        $this->db->insert('obat', $data);
    }

    public function getObatById($id_obat)
    {
        return $this->db->get_where('obat', ['id_obat' => $id_obat])->row_array();
    }

    public function updateObat()
    {
        $data = [
            'nama_obat' => $this->input->post('nama_obat'),
            'satuan' => $this->input->post('satuan'),
            'stok' => $this->input->post('stok')
        ];
        $this->db->where('id_obat', $this->input->post('id_obat'));
        $this->db->update('obat', $data);
    }

    public function hapusObat($where)
    {
        $this->db->where($where);
        $this->db->delete('obat');
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('obat', $where);
    }
}
