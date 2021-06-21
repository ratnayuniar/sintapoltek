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
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proposal/add_proposal', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu14()
    {

        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        $data['topik_user'] = $this->m_profile->topik_user();


        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_proposal = $this->input->post('id_proposal');

        if (empty($id_proposal)) $this->m_proposal->tambah_data();
        else $this->m_proposal->ubah_data($id_proposal);
    }

    public function delete()
    {
        $id_topik = $this->input->post('id_topik2');
        $this->m_bimbingan1->hapus_data($id_topik);
    }

    function detail_bimbingan($nim)
    {
        $data['bimbingan'] = $this->m_bimbingan1->get_nim($nim);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bimbingan']) {
            $data['title'] = 'Detail Topik' . $data['bimbingan']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bimbingan/detail_bimbingan1', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function delete_bimbingan($id)
    {
        $delete = $this->m_bimbingan1->get_id_bimbingan($id);
        if ($delete) {
            $this->m_bimbingan1->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('bimbingan1', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('bimbingan1', 'refresh');
        }
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

    function halaman_cetak($id_proposal)
    {
        $data['proposal'] = $this->m_proposal->get_id($id_proposal);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_keterampilan']) {

            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('proposal/halaman_cetak', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
