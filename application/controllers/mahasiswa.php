<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jurusan');
		$this->load->model('m_prodi2');
		$this->load->model('m_mahasiswa');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('master_data/mahasiswa', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$id_nim = $this->input->post('nim');

		$query = $this->m_mahasiswa->cek_nim($id_nim)->num_rows();
		if (empty($query))
			$this->m_mahasiswa->tambah_data();
		else
			$this->m_mahasiswa->ubah_data($id_nim);
	}

	function delete2($nim)
	{
		$delete = $this->m_mahasiswa->get_nim($nim);
		if ($delete) {
			$this->m_mahasiswa->delete($nim);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('mahasiswa', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('mahasiswa', 'refresh');
		}
	}
}
