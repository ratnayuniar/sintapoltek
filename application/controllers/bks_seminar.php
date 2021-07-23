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
		$data['title'] = 'SINTA PNM';
		$data['data'] = $this->db->get('seminar_proposal')->result();
		$data['bks_seminar'] = $this->db->query('select * from seminar_proposal')->row();

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

	function save_($id)
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

	public function upload_beritaacara()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'doc|docx';
			$config['max_size']  = 50000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			$ekstensi =  array('doc', 'docx');

			$this->load->library('upload', $config);

			if (!empty($_FILES['berita_acara'])) {
				$this->upload->do_upload('berita_acara');
				$data1 = $this->upload->data();
				$berita_acara = $data1['file_name'];
				$tipe_file = pathinfo($berita_acara, PATHINFO_EXTENSION);
			}

			if ($this->form_validation->run()) {
				if (!in_array($tipe_file, $ekstensi)) {
					$this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
					redirect('bks_seminar');
				} else {
					$nim = $this->input->post('nim', TRUE);
					$data = [
						'nim' => $nim,
						'berita_acara' => $berita_acara,
						'st_beritaacara' => 0,

					];

					$cek = $this->db->like('nim', $data['nim'])->from('seminar_proposal')->count_all_results();

					if ($cek > 0) {
						$this->db->where('nim', $data['nim'])->update('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					} else {
						$this->db->insert('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					}
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function upload_persetujuan()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'doc|docx';
			$config['max_size']  = 50000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			$ekstensi =  array('doc', 'docx');

			$this->load->library('upload', $config);

			if (!empty($_FILES['persetujuan'])) {
				$this->upload->do_upload('persetujuan');
				$data1 = $this->upload->data();
				$persetujuan = $data1['file_name'];
				$tipe_file = pathinfo($persetujuan, PATHINFO_EXTENSION);
			}

			if ($this->form_validation->run()) {
				if (!in_array($tipe_file, $ekstensi)) {
					$this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
					redirect('bks_seminar');
				} else {
					$nim = $this->input->post('nim', TRUE);
					$data = [
						'nim' => $nim,
						'persetujuan' => $persetujuan,
						'st_persetujuan' => 0,

					];

					$cek = $this->db->like('nim', $data['nim'])->from('seminar_proposal')->count_all_results();

					if ($cek > 0) {
						$this->db->where('nim', $data['nim'])->update('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					} else {
						$this->db->insert('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					}
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function upload_proposal()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']  = 50000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			$ekstensi =  array('pdf');

			$this->load->library('upload', $config);

			if (!empty($_FILES['proposal'])) {
				$this->upload->do_upload('proposal');
				$data1 = $this->upload->data();
				$proposal = $data1['file_name'];
				$tipe_file = pathinfo($proposal, PATHINFO_EXTENSION);
			}

			if ($this->form_validation->run()) {
				if (!in_array($tipe_file, $ekstensi)) {
					$this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
					redirect('bks_seminar');
				} else {
					$nim = $this->input->post('nim', TRUE);
					$data = [
						'nim' => $nim,
						'proposal' => $proposal,
						'st_proposal' => 0,

					];

					$cek = $this->db->like('nim', $data['nim'])->from('seminar_proposal')->count_all_results();

					if ($cek > 0) {
						$this->db->where('nim', $data['nim'])->update('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					} else {
						$this->db->insert('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					}
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function upload_presentasi()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'ppt|pptx';
			$config['max_size']  = 50000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			$ekstensi =  array('ppt', 'pptx');

			$this->load->library('upload', $config);

			if (!empty($_FILES['presentasi'])) {
				$this->upload->do_upload('presentasi');
				$data1 = $this->upload->data();
				$presentasi = $data1['file_name'];
				$tipe_file = pathinfo($presentasi, PATHINFO_EXTENSION);
			}

			if ($this->form_validation->run()) {
				if (!in_array($tipe_file, $ekstensi)) {
					$this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
					redirect('bks_seminar');
				} else {
					$nim = $this->input->post('nim', TRUE);
					$data = [
						'nim' => $nim,
						'presentasi' => $presentasi,
						'st_presentasi' => 0,

					];

					$cek = $this->db->like('nim', $data['nim'])->from('seminar_proposal')->count_all_results();

					if ($cek > 0) {
						$this->db->where('nim', $data['nim'])->update('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					} else {
						$this->db->insert('seminar_ta', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					}
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function upload_monitoring()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$config['upload_path'] = './assets/berkas/seminar/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']  = 50000;
			$config['file_name'] = 'bks_seminar-' . date('ymd');
			$ekstensi =  array('pdf');

			$this->load->library('upload', $config);

			if (!empty($_FILES['monitoring'])) {
				$this->upload->do_upload('monitoring');
				$data1 = $this->upload->data();
				$monitoring = $data1['file_name'];
				$tipe_file = pathinfo($monitoring, PATHINFO_EXTENSION);
			}

			if ($this->form_validation->run()) {
				if (!in_array($tipe_file, $ekstensi)) {
					$this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
					redirect('bks_seminar');
				} else {
					$nim = $this->input->post('nim', TRUE);
					$data = [
						'nim' => $nim,
						'monitoring' => $monitoring,
						'st_monitoring' => 0,

					];

					$cek = $this->db->like('nim', $data['nim'])->from('seminar_proposal')->count_all_results();

					if ($cek > 0) {
						$this->db->where('nim', $data['nim'])->update('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					} else {
						$this->db->insert('seminar_proposal', $data);
						$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
						redirect('bks_seminar');
					}
				}
			} else {
				$this->index();
			}
		} else {
			$this->index();
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

	public function verif_fileta()
	{
		$id_seminar_proposal = $this->input->post('id_seminar_proposal');

		if (empty($id_seminar_proposal)) $this->m_bks_seminar->tambah_data();
		else $this->m_bks_seminar->ubah_data($id_seminar_proposal);
	}

	public function verif_persetujuan()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_bks_seminar->tambah_data();
		else $this->m_bks_seminar->ubah_data2($nim);
	}

	public function verif_proposal()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_bks_seminar->tambah_data();
		else $this->m_bks_seminar->ubah_data3($nim);
	}

	public function verif_monitoring()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_bks_seminar->tambah_data();
		else $this->m_bks_seminar->ubah_data4($nim);
	}

	public function verif_presentasi()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_bks_seminar->tambah_data();
		else $this->m_bks_seminar->ubah_data5($nim);
	}

	public function delete_users($id_seminar_proposal)
	{
		$data = $this->m_bks_seminar->ambil_id_gambar($id_seminar_proposal);
		$path = './assets/berkas/seminar/';
		@unlink($path . $data->berita_acara);
		@unlink($path . $data->persetujuan);
		@unlink($path . $data->proposal);
		@unlink($path . $data->presentasi);
		@unlink($path . $data->monitoring);
		if ($this->m_bks_seminar->delete_users($id_seminar_proposal) == TRUE) {
			$this->session->set_flashdata('pesan', 'dihapus');
		}
		redirect('bks_seminar');
	}
}
