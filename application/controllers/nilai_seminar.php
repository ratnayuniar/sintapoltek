<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_seminar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal_seminar');
		$this->load->model('m_nilai_seminar');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_penguji');
		$this->load->model('m_pembimbing');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['query3'] = $this->m_penguji->bimbingan_dosen();
		$data['query2'] = $this->m_penguji->bimbingan_mhs();
		$data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
		$data['dosen'] = $this->m_mahasiswa->getdosen();
		$data['query'] = $this->m_nilai_seminar->tampil_data();
		$data['title'] = 'SINTA PNM';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('nilai/nilai_seminar', $data);
		$this->load->view('templates/footer', $data);
	}

	function detail_nilai_seminar($id_mahasiswa)
	{
		$data['nilai_seminar'] = $this->m_nilai_seminar->get_nim($id_mahasiswa);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['id'] = $id_mahasiswa;
		if ($data['nilai_seminar']) {
			$data['title'] = 'Detail Berkas' . $data['nilai_seminar']->id_mahasiswa;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('nilai/detail_nilai_seminar', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	function detail_nilai_seminar2()
	{
		$data['title'] = 'SINTA PNM';
		$data['nim'] = $this->input->get('id');
		$data['query'] = $this->m_nilai_seminar->tampil_data2($data['nim']);
		$data['query3'] = $this->m_penguji->bimbingan_dosen();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('nilai/detail_nilai_seminar', $data);
		$this->load->view('templates/footer', $data);
	}
	public function add()
	{
		$this->m_nilai_seminar->tambah_data();
	}
}
