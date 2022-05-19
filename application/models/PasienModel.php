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

    public function editPasien()
    {
        // var_dump($this->input->post('id_pasien'));
        // die;
        $data = [
            'nama_pasien' => $this->input->post('nama_pasien', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'keluhan' => $this->input->post('keluhan', true),
            'kategori' => $this->input->post('kategori', true),
            'umur' => $this->input->post('umur', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true)
        ];
        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $this->db->update('pasien', $data);
    }

    public function getPasienByKategori($kategori)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('kategori', $kategori);
        $query = $this->db->get();
        return $query;
    }

    public function edit_data($where)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function hapusData($id_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        $this->db->delete('pasien');
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('pasien', $where);
    }

    public function getPasienById($id_pasien)
    {
        return $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row_array();
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
