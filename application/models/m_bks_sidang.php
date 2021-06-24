<?php
class M_bks_sidang extends CI_Model
{

	function tampil_data()
	{
		// return $this->db->get('bks_sidang');
		return $this->db->query("SELECT * FROM mahasiswa, seminar_ta WHERE mahasiswa.nim=seminar_ta.nim");
	}

	function insert($data)
	{
		return $this->db->insert('bks_sidang', $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_seminar_ta', $id);
		$this->db->update('seminar_ta', $data);
	}

	function bks_sidang_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=seminar_ta.nim', 'left');
		$this->db->where('seminar_ta.nim', $this->session->userdata('email'));
		// $this->db->or_where('bks_sidang.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('seminar_ta');
	}

	function bks_sidang_admin($id_prodi)
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=seminar_ta.nim', 'left');
		$this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
		// $this->db->where('seminar_ta.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('seminar_ta');
	}

	function get_nim($id_seminar_ta)
	{
		// $this->db->join('user', 'bks_sidang.nim = user.nim', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.nim = seminar_ta.nim', 'left');
		$this->db->where('id_seminar_ta', $id_seminar_ta);

		return $this->db->get('seminar_ta')->row();
	}

	public function ambil_id_gambar($id_bks_sidang)
	{
		$this->db->from('bks_sidang');
		$this->db->where('id_bks_sidang', $id_bks_sidang);
		$result = $this->db->get('');
		// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil datanya berdasrka row id
		}
	}

	public function delete_users($id_bks_sidang)
	{
		$this->db->where('id_bks_sidang', $id_bks_sidang);
		$this->db->delete('bks_sidang');
		return TRUE;
	}

	public function update_users($data, $where)
	{
		$this->db->where($where);
		$this->db->update('bks_sidang', $data);
		return TRUE;
	}

	public function ambil_id_users($id_bks_sidang)
	{
		$data = $this->db->where(['id_bks_sidang' => $id_bks_sidang])
			->get("bks_sidang");
		if ($data->num_rows() > 0) {
			return $data->row();
		}
	}
}
