<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_seminar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal_seminar');
		$this->load->model('m_mahasiswa');
		$this->load->helper('url');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data['query'] = $this->m_jadwal_seminar->tampil_data();
		$data['jadwal_seminar_user'] = $this->m_jadwal_seminar->jadwal_seminar_user();
		$data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jadwal/jadwal_seminar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_jadwal_seminar->tambah_data();
		else $this->m_jadwal_seminar->ubah_data($nim);
	}

	function delete2($id_jadwal)
	{
		$delete = $this->m_jadwal_seminar->get_id_jadwal($id_jadwal);
		if ($delete) {
			$this->m_jadwal_seminar->delete($id_jadwal);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('jadwal_seminar', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('jadwal_seminar', 'refresh');
		}
	}

	// public function delete()
	// {
	// 	$id_jadwal = $this->input->post('id_jadwal2');
	// 	$this->m_jadwal_seminar->hapus_data($id_jadwal);
	// }
}
