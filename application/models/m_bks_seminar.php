<?php
class M_bks_seminar extends CI_Model
{

	function tampil_data()
	{
		// return $this->db->get('bks_seminar');
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
		$this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
		// $this->db->where('seminar_proposal.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('seminar_proposal');
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

	public function hapusFile($id_bks_seminar)
	{
		$this->db->where('id_bks_seminar', $id_bks_seminar);
		return $this->db->delete('bks_seminar');
	}
	public function getDataByID($id_bks_seminar)
	{
		return $this->db->get_where('bks_seminar', array('id_bks_seminar' => $id_bks_seminar));
	}

	public function updateFile($id_bks_seminar, $data)
	{
		$this->db->where('id_bks_seminar', $id_bks_seminar);
		return $this->db->update('bks_seminar', $data);
	}

	public function ambil_id_gambar($id_bks_seminar)
	{
		$this->db->from('bks_seminar');
		$this->db->where('id_bks_seminar', $id_bks_seminar);
		$result = $this->db->get('');
		// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil datanya berdasrka row id
		}
	}

	public function delete_users($id_bks_seminar)
	{
		$this->db->where('id_bks_seminar', $id_bks_seminar);
		$this->db->delete('bks_seminar');
		return TRUE;
	}

	public function update_users($data, $where)
	{
		$this->db->where($where);
		$this->db->update('bks_seminar', $data);
		return TRUE;
	}

	public function ambil_id_users($id_bks_seminar)
	{
		$data = $this->db->where(['id_bks_seminar' => $id_bks_seminar])
			->get("bks_seminar");
		if ($data->num_rows() > 0) {
			return $data->row();
		}
	}

	// public function M_EditMahasiswa($data, $id_bks_seminar)
	// {
	// 	$this->db->where('id_bks_seminar', $id_bks_seminar);
	// 	$this->db->update('bks_seminar', $data);
	// }

	// function cari_data($data_kode)
	// {
	// 	$this->db->where($data_kode);
	// 	$hasil = $this->db->get('bks_seminar')->result();
	// 	return $hasil;
	// }

	// public function proses_edit_data()
	// {
	// 	// $id_bks_seminar = $this->input->post('id_bks_seminar', true);
	// 	$data = [
	// 		"nim" => $this->input->post('nim'),
	// 		"berita_acara" => $this->input->post('berita_acara'),
	// 	];
	// 	// $this->db->set('data', $data);
	// 	// $this->db->where('id_bks_seminar', $id_bks_seminar);
	// 	// $this->db->update('bks_seminar', $data);
	// 	$this->db->where('id_bks_seminar', $this->input->post('id_bks_seminar'));
	// 	$this->db->update('bks_seminar', $data['id_bks_seminar']);
	// }
	// public function add2($post)
	// {
	// 	$params = [
	// 		'nim' => $post['nim'],
	// 	];
	// 	$this->db->insert('bks_seminar', $params);
	// 
}
