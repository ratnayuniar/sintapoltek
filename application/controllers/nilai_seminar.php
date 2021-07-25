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
		// $data['query3'] = $this->m_penguji->getNilaiSempro();
		$data['query2'] = $this->m_penguji->bimbingan_mhs();
		$data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
		$data['dosen'] = $this->m_mahasiswa->getdosen();
		$data['query'] = $this->m_nilai_seminar->tampil_data();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('nilai/nilai_seminar', $data);
		$this->load->view('templates/footer', $data);

		// echo json_encode($data['query3']->result());
	}

	function detail_nilai_seminar($nim)
	{
		$data['nilai_sempro'] = $this->m_nilai_seminar->get_nim($nim);

		$data['id'] = $nim;
		if ($data['nilai_sempro']) {
			$data['title'] = 'Detail Berkas' . $data['nilai_sempro']->nim;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('nilai/detail_nilai_seminar', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	
	function detail_nilai_seminar2($nim) 
	{
	 $data['title'] = 'SINTA PNM';
	 $data['nim'] = $nim;
	 $data['query'] = $this->m_nilai_seminar->tampil_data2($nim);
	 $data['query3'] = $this->m_penguji->bimbingan_dosen();
   
	 
	  $this->load->view('templates/header', $data);
	  $this->load->view('templates/sidebar', $data);
	  $this->load->view('nilai/detail_nilai_seminar2', $data);
	  $this->load->view('templates/footer', $data);
	 
	}

	public function add()
	{
		$this->m_nilai_seminar->tambah_data();
	}
}
