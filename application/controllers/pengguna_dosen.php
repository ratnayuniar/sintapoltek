<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_dosen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengguna_dosen');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['pengguna_dosen'] = $this->m_pengguna_dosen->tampil_data_dosen();
        $data['title'] = 'SINTA PNM';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/dosen', $data);
        $this->load->view('templates/footer', $data);
    }
}
