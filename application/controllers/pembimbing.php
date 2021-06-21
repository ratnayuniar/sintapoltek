<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dosen');
        $this->load->model('m_pembimbing');
        $this->load->model('m_mahasiswa');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query'] = $this->m_pembimbing->tampil_data();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();

        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['dosen_user'] = $this->m_pembimbing->dosen_user();
        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembimbing/pembimbing', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_master_ta = $this->input->post('id_master_ta');

        if (empty($id_master_ta)) $this->m_pembimbing->tambah_data();
        else $this->m_pembimbing->ubah_data($id_master_ta);
    }

    public function delete()
    {
        $id_master_ta = $this->input->post('id_master_ta2');
        $this->m_pembimbing->hapus_data($id_master_ta);
    }

    function delete_pembimbing($id)
    {
        $delete = $this->m_pembimbing->get_id_pembimbing($id);
        if ($delete) {
            $this->m_pembimbing->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('pembimbing', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('pembimbing', 'refresh');
        }
    }

    function get_id_dosen()
    {
        $id_dosen = $this->input->post('id_dosen');
        $data = $this->m_pembimbing->get_id_pembimbing($id_dosen);
        echo json_encode($data);
    }
}
