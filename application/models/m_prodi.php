<?php
class M_prodi extends CI_Model
{
	function tampil_data($id_jurusan)
	{
		return $this->db->query("SELECT * FROM jurusan, prodi 
            WHERE jurusan.id_jurusan=prodi.id_jurusan AND 
            jurusan.id_jurusan='" . $id_jurusan . "'");
	}


	function tambah_data()
	{
		$data = array(
			'id_jurusan' => $this->input->post('id_jurusan'),
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi')
		);
		$this->db->insert('prodi', $data);
		//redirect('../prodi?id=');
		header("Location: ../prodi?id=" . $this->input->post('id_jurusan'));
	}

	function ubah_data($id_prodi)
	{
		$data = array(
			'id_jurusan' => $this->input->post('id_jurusan'),
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi'),

		);
		$this->db->where(array('id_prodi' => $id_prodi));
		$this->db->update('prodi', $data);
		redirect('../prodi');
	}

	function hapus_data($id_prodi)
	{
		$this->db->where(array('id_prodi' => $id_prodi));
		$this->db->delete('prodi');
		header("Location: ../prodi?id=" . $this->input->post('id_jurusan'));
	}
	public function get_data($id_prodi)
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->join('jurusan', 'jurusan.id_jurusan = prodi.id_jurusan', 'left');
		$this->db->where('id_prodi', $id_prodi);
		return $this->db->get()->row();
	}
}
