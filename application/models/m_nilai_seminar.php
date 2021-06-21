<?php
class M_nilai_seminar extends CI_Model
{
	public function getmahasiswabyid($id)
	{
		$this->db->select('*');
		$this->db->from('user');

		// $this->db->join('dosen', 'dosen.id_dosen=user.id_dosen');
		$this->db->where("user.id_user", $id);
		$this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
		$query = $this->db->get()->row();
		return $query;
	}
	function tambah_data()
	{
		$data = array(
			'id_mahasiswa' => $this->input->post('id_mahasiswa'),
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
		$this->db->from('nilai_seminar');
		$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'id_mahasiswa' => $this->input->post('id_mahasiswa')]);
		$query = $this->db->get()->row();
		if (isset($query)) {
			$this->db->set($dataupdate);
			$this->db->where(['id_dosen' => $this->session->userdata('id_dosen'), 'id_mahasiswa' => $this->input->post('id_mahasiswa')]);
			$this->db->update('nilai_seminar');
		} else {
			$this->db->insert('nilai_seminar', $data);
		}

		redirect('/nilai_seminar');
	}

	function tampil_data()
	{

		return $this->db->query("(SELECT * FROM seminar_proposal GROUP BY nim) ");
		// $this->db->query("SELECT * FROM user, nilai_seminar WHERE user.id_user=nilai_seminar.id_mahasiswa");
	}
	function jumlahnilai($id_mahasiswa)
	{
		$this->db->select("AVG(rata) rata,sum(nilai_akhir) nilaiakhir where id_mahasiswa = $id_mahasiswa");
		$result = $this->db->get('nilai_seminar')->row();
	}

	function checkDuplicate()
	{
		// SELECT *, COUNT(*) AS jumlah
		// FROM `nilai_seminar`
		// GROUP BY `id_mahasiswa`
		// HAVING COUNT(*) > 1 
	}

	function get_nim($id_nilai_seminar)
	{
		$this->db->join('user', 'nilai_seminar.id_mahasiswa = user.id_user', 'left');
		$this->db->where('id_nilai_seminar', $id_nilai_seminar);

		return $this->db->get('nilai_seminar')->row();
	}

	function tampil_data2($id_nilai_seminar)
	{
		$this->db->join('user', 'nilai_seminar.id_mahasiswa = user.id_user', 'left');
		$this->db->where('id_nilai_seminar', $id_nilai_seminar);

		return $this->db->get('nilai_seminar')->row();
	}
}
