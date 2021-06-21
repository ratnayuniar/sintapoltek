<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_topik');
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['query'] = $this->m_topik->tampil_data();
		$data['topik_user'] = $this->m_topik->topik_user();
		$data['topik_dosen'] = $this->m_topik->topik_dosen();


		$data['title'] = 'SINTA PNM';
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')],
		)->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('ajukan_topik/topik', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$id_topik = $this->input->post('id_topik');

		if (empty($id_topik)) $this->m_topik->tambah_data();
		else $this->m_topik->ubah_data($id_topik);
	}

	public function delete()
	{
		$id_topik = $this->input->post('id_topik2');
		$this->m_topik->hapus_data($id_topik);
	}

	function detail_topik($nim)
	{
		$data['topik'] = $this->m_topik->get_nim($nim);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		if ($data['topik']) {
			$data['title'] = 'Detail Topik' . $data['topik']->nim;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('ajukan_topik/detail_topik', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	function delete_topik($id)
	{
		$delete = $this->m_topik->get_id_topik($id);
		if ($delete) {
			$this->m_topik->delete($id);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('topik', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('topik', 'refresh');
		}
	}

	function save_topik_waiting()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_error_delimiters('flash', 'Gagal');

		// $this->form_validation->set_message('required', '{field}Harus di isi');
		// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			redirect('index');
		} else {
			$data = array(
				'status' => $this->input->post('status')
			);

			$this->m_topik->update($this->input->post('id_topik'), $data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
			redirect('topik', 'refresh');
		}
	}

	function save_komentar()
	{
		$this->form_validation->set_rules('komentar', 'Komentar', 'trim|required');

		$this->form_validation->set_message('required', '{field}Harus di isi');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			if ($this->input->post('id_topik')) {
				$data = array(
					'status' => 2,
					'komentar' => $this->input->post('komentar'),
				);
				$this->m_topik->update($this->input->post('id_topik'), $data);
			}
			// $data = array(
			// 	'topik_id' => $this->input->post('id_topik'),
			// 	'komentar' => $this->input->post('komentar'),
			// 	'waktu_komentar' => date('Y-m-d'),
			// );

			// $this->m_topik->insert_komentar($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
			redirect('topik', 'refresh');
		}
	}

	function save_close_topik()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_error_delimiters('flash', 'Gagal');

		// $this->form_validation->set_message('required', '{field}Harus di isi');
		// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			redirect('index');
		} else {
			$data = array(
				'status' => $this->input->post('status')
			);

			$this->m_topik->update($this->input->post('id_topik'), $data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
			redirect('topik', 'refresh');
		}
	}

	function save_tolak_topik()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_error_delimiters('flash', 'Gagal');

		// $this->form_validation->set_message('required', '{field}Harus di isi');
		// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			redirect('index');
		} else {
			$data = array(
				'status' => $this->input->post('status')
			);

			$this->m_topik->update($this->input->post('id_topik'), $data);

			$this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
			redirect('topik', 'refresh');
		}
	}
}
