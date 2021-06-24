<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_sidang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_bks_sidang');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['query'] = $this->m_bks_sidang->tampil_data();

		$data['bks_sidang_user'] = $this->m_bks_sidang->bks_sidang_user();
		// $data['bks_sidang_admin'] = $this->m_bks_sidang->bks_sidang_admin();

		$data['title'] = 'SINTA PNM';
		$data['data'] = $this->db->get('seminar_ta')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('berkas/bks_sidang', $data);
		$this->load->view('templates/footer', $data);
	}

	function save_bks_belum($id)
	{
		$this->m_bks_sidang->update($id, ['status' => 1]);
		redirect('bks_sidang', 'refresh');
	}

	function save_bks_kurang($id)
	{
		$this->m_bks_sidang->update($id, ['status' => 2]);
		redirect('bks_sidang', 'refresh');
	}

	function save_bks_lengkap($id)
	{
		$this->m_bks_sidang->update($id, ['status' => 3]);
		redirect('bks_sidang', 'refresh');
	}

	function detail_bks_sidang($nim)
	{
		$data['bks_sidang'] = $this->m_bks_sidang->get_nim($nim);

		if ($data['bks_sidang']) {
			$data['title'] = 'Detail Berkas' . $data['bks_sidang']->nim;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('berkas/detail_bks_sidang', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/sidang/';
			$config['allowed_types'] = 'pdf|jpg|png|doc|docx|ppt';
			$config['max_size']  = 2048;
			$config['file_name'] = 'bks_sidang-' . date('ymd');
			// $config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			if (!empty($_FILES['proposal'])) {
				$this->upload->do_upload('proposal');
				$data1 = $this->upload->data();
				$proposal = $data1['file_name'];
			}

			if (!empty($_FILES['pkkmb'])) {
				$this->upload->do_upload('pkkmb');
				$data2 = $this->upload->data();
				$pkkmb = $data2['file_name'];
			}

			if (!empty($_FILES['pengesahan'])) {
				$this->upload->do_upload('pengesahan');
				$data3 = $this->upload->data();
				$pengesahan = $data3['file_name'];
			}

			if (!empty($_FILES['monitoring'])) {
				$this->upload->do_upload('monitoring');
				$data4 = $this->upload->data();
				$monitoring = $data4['file_name'];
			}

			if (!empty($_FILES['persetujuan'])) {
				$this->upload->do_upload('persetujuan');
				$data5 = $this->upload->data();
				$persetujuan = $data5['file_name'];
			}

			if ($this->form_validation->run()) {
				$nim = $this->input->post('nim', TRUE);
				$data = [
					'nim' => $nim,
					'id_nilai_ta' => null,
					'proposal' => $proposal,
					'pkkmb' => $pkkmb,
					'pengesahan' => $pengesahan,
					'monitoring' => $monitoring,
					'persetujuan' => $persetujuan,
					'status' => 0,
				];
				// print_r($data);
				// exit();
				// var_dump($data);
				$insert = $this->db->insert('seminar_ta', $data);
				if ($insert) {
					$this->session->set_flashdata('pesan', 'disimpan');
					redirect('bks_sidang');
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function delete_berkas($id_bks_sidang)
	{
		$data = $this->m_bks_sidang->ambil_id_gambar($id_bks_sidang);
		// lokasi gambar berada
		$path = './assets/berkas/sidang/';
		@unlink($path . $data->berita_acara); // hapus data di folder dimana data tersimpan
		@unlink($path . $data->persetujuan); // hapus data di folder dimana data tersimpan
		@unlink($path . $data->proposal);
		@unlink($path . $data->presentasi);
		@unlink($path . $data->monitoring);
		if ($this->m_bks_sidang->delete_users($id_bks_sidang) == TRUE) {
			// TAMPILKAN PESAN JIKA BERHASIL
			$this->session->set_flashdata('pesan', 'dihapus');
		}
		redirect('bks_sidang');
	}
}
