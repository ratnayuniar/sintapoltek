<?php
class M_jadwal_sidang extends CI_Model
{

	function tampil_data()
	{
		// $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		// // $this->db->where('jenis_jadwal', 'sidang');
		// return $this->db->get('master_ta');
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		$this->db->where('jadwal_sidang is NOT NULL', NULL, FALSE);


		$query = $this->db->get('master_ta');
		return $query;
	}

	function jadwal_sidang_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
		// $this->db->where('jenis_jadwal', 'seminar');
		$this->db->where('master_ta.nim', $this->session->userdata('email'));
		$this->db->where('jadwal_sidang is NOT NULL', NULL, FALSE);
		return $this->db->get('master_ta');
	}

	function tambah_data()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'jadwal_sidang' => $this->input->post('jadwal_sidang'),
			// 'jenis_jadwal' => 'sidang',
		);
		$this->db->insert('master_ta', $data);
		redirect('/jadwal_sidang');
	}


	function ubah_data($nim)
	{
		$data = array(
			// 'nim' => $this->input->post('nim'),
			'jadwal_sidang' => $this->input->post('jadwal_sidang'),
		);
		$this->db->where(array('nim' => $nim));
		$this->db->update('master_ta', $data);
		redirect('/jadwal_sidang');
	}

	function hapus_data($id_jadwal)
	{
		$this->db->where(array('id_jadwal' => $id_jadwal));
		$this->db->delete('jadwal');
		redirect('/jadwal_sidang');
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
