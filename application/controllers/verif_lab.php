<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif_lab extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_verif_lab');
        $this->load->model('m_jurusan');
        $this->load->model('m_prodi2');
        $this->load->model('m_mahasiswa');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_verif_lab->tampil_data();
        // $data['query2'] = $this->m_verif_lab->tampil2();


        // $data['bks_seminar_user'] = $this->m_verif_lab->bks_seminar_user();

        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_wisuda')->result();

        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/lab', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_perpus = $this->input->post('id_perpus');

        if (empty($id_perpus)) $this->m_verif_lab->tambah_data();
        else $this->m_verif_lab->ubah_data($id_perpus);
    }

    function save_lab_belum($id)
    {
        $this->m_verif_lab->update($id, ['pinjaman_alat' => 0]);
        redirect('verif_lab', 'refresh');
    }
    function save_lab_kurang($id)
    {
        $this->m_verif_lab->update($id, ['pinjaman_alat' => 1]);
        redirect('verif_lab', 'refresh');
    }

    function save_lab_lengkap($id)
    {
        $this->m_verif_lab->update($id, ['pinjaman_alat' => 2]);
        redirect('verif_lab', 'refresh');
    }

    function save_tg_belum($id)
    {
        $this->m_verif_lab->update($id, ['tanggungan_perpus' => 0]);
        redirect('verif_lab', 'refresh');
    }
    function save_tg_kurang($id)
    {
        $this->m_verif_lab->update($id, ['tanggungan_perpus' => 1]);
        redirect('verif_lab', 'refresh');
    }

    function save_tg_lengkap($id)
    {
        $this->m_verif_lab->update($id, ['tanggungan_perpus' => 2]);
        redirect('verif_lab', 'refresh');
    }

    function detail_perpus($nim)
    {
        $data['perpustakaan'] = $this->m_verif_lab->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['perpustakaan']) {
            $data['title'] = 'Detail Berkas' . $data['perpustakaan']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('perpustakaan/detail_perpus', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}