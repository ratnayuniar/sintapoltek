<?php
class M_jurusan extends CI_Model
{

	function tampil_data()
	{
		return $this->db->query("SELECT * FROM jurusan");
	}

	function tambah_data()
	{
		$data = array(
			'nama_jurusan' => $this->input->post('nama_jurusan'),
		);
		$this->db->insert('jurusan', $data);
		redirect('/jurusan');
	}


	function ubah_data($id_jurusan)
	{
		$data = array(
			'nama_jurusan' => $this->input->post('nama_jurusan')
		);
		$this->db->where(array('id_jurusan' => $id_jurusan));
		$this->db->update('jurusan', $data);
		redirect('/jurusan');
	}


	function hapus_data($id_jurusan)
	{
		$this->db->where(array('id_jurusan' => $id_jurusan));
		$this->db->delete('jurusan');
		redirect('/jurusan');
	}

	function get_data_detail($id_jurusan)
	{
		$arr = array('id_jurusan', 'kode_jurusan', 'nama_jurusan');
		foreach ($arr as $key => $val) $data[$val] = null;

		$this->db->where(array('id_jurusan' => $id_jurusan));
		$query = $this->db->get('jurusan');
		foreach ($query->result() as $row) {
			foreach ($arr as $key => $val) $data[$val] = $row->$val;
		}

		return $data;
	}

	function delete($id_jurusan)
	{
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->delete('jurusan');
	}

	function get_id_jurusan($id_jurusan)
	{
		$this->db->where('id_jurusan', $id_jurusan);
		return $this->db->get('jurusan');
	}
}
