<?php

class RekmedisModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('rek_medik');
    }
}
