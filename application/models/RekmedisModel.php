<?php

class RekmedisModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('rek_medik');
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('rek_medik', $where);
    }
}
