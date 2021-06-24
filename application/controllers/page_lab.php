<?php
class Page_lab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //user bukan level 'Manager' ditolak
        if ($this->session->userdata('level') !== '8') {
            redirect('auth/logout', 'refresh');
        }
    }

    function index()
    {
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('beranda', $data);
        $this->load->view('templates/footer', $data);
    }
}
