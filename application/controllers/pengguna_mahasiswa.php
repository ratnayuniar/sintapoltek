<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_mahasiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengguna_mahasiswa');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->m_pengguna_mahasiswa->tampil_data_mhs();

        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/mahasiswa', $data);
        $this->load->view('templates/footer', $data);
    }
}
