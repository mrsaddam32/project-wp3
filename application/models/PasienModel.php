<?php

class PasienModel extends CI_Model
{
    public function getPasien()
    {
        return $this->db->get('pasien');
    }

    public function tambahPasien($data = null)
    {
        $this->db->insert('pasien', $data);
    }

    public function editPasien($where)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function getPasienWhere($where = null)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function insert_rekmedis($data = null)
    {
        $this->db->insert('rek_medik', $data);
    }

    public function rekam_medis($id_rmdk)
    {
        $query = $this->db->query("SELECT rek_medik.*,
                                pasien.no_pendaftaran,
                                pasien.nama_pasien,
                                pasien.keluhan,
                                dokter.nama_dokter,
                                obat.nama_obat,
                                FROM rek_medik
                                INNER JOIN pasien ON rek_medik.no_pendaftaran=pasien.no_pendaftaran
                                INNER JOIN dokter ON rek_medik.nama_dokter=dokter.nama_dokter
                                INNER JOIN obat ON rek_medik.nama_obat=obat.nama_obat
                                WHERE rek_medik.id_rmdk='$id_rmdk'");
        return $query;
    }
}
