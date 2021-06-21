<?php
class M_jadwal_seminar extends CI_Model
{

	function tampil_data()
	{
		// $this->db->where('jenis_jadwal', 'seminar');

		// return $this->db->get('master_ta');
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		$this->db->where('jadwal_seminar is NOT NULL', NULL, FALSE);


		$query = $this->db->get('master_ta');
		return $query;
	}

	function jadwal_seminar_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		// $this->db->where('jenis_jadwal', 'seminar');
		$this->db->where('jadwal_seminar is NOT NULL', NULL, FALSE);
		$this->db->where('master_ta.nim', $this->session->userdata('nim'));
		return $this->db->get('master_ta');
	}

	function tambah_data()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar'),
			// 'jenis_jadwal' => 'seminar',
		);
		$this->db->insert('master_ta', $data);
		redirect('/jadwal_seminar');
	}


	function ubah_data($nim)
	{
		$data = array(
			// 'nim' => $this->input->post('nim'),
			'jadwal_seminar' => $this->input->post('jadwal_seminar'),

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
}
