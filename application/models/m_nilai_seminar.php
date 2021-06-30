<?php
class M_nilai_seminar extends CI_Model
{
	public function getmahasiswabyid($id)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa', $id);


		// $this->db->join('dosen', 'dosen.id_dosen=user.id_dosen');
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
			'presentasi' => $this->input->post('presentasi'),
			'penguasaan' => $this->input->post('penguasaan'),
			'rata' => $this->input->post('rata'),
			'nilai_akhir' => $this->input->post('nilai_akhir'),
		);

		$this->db->select('*');
		$this->db->from('nilai_sempro');
		$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'nim' => $this->input->post('nim')]);
		$query = $this->db->get()->row_array();
		if (!$query) {
			$this->db->set($dataupdate);
			$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'nim' => $this->input->post('nim')]);
			$this->db->update('nilai_sempro');
		} else {
			$this->db->insert('nilai_sempro', $data);

			// $idjumlah = $this
			// $data = array(
			// 	'id_nilai_sempro'	=> $idjumlah
			// );

			//$this->db->insert('seminar_proposal', $data);
		}
		redirect('/nilai_seminar');
	}

	function tampil_data()
	{

		return $this->db->query("(SELECT * FROM nilai_sempro GROUP BY nim) ");
		// $this->db->query("SELECT * FROM user, nilai_seminar WHERE user.id_user=nilai_seminar.id_mahasiswa");
	}
	function jumlahnilai($id_mahasiswa)
	{
		$this->db->select("AVG(rata) rata,sum(nilai_akhir) nilaiakhir where id_mahasiswa = $id_mahasiswa");
		$result = $this->db->get('nilai_sempro')->row();
	}

	function checkDuplicate()
	{
		// SELECT *, COUNT(*) AS jumlah
		// FROM `nilai_seminar`
		// GROUP BY `id_mahasiswa`
		// HAVING COUNT(*) > 1 
	}

	function get_nim($id_nilai_sempro)
	{
		$this->db->join('mahasiswa', 'nilai_sempro.nim = mahasiswa.nim', 'left');
		$this->db->where('id_nilai_sempro', $id_nilai_sempro);

		return $this->db->get('nilai_sempro')->row();
	}

	function tampil_data2($id_nilai_sempro)
	{
		$this->db->join('mahasiswa', 'nilai_sempro.nim = mahasiswa.nim', 'left');
		$this->db->where('id_nilai_sempro', $id_nilai_sempro);

		return $this->db->get('nilai_sempro')->row();
	}
}
