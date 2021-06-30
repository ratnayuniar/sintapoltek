<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jurusan');
        $this->load->model('m_prodi2');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query'] = $this->m_prodi2->tampil_data();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master_data/prodi2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_prodi = $this->input->post('id_prodi');

        if (empty($id_prodi)) $this->m_prodi2->tambah_data();
        else $this->m_prodi2->ubah_data($id_prodi);
    }

    function delete2($id_prodi)
    {
        $delete = $this->m_prodi2->get_id_prodi($id_prodi);
        if ($delete) {
            $this->m_prodi2->delete($id_prodi);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
            redirect('prodi2', 'refresh');
        } else {
            $this->session->set_flashdata('pesan', 'Data Tidak ada');
            redirect('prodi2', 'refresh');
        }
    }

    // public function delete()
    // {
    //     $id_prodi = $this->input->post('id_prodi2');
    //     $this->m_prodi2->hapus_data($id_prodi);
    // }
}
