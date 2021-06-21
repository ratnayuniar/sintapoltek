<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_dosen extends CI_Controller
{

    public function index()
    {

        $data['title'] = 'Dosen';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dosen/bimbingan_dosen', $data);
        $this->load->view('templates/footer', $data);
    }
}
