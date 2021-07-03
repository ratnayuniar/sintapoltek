<?php
class M_mahasiswa extends CI_Model
{

	function tampilmahasiswa()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query;
	}

	function getmahasiswa()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.id_prodi', $this->session->userdata('id_prodi'));
		$query = $this->db->get();
		return $query;
	}

	function getdosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where_in('level', ['3', '4']);
		$query = $this->db->get();
		return $query;
	}

	function tampil_data()
	{
		return $this->db->query("SELECT * FROM jurusan, mahasiswa,prodi WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi");
	}

	function tampil_data_mahasiswa()
	{
		$this->db->where_in('id_role', ['2']);
		$this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
		return $this->db->get('user');
	}


	function tambah_data()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('hp'),
			'ttl' => $this->input->post('ttl'),
			'angkatan' =>  $this->input->post('angkatan'),
			'id_prodi' =>  $this->input->post('id_prodi'),
			'level' => 2,
			'aktif' => 1,
		);
		// print_r($data);
		// exit();
		$this->db->insert('mahasiswa', $data);
		redirect('/mahasiswa');
	}

	function cek_nim($nim)
	{
		$query = array('nim' => $nim);
		return $this->db->get_where('mahasiswa', $query);
		// print_r($query);
		// exit();
	}

	function ubah_data($nim)
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('hp'),
			'ttl' => $this->input->post('ttl'),
			'angkatan' =>  $this->input->post('angkatan'),
			'id_prodi' =>  $this->input->post('id_prodi'),
			'level' => 2,
			'aktif' => 1,
		);
		$this->db->where(array('nim' => $nim));
		$this->db->update('mahasiswa', $data);
		redirect('/mahasiswa');
	}


	function hapus_data($nim)
	{
		$this->db->where(array('nim' => $nim));
		$this->db->delete('mahasiswa');
		redirect('/mahasiswa');
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function hapus_data2($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function delete($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
	}

	function get_nim($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get('mahasiswa');
	}
}
