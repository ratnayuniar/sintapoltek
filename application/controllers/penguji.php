<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penguji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dosen');
        $this->load->model('m_penguji');
        $this->load->model('m_mahasiswa');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query3'] = $this->m_penguji->bimbingan_dosen();
        $data['query2'] = $this->m_penguji->bimbingan_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();

        //lama
        $data['query'] = $this->m_penguji->tampil_data();

        $data['title'] = 'SINTA PNM';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembimbing/penguji', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_penguji->tambah_data();
        else $this->m_penguji->ubah_data($nim);
    }

    public function delete()
    {
        $id_penguji = $this->input->post('id_penguji2');
        $this->m_penguji->hapus_data($id_penguji);
    }



    function delete_penguji($id)
    {
        $delete = $this->m_penguji->get_id_penguji($id);
        if ($delete) {
            $this->m_penguji->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('penguji', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('penguji', 'refresh');
        }
    }
}
