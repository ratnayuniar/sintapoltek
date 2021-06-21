<?php
class M_profile extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('mahasiswa');
    }

    function topik_user()
    {
        $this->db->where('topik.nim', $this->session->userdata('nim'));
        $query = $this->db->get('topik');
        return $query->row();
    }

    function data_mahasiswa()
    {
        $this->db->where('user.nim', $this->session->userdata('id_user'));
        return $this->db->get('user');
    }

    function get_mahasiswa()
    {
        $this->db->join('mahasiswa', 'user.nim = mahasiswa.nim', 'left');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        $this->db->where('user.id_user', $this->session->userdata('id_user'));

        $query = $this->db->get('user');
        return $query->row();
    }
}
