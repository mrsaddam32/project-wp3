<?php

class UserModel extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user');
    }

    public function tambahData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
}
