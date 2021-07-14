<?php
class M_persetujuan_proposal extends CI_Model
{
    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji' =>  $this->input->post('penguji'),
            'revisi' =>  $this->input->post('revisi'),
            'jenis' => "ta",
        );
        $this->db->insert('revisi', $data);
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


        $this->db->select('*');
        $this->db->from('revisi');
        $this->db->join('mahasiswa', 'revisi.nim = mahasiswa.nim', 'left');
        $this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
        $this->db->join('dosen', 'revisi.penguji = dosen.id_dosen', 'left');

        $this->db->where('jenis', 'ta');
        $this->db->where('revisi.nim', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query;
    }

    function get_mahasiswa()
    {
        $dosen_id = $this->session->userdata('id_dosen');

        $query = $this->db->select('seminar_proposal.*, mahasiswa.nama, dosbing1.nama as dosbing1, dosbing2.nama as dosbing2, master_ta.nim')
            ->from('seminar_proposal')
            ->join('mahasiswa', 'mahasiswa.nim = seminar_proposal.nim')
            ->join('master_ta', 'master_ta.nim = seminar_proposal.nim')
            ->join('dosen as dosbing1', 'dosbing1.id_dosen = master_ta.pembimbing1')
            ->join('dosen as dosbing2', 'dosbing2.id_dosen = master_ta.pembimbing2')
            ->where('id_dosen', $dosen_id)->get()->result_array();
        return $query;
    }

    function bimbingan_dosen()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('dosen', 'dosen.id_dosen=master_ta.pembimbing1');
        $this->db->where('master_ta.pembimbing1', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.pembimbing2', $this->session->userdata('id_dosen'));
        $query = $this->db->get();
        return $query;
    }
}
