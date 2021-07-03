<?php
class M_bks_seminar extends CI_Model
{

	function tampil_data()
	{
		return $this->db->query("SELECT * FROM mahasiswa, seminar_proposal WHERE mahasiswa.nim=seminar_proposal.nim");
	}

	function bks_seminar_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=seminar_proposal.nim', 'left');
		$this->db->where('seminar_proposal.nim', $this->session->userdata('email'));
		return $this->db->get('seminar_proposal');
	}

	function bks_seminar_admin($id_prodi)
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=seminar_proposal.nim', 'left');
		$this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
		$this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
		return $this->db->get('seminar_proposal');
	}

	function ubah_data($id_seminar_proposal)
	{
		$data = array(
			'st_beritaacara' => $this->input->post('st_beritaacara'),
			'catatan_fileta' => $this->input->post('catatan_fileta'),
			'tgl_fileta' => $this->input->post('tgl_fileta'),
		);
		$this->db->where(array('id_seminar_proposal' => $id_seminar_proposal));
		$this->db->update('seminar_proposal', $data);
		redirect('/bks_seminar');
	}

	function insert($data)
	{
		return $this->db->insert('seminar_proposal', $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_seminar_proposal', $id);
		$this->db->update('seminar_proposal', $data);
	}

	function get_nim($id_seminar_proposal)
	{
		// $this->db->join('user', 'bks_seminar.nim = user.nim', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.nim = seminar_proposal.nim', 'left');
		// $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
		$this->db->where('id_seminar_proposal', $id_seminar_proposal);

		return $this->db->get('seminar_proposal')->row();
	}

	public function ambil_id_mahasiswa($id_seminar_proposal)
	{
		return $this->db->get_where('seminar_proposal', ['id_seminar_proposal' => $id_seminar_proposal])
			->row_array();
	}

	function edit_data($data_kode, $data_buku)
	{
		$this->db->where($data_kode);
		$this->db->update('bks_seminar', $data_buku);
	}

	public function hapusFile($id_seminar_proposal)
	{
		$this->db->where('id_seminar_proposal', $id_seminar_proposal);
		return $this->db->delete('seminar_proposal');
	}
	public function getDataByID($id_seminar_proposal)
	{
		return $this->db->get_where('seminar_proposal', array('id_seminar_proposal' => $id_seminar_proposal));
	}

	public function updateFile($id_seminar_proposal, $data)
	{
		$this->db->where('id_seminar_proposal', $id_seminar_proposal);
		return $this->db->update('seminar_proposal', $data);
	}

	public function ambil_id_gambar($id_seminar_proposal)
	{
		$this->db->from('seminar_proposal');
		$this->db->where('id_seminar_proposal', $id_seminar_proposal);
		$result = $this->db->get('');
		// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil datanya berdasrka row id
		}
	}

	public function delete_users($id_seminar_proposal)
	{
		$this->db->where('id_seminar_proposal', $id_seminar_proposal);
		$this->db->delete('seminar_proposal');
		return TRUE;
	}

	public function update_users($data, $where)
	{
		$this->db->where($where);
		$this->db->update('bks_seminar', $data);
		return TRUE;
	}

	public function ambil_id_users($id_seminar_proposal)
	{
		$data = $this->db->where(['id_seminar_proposal' => $id_seminar_proposal])
			->get("seminar_proposal");
		if ($data->num_rows() > 0) {
			return $data->row();
		}
	}
}
