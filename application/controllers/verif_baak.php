<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif_baak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_verif_baak');
        $this->load->model('m_jurusan');
        $this->load->model('m_prodi2');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_bks_wisuda');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_verif_baak->tampil_data();
        // $data['bks_wisuda_user'] = $this->m_verif_baak->bks_wisuda_user(); 
        $data['prodi'] = $this->m_prodi2->tampil_data();

        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_wisuda')->result();

        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/list_baak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata($id)
    {
        $data['title'] = 'SINTA PNM';
        $data['get_mahasiswa'] = $this->m_verif_baak->get_mahasiswa($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/baak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata_mhs()
    {
        $data['title'] = 'SINTA PNM';
        // $data['get_mahasiswa'] = $this->m_verif_baak->get_mahasiswa($id);
        $data['bks_wisuda_user'] = $this->m_bks_wisuda->bks_wisuda_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/baak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_perpus = $this->input->post('id_perpus');

        if (empty($id_perpus)) $this->m_verif_baak->tambah_data();
        else $this->m_verif_baak->ubah_data($id_perpus);
    }

    function save_belum($id)
    {
        $this->m_bks_wisuda->update($id, ['status_baak' => 0]);
        redirect('verif_baak', 'refresh');
    }
    function save_kurang($id)
    {
        $this->m_bks_wisuda->update($id, ['status_baak' => 1]);
        redirect('verif_baak', 'refresh');
    }

    function save_lengkap($id)
    {
        $this->m_bks_wisuda->update($id, ['status_baak' => 2]);
        redirect('verif_baak', 'refresh');
    }

    function save_tg_kurang($id)
    {
        $this->m_verif_baak->update($id, ['tanggungan_perpus' => 1]);
        redirect('veri_baak', 'refresh');
    }

    function save_tg_lengkap($id)
    {
        $this->m_verif_baak->update($id, ['tanggungan_perpus' => 2]);
        redirect('bks_wisuda', 'refresh');
    }

    function detail_keuangan()
    {
        $data['keuangan'] = $this->m_verif_baak->get_nim();
        $data['keuangan_user'] = $this->m_verif_baak->keuangan_user();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['keuangan_user']) {
            $data['title'] = 'Detail Berkas' . $data['perpustakaan']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('perpustakaan/detail_keuangan', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function detail_foto($nim)
    {
        $data['bks_wisuda'] = $this->m_bks_wisuda->get_nim($nim);

        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();

        if ($data['bks_wisuda']) {
            $data['title'] = 'Detail Berkas' . $data['bks_wisuda']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_baak', $data);
            $this->load->view('templates/footer', $data);
        }
    }



    function detail_mahasiswa($nim)
    {
        $data['mahasiswa'] = $this->m_verif->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_seminar']) {
            $data['title'] = 'Detail Berkas' . $data['bks_seminar']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_seminar', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
