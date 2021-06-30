<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Veri_perpus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_veri_perpus');
        $this->load->model('m_jurusan');
        $this->load->model('m_prodi2');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_bks_wisuda');

        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_veri_perpus->tampil_data();
        $data['prodi'] = $this->m_prodi2->tampil_data();
        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_wisuda')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/list_perpus', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata($id)
    {
        $data['title'] = 'SINTA PNM';
        $data['get_mahasiswa'] = $this->m_veri_perpus->get_mahasiswa($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/perpustakaan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata_mhs()
    {
        $data['title'] = 'SINTA PNM';
        // $data['get_mahasiswa'] = $this->m_veri_perpus->get_mahasiswa($id);
        $data['bks_wisuda_user'] = $this->m_bks_wisuda->bks_wisuda_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/perpustakaan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_perpus = $this->input->post('id_perpus');

        if (empty($id_perpus)) $this->m_veri_perpus->tambah_data();
        else $this->m_veri_perpus->ubah_data($id_perpus);
    }

    function save_lap_belum($id)
    {
        $this->m_veri_perpus->update($id, ['laporan_perpus' => 0]);
        redirect('veri_perpus', 'refresh');
    }
    function save_lap_kurang($id)
    {
        $this->m_veri_perpus->update($id, ['laporan_perpus' => 1]);
        redirect('veri_perpus', 'refresh');
    }

    function save_lap_lengkap($id)
    {
        $this->m_veri_perpus->update($id, ['laporan_perpus' => 2]);
        redirect('veri_perpus', 'refresh');
    }

    function save_tg_belum($id)
    {
        $this->m_veri_perpus->update($id, ['tanggungan_perpus' => 0]);
        redirect('veri_perpus', 'refresh');
    }
    function save_tg_kurang($id)
    {
        $this->m_veri_perpus->update($id, ['tanggungan_perpus' => 1]);
        redirect('veri_perpus', 'refresh');
    }

    function save_tg_lengkap($id)
    {
        $this->m_veri_perpus->update($id, ['tanggungan_perpus' => 2]);
        redirect('veri_perpus', 'refresh');
    }

    function detail_perpus($nim)
    {
        $data['perpustakaan'] = $this->m_veri_perpus->get_nim($nim);

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
