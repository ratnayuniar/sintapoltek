<?php
class M_bks_sidang extends CI_Model
{

	function tampil_data()
	{
		// return $this->db->get('bks_sidang');
		return $this->db->query("SELECT * FROM mahasiswa, bks_sidang WHERE mahasiswa.nim=bks_sidang.nim");
	}

	function insert($data)
	{
		return $this->db->insert('bks_sidang', $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_bks_sidang', $id);
		$this->db->update('bks_sidang', $data);
	}

	function bks_sidang_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=bks_sidang.nim', 'left');
		$this->db->where('bks_sidang.nim', $this->session->userdata('nim'));
		// $this->db->or_where('bks_sidang.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('bks_sidang');
	}

	function bks_sidang_admin()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=bks_sidang.nim', 'left');
		$this->db->where('bks_sidang.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('bks_sidang');
	}

	function get_nim($id_bks_sidang)
	{
		$this->db->join('user', 'bks_sidang.nim = user.nim', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.nim = user.nim', 'left');
		$this->db->where('id_bks_sidang', $id_bks_sidang);

		return $this->db->get('bks_sidang')->row();
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
