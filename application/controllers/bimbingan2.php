<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan2 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bimbingan2');
        $this->load->model('m_dosen');
        $this->load->model('m_profile');
        $this->load->model('m_pembimbing');
        $this->load->model('m_mahasiswa');

        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bimbingan2->tampil_data();

        // dipake ini 
        $data['bimbingan_user'] = $this->m_bimbingan2->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan2->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan14_2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu14()
    {

        $data['query'] = $this->m_bimbingan2->tampil_data();

        // dipake ini 
        $data['bimbingan_user'] = $this->m_bimbingan2->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan2->bimbingan_user_dosen();

        // $data['topik_user'] = $this->m_profile->topik_user();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();

        // ini juga pake
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();

        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();

        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan14_2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_bimbingan = $this->input->post('id_bimbingan');

        if (empty($id_bimbingan)) $this->m_bimbingan2->tambah_data();
        else $this->m_bimbingan2->ubah_data($id_bimbingan);
    }

    function detail_bimbingan($nim)
    {
        $data['bimbingan'] = $this->m_bimbingan2->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bimbingan']) {
            $data['title'] = 'SINTA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bimbingan/detail_bimbingan1', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function delete_bimbingan($id)
    {
        $delete = $this->m_bimbingan2->get_id_bimbingan($id);
        if ($delete) {
            $this->m_bimbingan2->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('bimbingan2', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('bimbingan2', 'refresh');
        }
    }

    function save_topik_waiting()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('flash', 'Gagal');

        if ($this->form_validation->run() == FALSE) {
            redirect('index');
        } else {
            $data = array(
                'status' => $this->input->post('status')
            );

            $this->m_bimbingan2->update($this->input->post('id_topik'), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('topik', 'refresh');
        }
    }

    function save_komentar()
    {
        $this->form_validation->set_rules('solusi', 'Solusi', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($this->input->post('id_bimbingan')) {
                $data = array(
                    'status' => 2,
                    'solusi' => $this->input->post('solusi'),
                );
                $this->m_bimbingan2->update($this->input->post('id_bimbingan'), $data);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('bimbingan2', 'refresh');
        }
    }

    function save_close_topik()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('flash', 'Gagal');

        if ($this->form_validation->run() == FALSE) {
            redirect('index');
        } else {
            $data = array(
                'status' => $this->input->post('status')
            );

            $this->m_bimbingan2->update($this->input->post('id_bimbingan'), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('bimbingan2', 'refresh');
        }
    }

    function cetak_kartu()
    {
        $data['bimbingan_user'] = $this->m_bimbingan2->bimbingan_user();
        $data['get_dosen'] = $this->m_bimbingan2->get_dosen();
        $data['get_tanggal'] = $this->m_bimbingan2->get_tanggal();
        $data['get_mahasiswa'] = $this->m_bimbingan2->get_mahasiswa();
        $data['topik_user'] = $this->m_profile->topik_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('bimbingan/dompdf2', $data);
    }

    // public function delete()
    // {
    //     $id_topik = $this->input->post('id_topik2');
    //     $this->m_bimbingan2->hapus_data($id_topik);
    // }
}