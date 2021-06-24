<?php
class M_nilai_sidang extends CI_Model
{
	public function getmahasiswabyid($id)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		// $this->db->where("user.id_user", $id);
		// $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
		$query = $this->db->get()->row();
		return $query;
	}
	function tambah_data()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'perumusan' => $this->input->post('perumusan'),
			'teori' => $this->input->post('teori'),
			'pemecahan' => $this->input->post('pemecahan'),
			'penulisan' => $this->input->post('penulisan'),
			'pustaka' => $this->input->post('pustaka'),
			'karya' => $this->input->post('karya'),
			'presentasi' => $this->input->post('presentasi'),
			'penguasaan' => $this->input->post('penguasaan'),
			'rata' => $this->input->post('rata'),
			'nilai_akhir' => $this->input->post('nilai_akhir'),
			'id_dosen' => $this->session->userdata('id_dosen'),
		);
		$dataupdate = array(
			'perumusan' => $this->input->post('perumusan'),
			'teori' => $this->input->post('teori'),
			'pemecahan' => $this->input->post('pemecahan'),
			'penulisan' => $this->input->post('penulisan'),
			'pustaka' => $this->input->post('pustaka'),
			'karya' => $this->input->post('karya'),
			'presentasi' => $this->input->post('presentasi'),
			'penguasaan' => $this->input->post('penguasaan'),
			'rata' => $this->input->post('rata'),
			'nilai_akhir' => $this->input->post('nilai_akhir'),
		);

		$this->db->select('*');
		$this->db->from('nilai_sidang');
		$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'nim' => $this->input->post('nim')]);
		$query = $this->db->get()->row();
		if (isset($query)) {
			$this->db->set($dataupdate);
			$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'nim' => $this->input->post('nim')]);
			$this->db->update('nilai_sidang');
		} else {
			$this->db->insert('nilai_sidang', $data);
		}

		redirect('/nilai_sidang');
	}

	function tampil_data()
	{
		// $this->db->select('*');
		// $this->db->join('mahasiswa', 'mahasiswa.nim=bks_bahasa.nim', 'left');
		// $this->db->where('bks_bahasa.id_user', $this->session->userdata('id_user'));
		// return $this->db->get('bks_bahasa');

		// $this->db->where('bks_bahasa.id_user', $this->session->userdata('id_user'));

		// $this->db->select("*");
		// $this->db->join('user', 'user.id_user=nilai_sidang.id_mahasiswa', 'left');
		// return $this->db->get('nilai_sidang');

		$this->db->select("*, COUNT(*) as jumlah");
		// $this->db->join('user', 'user.id_user=seminar_ta.nim', 'left');
		$this->db->group_by('nilai_sidang.nim');
		//$this->db->having("jumlah > 1", null, false);
		return $this->db->get('nilai_sidang');
	}

	function checkDuplicate()
	{
		// SELECT *, COUNT(*) AS jumlah
		// FROM `nilai_sidang`
		// GROUP BY `id_mahasiswa`
		// HAVING COUNT(*) > 1 
	}

	function get_nim($id_nilai_sidang)
	{
		$this->db->join('mahasiswa', 'nilai_sidang.nim = mahasiswa.nim', 'left');
		$this->db->where('id_nilai_sidang', $id_nilai_sidang);

		return $this->db->get('nilai_sidang')->row();
	}


	function tampil_data2($id_nilai_sidang)
	{
		$this->db->join('mahasiswa', 'nilai_sidang.nim = mahasiswa.nim', 'left');
		$this->db->where('id_nilai_sidang', $id_nilai_sidang);

		return $this->db->get('nilai_sidang')->row();
	}

	// function tampil_data2($id_nilai_seminar)
	// {
	// 	$this->db->join('user', 'nilai_seminar.id_mahasiswa = user.id_user', 'left');
	// 	$this->db->where('id_nilai_seminar', $id_nilai_seminar);
	// 	return $this->db->get('nilai_seminar')->row();
	// }
}
