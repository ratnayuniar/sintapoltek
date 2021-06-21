<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_prodi');
		$this->load->model('m_jurusan');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['id_jurusan'] = $this->input->get('id');
		$data['query'] = $this->m_prodi->tampil_data($data['id_jurusan']);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('master_data/prodi', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$this->m_prodi->tambah_data();
	}

	public function delete()
	{
		$id_prodi = $this->input->post('id_prodi2');
		$this->m_prodi->hapus_data($id_prodi);
	}
}
