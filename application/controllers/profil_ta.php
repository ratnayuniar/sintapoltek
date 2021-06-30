<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_ta extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_bimbingan1');
        $this->load->model('m_dosen');
        $this->load->model('m_profile');
        $this->load->model('m_pembimbing');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_penguji');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query2'] = $this->m_penguji->bimbingan_mhs();
        $data['query_pembimbing'] = $this->m_pembimbing->bimbingan_mhs();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profil_ta', $data);
        $this->load->view('templates/footer', $data);
    }
}
