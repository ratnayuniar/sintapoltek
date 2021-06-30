<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jurusan');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['query'] = $this->m_jurusan->tampil_data();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('master_data/jurusan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$id_jurusan = $this->input->post('id_jurusan');

		if (empty($id_jurusan)) $this->m_jurusan->tambah_data();
		else $this->m_jurusan->ubah_data($id_jurusan);
	}

	function delete2($id_jurusan)
	{
		$delete = $this->m_jurusan->get_id_jurusan($id_jurusan);
		if ($delete) {
			$this->m_jurusan->delete($id_jurusan);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('jurusan', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('jurusan', 'refresh');
		}
	}
}
