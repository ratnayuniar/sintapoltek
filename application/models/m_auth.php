<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public $id = 'id_user';

    function insert($data)
    {
        $this->db->insert('user', $data);
    }

    function get_email_user($id)
    {
        $this->db->where('email', $id);
        $this->db->or_where('nim', $id);
        return $this->db->get('user')->row();
    }
    function get_jurusan($id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->get('jurusan')->row();
    }
    function get_prodi($id)
    {
        $this->db->where('id_prodi', $id);
        return $this->db->get('prodi')->row();
    }

    function get_mahasiswa($id)
    {
        $this->db->where('nim', $id);
        return $this->db->get('mahasiswa')->row();
    }
    function get_dosen($id)
    {
        $this->db->where('id_dosen', $id);
        return $this->db->get('dosen')->row();
    }

    function auth_dosen($email, $password)
    {
        $sql = $this->db->query("SELECT * FROM dosen WHERE email = '$email' AND password = md5('$password') LIMIT 1");
        return $sql;
    }

    function auth_mahasiswa($email, $password)
    {
        $sql = $this->db->query("SELECT * FROM mahasiswa WHERE nim = '$email' AND password = md5('$password') LIMIT 1");
        return $sql;
    }

    function logged_id()
    {
        return $this->session->userdata('email');
    }
}
