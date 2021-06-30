<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Revisi_upload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal_seminar');
        $this->load->model('m_nilai_seminar');
        $this->load->model('m_revisi_sidang');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_penguji_sidang');
        $this->load->model('m_pembimbing');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
        $data['query2'] = $this->m_revisi_sidang->revisi_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['query'] = $this->m_nilai_seminar->tampil_data();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/revisi_upload', $data);
        $this->load->view('templates/footer', $data);
    }

    function revisi_mahasiswa($nim)
    {
        $data['revisi_seminar'] = $this->m_revisi_sidang->get_nim($nim);

        $data['id'] = $nim;
        if ($data['revisi_seminar']) {
            $data['title'] = 'Detail Berkas' . $data['revisi_seminar']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('revisi/revisi_seminar', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    function detail_revisi_sidang2()
    {
        $data['title'] = 'SINTA PNM';
        $data['nim'] = $this->input->get('id');
        $data['query'] = $this->m_nilai_seminar->tampil_data2($data['nim']);
        $data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/detail_revisi_sidang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function add()
    {
        $this->m_revisi_sidang->tambah_data();
    }
}
