<?php
class M_bks_sidang extends CI_Model
{

	function tampil_data()
	{
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
		$this->db->join('mahasiswa', 'seminar_ta.nim=mahasiswa.nim', 'left');
		$this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
		$this->db->join('topik', 'master_ta.nim = topik.nim', 'left');
		$this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
		return $this->db->get('seminar_ta');
	}

	function get_nim($id_seminar_ta)
	{
		// $this->db->join('user', 'bks_sidang.nim = user.nim', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.nim = seminar_ta.nim', 'left');
		$this->db->where('id_seminar_ta', $id_seminar_ta);

		return $this->db->get('seminar_ta')->row();
	}

	public function ambil_id_gambar($id_seminar_ta)
	{
		$this->db->from('seminar_ta');
		$this->db->where('id_seminar_ta', $id_seminar_ta);
		$result = $this->db->get('');
		// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil datanya berdasrka row id
		}
	}

	public function delete_users($id_seminar_ta)
	{
		$this->db->where('id_seminar_ta', $id_seminar_ta);
		$this->db->delete('seminar_ta');
		return TRUE;
	}

	public function update_users($data, $where)
	{
		$this->db->where($where);
		$this->db->update('seminar_ta', $data);
		return TRUE;
	}

	public function ambil_id_users($id_seminar_ta)
	{
		$data = $this->db->where(['id_seminar_ta' => $id_seminar_ta])
			->get("seminar_ta");
		if ($data->num_rows() > 0) {
			return $data->row();
		}
	}

	function ubah_data($id_seminar_ta)
	{
		$data = array(
			'st_berita_acara' => $this->input->post('st_berita_acara'),
			'catatan_berita_acara' => $this->input->post('catatan_berita_acara'),
			'tgl_berita_acara' => $this->input->post('tgl_berita_acara'),

		);
		$this->db->where(array('id_seminar_ta' => $id_seminar_ta));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}

	function ubah_data2($nim)
	{
		$data = array(
			'st_persetujuan' => $this->input->post('st_persetujuan'),
			'catatan_persetujuan' => $this->input->post('catatan_persetujuan'),
			'tgl_persetujuan' => $this->input->post('tgl_persetujuan'),

		);

		$this->db->where(array('nim' => $nim));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}

	function ubah_data3($nim)
	{
		$data = array(
			'st_file_ta' => $this->input->post('st_file_ta'),
			'catatan_file_ta' => $this->input->post('catatan_file_ta'),
			'tgl_file_ta' => $this->input->post('tgl_file_ta'),

		);

		$this->db->where(array('nim' => $nim));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}

	function ubah_data4($nim)
	{
		$data = array(
			'st_monitoring' => $this->input->post('st_monitoring'),
			'catatan_monitoring' => $this->input->post('catatan_monitoring'),
			'tgl_monitoring' => $this->input->post('tgl_monitoring'),

		);

		$this->db->where(array('nim' => $nim));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}

	function ubah_data5($nim)
	{
		$data = array(
			'st_presentasi' => $this->input->post('st_presentasi'),
			'catatan_presentasi' => $this->input->post('catatan_presentasi'),
			'tgl_presentasi' => $this->input->post('tgl_presentasi'),

		);

		$this->db->where(array('nim' => $nim));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}

	function ubah_data6($nim)
	{
		$data = array(
			'st_pkkmb' => $this->input->post('st_pkkmb'),
			'catatan_pkkmb' => $this->input->post('catatan_pkkmb'),
			'tgl_pkkmb' => $this->input->post('tgl_pkkmb'),

		);

		$this->db->where(array('nim' => $nim));
		$this->db->update('seminar_ta', $data);
		redirect('/bks_sidang');
	}
}
