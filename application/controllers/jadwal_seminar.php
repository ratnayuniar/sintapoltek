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
		$data['mahasiswa'] = $this->m_jadwal_seminar->getmahasiswa();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jadwal/jadwal_seminar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		// $nim = $this->input->post('nim');

		// if (empty($nim)) $this->m_jadwal_seminar->tambah_data();
		// else $this->m_jadwal_seminar->ubah_data($nim);

		$time = explode(" - ", $this->input->post('jadwal'));

		$data = [
			'nim' => $this->input->post('nim'),
			'penguji1_sempro' => $this->input->post('penguji1_sempro'),
			'penguji2_sempro' => $this->input->post('penguji2_sempro'),
			'penguji3_sempro' => $this->input->post('penguji3_sempro'),
			'ruang_seminar' => $this->input->post('ruang_seminar'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar') . ":00",
		];

		var_dump($data);
	}

	public function delete()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_jadwal_seminar->tambah_data();
		else $this->m_jadwal_seminar->ubah_data_hapus($nim);
	}

	// function delete2($id_jadwal)
	// {
	// 	$delete = $this->m_jadwal_seminar->get_id_jadwal($id_jadwal);
	// 	if ($delete) {
	// 		$this->m_jadwal_seminar->delete($id_jadwal);
	// 		$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
	// 		redirect('jadwal_seminar', 'refresh');
	// 	} else {
	// 		$this->session->set_flashdata('pesan', 'Data Tidak ada');
	// 		redirect('jadwal_seminar', 'refresh');
	// 	}
	// }

	// Dibuat pada 19-07-2021, cek jadwal seminar agar tidak bentrok
	public function cek_jadwal_seminar()
	{
		// $bentrok = "2021-07-18 14:00:00";

		$data = [
			'nim' => $this->input->post('nim'),
			'penguji1_sempro' => $this->input->post('penguji1_sempro'),
			'penguji2_sempro' => $this->input->post('penguji2_sempro'),
			'penguji3_sempro' => $this->input->post('penguji3_sempro'),
			'ruang_seminar' => $this->input->post('ruang_seminar'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar'),
			'jam' => $this->input->post('waktu_mulai') . "-" . $this->input->post('waktu_akhir'),
			// 'jadwal_seminar' => $bentrok,
		];

		// ambil jam dari form input dan bandingkan dengan jam dosen penguji 1
		$waktu_penguji1_sempro = $this->db->select('penguji1_sempro, jadwal_seminar,jam,ruang_seminar')->from('master_ta')->where('penguji1_sempro', $data['penguji1_sempro'])->where('jadwal_seminar', $data['jadwal_seminar'])->where('jam', $data['jam'])->where('ruang_seminar', $data['ruang_seminar'])->count_all_results();

		// ambil jam dari form input dan bandingkan dengan jam dosen penguji 2
		$waktu_penguji2_sempro = $this->db->select('penguji2_sempro, jadwal_seminar,jam,ruang_seminar')->from('master_ta')->where('penguji2_sempro', $data['penguji2_sempro'])->where('jadwal_seminar', $data['jadwal_seminar'])->where('jam', $data['jam'])->where('ruang_seminar', $data['ruang_seminar'])->count_all_results();

		// ambil jam dari form input dan bandingkan dengan jam dosen penguji 3
		$waktu_penguji3_sempro = $this->db->select('penguji3_sempro, jadwal_seminar,jam,ruang_seminar')->from('master_ta')->where('penguji3_sempro', $data['penguji3_sempro'])->where('jadwal_seminar', $data['jadwal_seminar'])->where('jam', $data['jam'])->where('ruang_seminar', $data['ruang_seminar'])->count_all_results();

		// cek ruangan, kepake gak diwaktu yg sama dengan form input
		$cek_ruangan = $this->db->select('ruang_seminar, jadwal_seminar')->from('master_ta')->where('ruang_seminar', $data['ruang_seminar'])->where('jadwal_seminar', $data['jadwal_seminar'])->count_all_results();


		if ($waktu_penguji1_sempro > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 1 sidang")</script>';
			redirect('jadwal_seminar', 'refresh');
		} else if ($waktu_penguji2_sempro > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 2 sidang")</script>';
			redirect('jadwal_seminar', 'refresh');
		} else if ($waktu_penguji3_sempro > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 3 sidang")</script>';
			redirect('jadwal_seminar', 'refresh');
		}
		// else if ($cek_ruangan > 0) {
		// 	echo '<script>alert("Ruangan sedang dipakai")</script>';
		// 	redirect('jadwal_seminar', 'refresh');
		// } 
		else {

			$simpandongbro = [
				'ruang_seminar' => $this->input->post('ruang_seminar'),
				'jadwal_seminar' => $this->input->post('jadwal_seminar'),
				'jam' => $this->input->post('waktu_mulai') . "-" . $this->input->post('waktu_akhir'),
			];



			$this->db->where('nim', $data['nim']);
			$this->db->update('master_ta', $simpandongbro);

			redirect('jadwal_seminar', 'refresh');
		}
	}

	// Dibuat pada 19-07-2021, ambil id_dosen dari tabel master_ta
	public function getDosenPenguji()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_seminar->getDataDosen1($id);

		echo json_encode($data);
	}

	public function getDosenPenguji2()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_seminar->getDataDosen2($id);

		echo json_encode($data);
	}

	public function getDosenPenguji3()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_seminar->getDataDosen3($id);

		echo json_encode($data);
	}
}
