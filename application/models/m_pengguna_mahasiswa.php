<?php
class M_pengguna_mahasiswa extends CI_Model
{
    function tampil_data_mhs()
    {

        $this->db->where_in('level', ['2']);
        // $this->db->join('mahasiswa', 'mahasiswa.nim = user.nim', 'left');
        $this->db->where('mahasiswa.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('mahasiswa');
    }
}
