<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dosen');
		$this->load->model('m_prodi2');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['query'] = $this->m_dosen->tampil_data();
		$data['dosen'] = $this->m_dosen->getdosen();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('master_data/dosen', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$id_dosen = $this->input->post('id_dosen');

		if (empty($id_dosen)) $this->m_dosen->tambah_data();
		else $this->m_dosen->ubah_data($id_dosen);
	}

	function delete2($id_dosen)
	{
		$delete = $this->m_dosen->get_id_dosen($id_dosen);
		if ($delete) {
			$this->m_dosen->delete($id_dosen);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('dosen', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('dosen', 'refresh');
		}
	}

	// public function delete()
	// {
	// 	$id_dosen = $this->input->post('id_dosen2');
	// 	$this->m_dosen->hapus_data($id_dosen);
	// }
}
