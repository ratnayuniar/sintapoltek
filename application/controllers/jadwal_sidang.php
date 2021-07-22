<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_sidang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal_sidang');
		$this->load->model('m_mahasiswa');
		$this->load->helper('url');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data['query'] = $this->m_jadwal_sidang->tampil_data();
		$data['jadwal_sidang_user'] = $this->m_jadwal_sidang->jadwal_sidang_user();
		$data['mahasiswa'] = $this->m_jadwal_sidang->getmahasiswa();
		$data['title'] = 'SINTA PNM';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('jadwal/jadwal_sidang', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add()
	{
		$nim = $this->input->post('nim');

		if (empty($nim)) $this->m_jadwal_sidang->tambah_data();
		else $this->m_jadwal_sidang->ubah_data($nim);
	}

	public function cek_jadwal_sidang()
	{
		// $bentrok = "2021-07-18 14:00:00";

		$data = [
			'nim' => $this->input->post('nim'),
			'penguji1_sidang' => $this->input->post('penguji1_sidang'),
			'penguji2_sidang' => $this->input->post('penguji2_sidang'),
			'penguji3_sidang' => $this->input->post('penguji3_sidang'),
			'ruang_sidang' => $this->input->post('ruang_sidang'),
			'jadwal_sidang' => $this->input->post('jadwal_sidang'),
			'jam_sidang' => $this->input->post('waktu_mulai') . "-" . $this->input->post('waktu_akhir'),
			// 'jadwal_sidang' => $bentrok,
		];

		// ambil jam_sidang dari form input dan bandingkan dengan jam_sidang dosen penguji 1
		$waktu_penguji1_sidang = $this->db->select('penguji1_sidang, jadwal_sidang,jam_sidang,ruang_sidang')->from('master_ta')->where('penguji1_sidang', $data['penguji1_sidang'])->where('jadwal_sidang', $data['jadwal_sidang'])->where('jam_sidang', $data['jam_sidang'])->where('ruang_sidang', $data['ruang_sidang'])->count_all_results();

		// ambil jam_sidang dari form input dan bandingkan dengan jam_sidang dosen penguji 2
		$waktu_penguji2_sidang = $this->db->select('penguji2_sidang, jadwal_sidang,jam_sidang,ruang_sidang')->from('master_ta')->where('penguji2_sidang', $data['penguji2_sidang'])->where('jadwal_sidang', $data['jadwal_sidang'])->where('jam_sidang', $data['jam_sidang'])->where('ruang_sidang', $data['ruang_sidang'])->count_all_results();

		// ambil jam_sidang dari form input dan bandingkan dengan jam_sidang dosen penguji 3
		$waktu_penguji3_sidang = $this->db->select('penguji3_sidang, jadwal_sidang,jam_sidang,ruang_sidang')->from('master_ta')->where('penguji3_sidang', $data['penguji3_sidang'])->where('jadwal_sidang', $data['jadwal_sidang'])->where('jam_sidang', $data['jam_sidang'])->where('ruang_sidang', $data['ruang_sidang'])->count_all_results();

		// cek ruangan, kepake gak diwaktu yg sama dengan form input
		$cek_ruangan = $this->db->select('ruang_sidang, jadwal_sidang')->from('master_ta')->where('ruang_sidang', $data['ruang_sidang'])->where('jadwal_sidang', $data['jadwal_sidang'])->count_all_results();


		if ($waktu_penguji1_sidang > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 1 sidang")</script>';
			redirect('jadwal_sidang', 'refresh');
		} else if ($waktu_penguji2_sidang > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 2 sidang")</script>';
			redirect('jadwal_sidang', 'refresh');
		} else if ($waktu_penguji3_sidang > 0) {
			echo '<script>alert("bentrok dengan dosen penguji 3 sidang")</script>';
			redirect('jadwal_sidang', 'refresh');
		}
		// else if ($cek_ruangan > 0) {
		// 	echo '<script>alert("Ruangan sedang dipakai")</script>';
		// 	redirect('jadwal_sidang', 'refresh');
		// } 
		else {

			$simpandongbro = [
				'ruang_sidang' => $this->input->post('ruang_sidang'),
				'jadwal_sidang' => $this->input->post('jadwal_sidang'),
				'jam_sidang' => $this->input->post('waktu_mulai') . "-" . $this->input->post('waktu_akhir'),
			];



			$this->db->where('nim', $data['nim']);
			$this->db->update('master_ta', $simpandongbro);

			redirect('jadwal_sidang', 'refresh');
		}
	}

	function delete2($id_jadwal)
	{
		$delete = $this->m_jadwal_sidang->get_id_jadwal($id_jadwal);
		if ($delete) {
			$this->m_jadwal_sidang->delete($id_jadwal);
			$this->session->set_flashdata('pesan', 'Data Berhasil di Hapus');
			redirect('jadwal_sidang', 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Data Tidak ada');
			redirect('jadwal_sidang', 'refresh');
		}
	}

	public function getDosenPenguji()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_sidang->getDataDosen1($id);

		echo json_encode($data);
	}

	public function getDosenPenguji2()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_sidang->getDataDosen2($id);

		echo json_encode($data);
	}

	public function getDosenPenguji3()
	{
		$id = $this->input->post('id');
		$data = $this->m_jadwal_sidang->getDataDosen3($id);

		echo json_encode($data);
	}
}
