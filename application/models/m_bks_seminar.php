<?php
class M_bks_seminar extends CI_Model
{

	function tampil_data()
	{
		// return $this->db->get('bks_seminar');
		return $this->db->query("SELECT * FROM mahasiswa, bks_seminar WHERE mahasiswa.nim=bks_seminar.nim");
	}

	function bks_seminar_user()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=bks_seminar.nim', 'left');
		$this->db->where('bks_seminar.nim', $this->session->userdata('nim'));
		return $this->db->get('bks_seminar');
	}

	function bks_seminar_admin()
	{
		$this->db->select('*');
		$this->db->join('mahasiswa', 'mahasiswa.nim=bks_seminar.nim', 'left');
		$this->db->where('bks_seminar.id_prodi', $this->session->userdata('id_prodi'));
		return $this->db->get('bks_seminar');
	}

	function insert($data)
	{
		return $this->db->insert('bks_seminar', $data);
	}

	function update($id, $data)
	{
		$this->db->where('id_bks_seminar', $id);
		$this->db->update('bks_seminar', $data);
	}

	function get_nim($id_bks_seminar)
	{
		$this->db->join('user', 'bks_seminar.nim = user.nim', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.nim = user.nim', 'left');
		$this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
		$this->db->where('id_bks_seminar', $id_bks_seminar);

		return $this->db->get('bks_seminar')->row();
	}

	function cari_data($data_kode)
	{
		$this->db->where($data_kode);
		$hasil = $this->db->get('bks_seminar')->result();
		return $hasil;
	}

	public function proses_edit_data()
	{
		// $id_bks_seminar = $this->input->post('id_bks_seminar', true);
		$data = [
			"nim" => $this->input->post('nim'),
			"berita_acara" => $this->input->post('berita_acara'),
		];
		// $this->db->set('data', $data);
		// $this->db->where('id_bks_seminar', $id_bks_seminar);
		// $this->db->update('bks_seminar', $data);
		$this->db->where('id_bks_seminar', $this->input->post('id_bks_seminar'));
		$this->db->update('bks_seminar', $data['id_bks_seminar']);
	}

	public function ambil_id_mahasiswa($id_bks_seminar)
	{
		return $this->db->get_where('bks_seminar', ['id_bks_seminar' => $id_bks_seminar])
			->row_array();
	}

	function edit_data($data_kode, $data_buku)
	{
		$this->db->where($data_kode);
		$this->db->update('bks_seminar', $data_buku);
	}

	public function add2($post)
	{
		$params = [
			'nim' => $post['nim'],
		];
		$this->db->insert('bks_seminar', $params);
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

	public function M_EditMahasiswa($data, $id_bks_seminar)
	{
		$this->db->where('id_bks_seminar', $id_bks_seminar);
		$this->db->update('bks_seminar', $data);
	}
}
