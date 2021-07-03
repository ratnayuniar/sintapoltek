<?php
class M_pengguna_dosen extends CI_Model
{
    function tampil_data_dosen()
    {
        $this->db->where_in('level', ['3', '4', '1']);
        $this->db->order_by('level', 'desc');
        $this->db->where('dosen.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('dosen');
    }
}
