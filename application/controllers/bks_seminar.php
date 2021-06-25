<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_seminar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_bks_seminar');
		$this->load->helper('url');
		$this->load->helper("file");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['query'] = $this->m_bks_seminar->tampil_data();

		$data['bks_seminar_user'] = $this->m_bks_seminar->bks_seminar_user();
		// $data['bks_seminar_admin'] = $this->m_bks_seminar->bks_seminar_admin();

		$data['title'] = 'SINTA PNM';
		$data['data'] = $this->db->get('seminar_proposal')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('berkas/bks_seminar', $data);
		$this->load->view('templates/footer', $data);
	}

	function save_bks_belum($id)
	{
		$this->m_bks_seminar->update($id, ['status' => 1]);
		redirect('bks_seminar', 'refresh');
	}

	function save_bks_kurang($id)
	{
		$this->m_bks_seminar->update($id, ['status' => 2]);
		redirect('bks_seminar', 'refresh');
	}

	function save_bks_lengkap($id)
	{
		$this->m_bks_seminar->update($id, ['status' => 3]);
		redirect('bks_seminar', 'refresh');
	}

	function detail_bks_seminar($nim)
	{
		$data['bks_seminar'] = $this->m_bks_seminar->get_nim($nim);

		if ($data['bks_seminar']) {
			$data['title'] = 'Detail Berkas' . $data['bks_seminar']->nim;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('berkas/detail_bks_seminar', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'pdf|jpg|png|jpeg|mp4|doc|docx|ppt|pptx';
			$config['max_size']  = 5000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			// $config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			if (!empty($_FILES['berita_acara'])) {
				$this->upload->do_upload('berita_acara');
				$data1 = $this->upload->data();
				$berita_acara = $data1['file_name'];
			}

			if (!empty($_FILES['persetujuan'])) {
				$this->upload->do_upload('persetujuan');
				$data2 = $this->upload->data();
				$persetujuan = $data2['file_name'];
			}

			if (!empty($_FILES['proposal'])) {
				$this->upload->do_upload('proposal');
				$data3 = $this->upload->data();
				$proposal = $data3['file_name'];
			}

			if (!empty($_FILES['presentasi'])) {
				$this->upload->do_upload('presentasi');
				$data4 = $this->upload->data();
				$presentasi = $data4['file_name'];
			}

			if (!empty($_FILES['monitoring'])) {
				$this->upload->do_upload('monitoring');
				$data5 = $this->upload->data();
				$monitoring = $data5['file_name'];
			}

			if ($this->form_validation->run()) {
				$nim = $this->input->post('nim', TRUE);
				$data = [
					'nim' => $nim,
					'id_nilai_sempro' => null,
					'berita_acara' => $berita_acara,
					'persetujuan' => $persetujuan,
					'proposal' => $proposal,
					'presentasi' => $presentasi,
					'monitoring' => $monitoring,
					'status' => 0,

				];
				// print_r($data);
				// exit();

				$insert = $this->db->insert('seminar_proposal', $data);
				if ($insert) {
					$this->session->set_flashdata('pesan', 'disimpan');
					redirect('bks_seminar');
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function delete_users($id_seminar_proposal)
	{
		$data = $this->m_bks_seminar->ambil_id_gambar($id_seminar_proposal);
		// lokasi gambar berada
		$path = './assets/berkas/seminar/';
		@unlink($path . $data->berita_acara); // hapus data di folder dimana data tersimpan
		@unlink($path . $data->persetujuan); // hapus data di folder dimana data tersimpan
		@unlink($path . $data->proposal);
		@unlink($path . $data->presentasi);
		@unlink($path . $data->monitoring);
		if ($this->m_bks_seminar->delete_users($id_seminar_proposal) == TRUE) {
			// TAMPILKAN PESAN JIKA BERHASIL
			$this->session->set_flashdata('pesan', 'dihapus');
		}
		redirect('bks_seminar'); 
	}
}
