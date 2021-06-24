<?php
class M_dosen extends CI_Model
{

	function tampil_data()
	{
		return $this->db->get('dosen');
	}

	function getdosen()
	{
		// $this->db->where_in('level', ['3', '4']);
		// $this->db->where('user.id_prodi', $this->session->userdata('id_prodi'));
		// $this->db->join('prodi', 'prodi.id_prodi = user.id_prodi', 'left');
		// $this->db->join('jurusan', 'jurusan.id_jurusan = user.id_jurusan', 'left');
		// $this->db->join('dosen', 'dosen.id_dosen = user.id_dosen', 'left');

		// return $this->db->get('user'); 

		$this->db->select('*');
		$this->db->order_by('level');
		$this->db->from('dosen');
		$this->db->where_in('level', ['3', '4']);
		$this->db->where('dosen.id_prodi', $this->session->userdata('id_prodi'));
		// $this->db->join('user', 'user.nim=mahasiswa.nim');
		$query = $this->db->get();
		return $query;
	}

	function tampil_data_dosen()
	{
		$this->db->where('dosen.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('dosen');
	}

	function tambah_data()
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'hp' => $this->input->post('hp'),
			'id_prodi' => $this->input->post('id_prodi'),
			'level' => 3,
			// 'id_prodi' => $this->session->userdata('id_prodi'),
		);
		$this->db->insert('dosen', $data);
		redirect('/dosen');
	}

	function get_id_dosen($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		return $this->db->get('dosen');
	}

	function ubah_data($id_dosen)
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'hp' => $this->input->post('hp'),
			'id_prodi' => $this->input->post('id_prodi'),
			'level' => 3,
		);
		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->update('dosen', $data);
		redirect('/dosen');
	}


	function hapus_data($id_dosen)
	{
		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->delete('dosen');
		redirect('/dosen');
	}

	function delete($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('dosen');
	}
}
