<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_profile');
        $this->load->model('m_prodi2');
        $this->load->model('m_topik');
        $this->load->helper('url');
    }

    public function index()
    {

        $data['query'] = $this->m_profile->tampil_data();
        $data['topik_user'] = $this->m_profile->topik_user();
        $data['get_mahasiswa'] = $this->m_profile->get_mahasiswa();
        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer', $data);
    }
}
