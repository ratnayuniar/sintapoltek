<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_model extends CI_Model
{
    private $_table = "chat";

    public function getId($id = null)
    {
        return $this->db->get_where($this->_table, ['id_mahasiswabimbingan' => $id]);
    }
    public function getchatmahasiswa($id)
    {
        return $this->db->get_where('user', ["id_user" => $id])->row();
    }
    public function getPengirim($level) // level
    {
        $this->db->get_where($this->_table, ['pengirim' => $level])->result();
    }

    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }
    public function getisichat()
    {
        return $this->db->get_where('user', ["id_dosen" => 2])->result();
    }
}
