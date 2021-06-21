 <?php
class M_prodi extends CI_Model{
	
	function tampil_data(){
		return $this->db-> get('prodi');
	}

	

	function tambah_data(){
		$data = array(
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi'),
		);
		$this->db->insert('prodi', $data);
		redirect('../prodi');
	}


	function ubah_data ($id_prodi){
		$data = array(
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi')
		   );
			$this->db->where(array('id_prodi'=> $id_prodi));
			$this->db->update('prodi',$data);
			redirect('../prodi');
	}


	function hapus_data($id_prodi){
		$this->db->where(array('id_prodi'=> $id_prodi));
		$this->db->delete('prodi');
		redirect('../prodi');
	}

	function tampil_data_prodi($id_jurusan) {
		$this->db->where(array('id_jurusan'=> $id_jurusan));
		return $this->db->get('prodi');
	}

	function cek_prodi($id_prodi) {
		$query = array('id_prodi' => $id_prodi);
		return $this->db->get_where('prodi', $query);
	}

	
}
