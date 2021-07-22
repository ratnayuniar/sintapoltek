<?php
class M_revisi_sidang extends CI_Model
{
    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji' =>  $this->input->post('penguji'),
            'revisi' =>  $this->input->post('revisi'),
            'jenis' => "ta",
        );
        // print_r($data);
        // exit();
        $this->db->insert('revisi', $data);
        redirect('/revisi_sidang');
    }

    function ubah_data($id_revisi)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji' =>  $this->input->post('penguji'),
            'revisi' =>  $this->input->post('revisi'),
            'jenis' => "ta",
        );
        $this->db->where(array('id_revisi' => $id_revisi));
        $this->db->update('revisi', $data);
        redirect('/revisi_sidang');
    }


    function get_nim($id_revisi)
    {
        $this->db->join('mahasiswa', 'revisi.nim = mahasiswa.nim', 'left');
        $this->db->where('id_revisi', $id_revisi);
        return $this->db->get('revisi')->row();
    }

    public function revisi_mhs()
    {

        // $this->db->select('*');
        // $this->db->from('mahasiswa');
        // $this->db->join('revisi', 'mahasiswa.nim = revisi.nim', 'left');
        // $this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
        // $this->db->join('dosen', 'dosen.id_dosen = revisi.penguji', 'left');

        // $this->db->where('jenis', 'ta');
        // $this->db->where('revisi.nim', $this->session->userdata('email'));
        // $query = $this->db->get();
        // return $query;
        return $this->db->select('dosen.nama as nama_dosen, revisi.revisi as revisi, revisi.file_revisi as file')->join('dosen', 'dosen.id_dosen=revisi.penguji')
            ->get_where('revisi', array('nim' => $this->session->userdata('email'), 'jenis' => 'ta'));
    }

    function getStatusSidang()
    {
        return $this->db->get_where('master_ta', array('nim' => $this->session->userdata('email')));
    }

    function getAllMahasiswaRevisiBydIdDosen()
    {
        $dosen_id = $this->session->userdata('id_dosen');

        $query = $this->db->select('revisi.*, mahasiswa.nama, dospen1.nama as dospen1, dospen2.nama as dospen2, dospen3.nama as dospen3, master_ta.nim')
            ->from('revisi')
            ->join('mahasiswa', 'mahasiswa.nim = revisi.nim')
            ->join('master_ta', 'master_ta.nim = revisi.nim')
            ->join('dosen as dospen1', 'dospen1.id_dosen = master_ta.penguji1_sidang')
            ->join('dosen as dospen2', 'dospen2.id_dosen = master_ta.penguji2_sidang')
            ->join('dosen as dospen3', 'dospen3.id_dosen = master_ta.penguji3_sidang')
            ->where('jenis', 'ta')
            ->where('penguji', $dosen_id)->get()->result_array();
        return $query;
    }
}
