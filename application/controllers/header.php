<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('beranda', $data);
    }
}
