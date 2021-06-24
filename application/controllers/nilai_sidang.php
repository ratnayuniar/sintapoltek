<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sidang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal_seminar');
		$this->load->model('m_nilai_sidang');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_penguji_sidang');
		$this->load->model('m_pembimbing');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
		$data['query2'] = $this->m_penguji_sidang->bimbingan_mhs();
		$data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
		$data['dosen'] = $this->m_mahasiswa->getdosen();
		$data['query'] = $this->m_nilai_sidang->tampil_data();
		$data['title'] = 'SINTA PNM';


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('nilai/nilai_sidang', $data);
		$this->load->view('templates/footer', $data);
	}

	function detail_nilai_sidang($nim)
	{
		$data['nilai_sidang'] = $this->m_nilai_sidang->get_nim($nim);

		$data['id'] = $nim;
		if ($data['nilai_sidang']) {
			$data['title'] = 'Detail Berkas' . $data['nilai_sidang']->nim;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('nilai/detail_nilai_sidang', $data);
			$this->load->view('templates/footer', $data);
		}
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


	function detail_nilai_sidang2()
	{
		$data['title'] = 'SINTA PNM';
		$data['nim'] = $this->input->get('id');
		$data['query'] = $this->m_nilai_sidang->tampil_data2($data['nim']);
		$data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('nilai/detail_nilai_sidang', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$this->m_nilai_sidang->tambah_data();
	}
}
