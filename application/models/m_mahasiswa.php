<?php
class M_mahasiswa extends CI_Model
{

	function tampilmahasiswa()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		// $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
		$query = $this->db->get();
		return $query;
	}

	function getmahasiswa()
	{
		// $this->db->select('*');
		// $this->db->from('user');
		// $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
		// $query = $this->db->get();
		// return $query;
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.id_prodi', $this->session->userdata('id_prodi'));
		// $this->db->join('user', 'user.nim=mahasiswa.nim');
		$query = $this->db->get();
		return $query;
	}
	// function getdosen()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('user');
	// 	$this->db->where_in('level', ['3','4']);
	// 	$this->db->join('dosen', 'dosen.nim=user.nim');
	// 	$query = $this->db->get();
	// 	return $query;
	// }

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
		// return $this->db->get('mahasiswa');
		// return $this->db->query("SELECT * FROM jurusan, prodi WHERE jurusan.id_jurusan=prodi.id_jurusan");
		return $this->db->query("SELECT * FROM jurusan, mahasiswa,prodi WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi");
		// return $this->db->query("SELECT * FROM prodi, mahasiswa WHERE prodi.id_prodi=mahasiswa.id_prodi");
	}

	function tampil_data_mahasiswa()
	{
		// $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan', 'left');
		// $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		// $this->db->join('user', 'user.id_prodi = prodi.id_prodi', 'left');
		// $this->db->where('mahasiswa.id_prodi', $this->session->userdata('id_prodi'));
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
			// 'id_jurusan' =>  $this->input->post('id_jurusan'),
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
			// 'id_jurusan' =>  $this->input->post('id_jurusan'),
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

	// function tambah_data(){
	// 	$data = array(
	// 		'nim' => $this->input->post('nim'),
	// 		'nama' => $this->input->post('nama'),
	// 		'prodi' => $this->input->post('prodi'),
	// 		'jurusan' => $this->input->post('jurusan'),
	// 	);
	// 	$this->db->insert('mahasiswa', $data);
	// 	redirect('../mahasiswa');
	// }

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

	// function edit_barang($nim, $nama, $prodi, $jurusan)
	// {
	// 	$hasil = $this->db->query("UPDATE mahasiswa SET nim='$nim',nama='$nama',prodi='$prodi',jurusan='$jurusan' WHERE id='$id'");
	// 	return $hsl;
	// }
}
