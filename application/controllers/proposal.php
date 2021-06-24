<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_proposal');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_proposal->tampil_data();
        // $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        $data['proposal_user'] = $this->m_proposal->proposal_user();

        $data['title'] = 'SINTA PNM';
        // $data['user'] = $this->db->get_where(
        //     'user',
        //     ['email' => $this->session->userdata('email')],
        // )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proposal/add_proposal', $data);
        $this->load->view('templates/footer', $data);
    }


    public function add()
    {
        $id_proposal = $this->input->post('id_proposal');

        if (empty($id_proposal)) $this->m_proposal->tambah_data();
        else $this->m_proposal->ubah_data($id_proposal);
    }
    function cetak_kartu()
    {
        $data['query'] = $this->m_proposal->tampil_data();
        $data['proposal_user'] = $this->m_proposal->proposal_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('proposal/proposal2', $data);
    }
}
