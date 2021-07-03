<?php
class M_revisi_sidang extends CI_Model
{

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji1' => $this->input->post('penguji1'),
            'penguji2' => $this->input->post('penguji2'),
            'penguji3' => $this->input->post('penguji3'),
            'revisi1' => $this->input->post('revisi1'),
            'revisi2' =>  $this->input->post('revisi2'),
            'revisi3' =>  $this->input->post('revisi3'),
            'jenis' => "ta",
        );
        // print_r($data);
        // exit();
        $this->db->insert('revisi', $data);
        redirect('/revisi_seminar');
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
        $this->db->where('jenis', 'ta');

        $this->db->where('revisi.nim', $this->session->userdata('email'));
        $query = $this->db->get()->row();
        return $query;
    }
}