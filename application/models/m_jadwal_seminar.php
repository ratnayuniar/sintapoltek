<?php
class M_jadwal_seminar extends CI_Model
{

	function tampil_data()
	{
		// $this->db->select('*');
		// $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		// $this->db->order_by('ruang_seminar', 'asc');
		// $this->db->where('jadwal_seminar is NOT NULL', NULL, FALSE);

		// Diubah pada 19-07-2021, perbaikan query. Ambil data dari table master_ta
		$this->db->join('mahasiswa', 'master_ta.nim = mahasiswa.nim')
			->order_by('ruang_seminar', 'ASC')
			->where('jadwal_seminar !=', NULL);


		$query = $this->db->get('master_ta');
		return $query;
	}

	function getmahasiswa()
	{
		$this->db->select('*');
		$this->db->from('master_ta');
		$this->db->join('mahasiswa', 'master_ta.nim = mahasiswa.nim', 'left');
		// $this->db->where('master_ta.id_prodi', $this->session->userdata('id_prodi'));
		$query = $this->db->get();
		return $query;
	}

	function jadwal_seminar_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		$this->db->where('jadwal_seminar is NOT NULL', NULL, FALSE);
		$this->db->where('master_ta.nim', $this->session->userdata('email'));
		return $this->db->get('master_ta');
	}

	function tambah_data()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar'),
			'ruang' => $this->input->post('ruang'),

		);
		$this->db->insert('master_ta', $data);
		redirect('/jadwal_seminar');
	}


	function ubah_data($nim)
	{
		$data = array(
			// 'nim' => $this->input->post('nim'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar'),
			'ruang_seminar' => $this->input->post('ruang_seminar'),

		);
		$this->db->where(array('nim' => $nim));
		$this->db->update('master_ta', $data);
		redirect('/jadwal_seminar');
	}

	function ubah_data_hapus($nim)
	{
		$data = array(
			// 'nim' => $this->input->post('nim'),
			'jadwal_seminar' => null,
			'ruang_seminar' => null,
		);
		$this->db->where(array('nim' => $nim));
		$this->db->update('master_ta', $data);
		redirect('/jadwal_seminar');
	}

	function hapus_data($id_jadwal)
	{
		$this->db->where(array('id_jadwal' => $id_jadwal));
		$this->db->delete('jadwal');
		redirect('/jadwal_seminar');
	}

	function delete($id_jadwal)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->delete('jadwal');
	}

	function get_id_jadwal($id_jadwal)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->get('jadwal');
	}

	// Dibuat pada 18-07-2021, ambil data id_dosen
	function getDataDosen1($id)
	{
		return $this->db->select('dosen.id_dosen, master_ta.penguji1_sempro, dosen.nama')
			->join('dosen', 'dosen.id_dosen = master_ta.penguji1_sempro')
			->get_where('master_ta', ['nim' => $id])->result_array();
	}

	function getDataDosen2($id)
	{
		return $this->db->select('dosen.id_dosen, master_ta.penguji2_sempro, dosen.nama')
			->join('dosen', 'dosen.id_dosen = master_ta.penguji2_sempro')
			->get_where('master_ta', ['nim' => $id])->result_array();
	}

	function getDataDosen3($id)
	{
		return $this->db->select('dosen.id_dosen, master_ta.penguji3_sempro, dosen.nama')
			->join('dosen', 'dosen.id_dosen = master_ta.penguji3_sempro')
			->get_where('master_ta', ['nim' => $id])->result_array();
	}
}
