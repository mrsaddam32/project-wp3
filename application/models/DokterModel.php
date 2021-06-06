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

    public function getDokterWhere($where = null)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function hapusDokter($where)
    {
        $this->db->where($where);
        $this->db->delete('dokter');
    }
}
