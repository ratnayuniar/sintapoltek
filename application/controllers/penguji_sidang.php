<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penguji_sidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dosen');
        $this->load->model('m_penguji_sidang');
        $this->load->model('m_mahasiswa');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
        $data['query2'] = $this->m_penguji_sidang->bimbingan_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->tampilmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();

        //lama
        $data['query'] = $this->m_penguji_sidang->tampil_data();
        // $data['penguji_user'] = $this->m_penguji_sidang->penguji_user();
        // $data['dosen_user'] = $this->m_penguji_sidang->dosen_user();
        $data['title'] = 'SINTA PNM';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembimbing/penguji_sidang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_penguji_sidang->tambah_data();
        else $this->m_penguji_sidang->ubah_data($nim);
    }

    public function delete()
    {
        $id_penguji_sidang = $this->input->post('id_penguji_sidang2');
        $this->m_penguji_sidang->hapus_data($id_penguji_sidang);
    }



    function delete_penguji($id)
    {
        $delete = $this->m_penguji_sidang->get_id_penguji_sidang($id);
        if ($delete) {
            $this->m_penguji_sidang->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('penguji', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('penguji', 'refresh');
        }
    }
}
