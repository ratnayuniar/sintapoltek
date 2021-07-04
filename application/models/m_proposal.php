<?php
class M_proposal extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('proposal');
    }

    function topik_user()
    {
        $this->db->where('topik.id_user', $this->session->userdata('id_user'));
        return $this->db->get('topik');
    }

    function tambah_data()
    {
        $data = array(
            'latar_belakang' => $this->input->post('latar_belakang'),
            'rumusan_masalah' => $this->input->post('rumusan_masalah'),
            'batasan_masalah' => $this->input->post('batasan_masalah'),
            'tujuan' => $this->input->post('tujuan'),
            'teori' => $this->input->post('teori'),
            'metode' => $this->input->post('metode'),
            'nim' => $this->session->userdata('email'),
        );
        $this->db->insert('proposal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
        redirect('/proposal');
    }

    function ubah_data($id_proposal)
    {
        $data = array(
            'latar_belakang' => $this->input->post('latar_belakang'),
            'rumusan_masalah' => $this->input->post('rumusan_masalah'),
            'batasan_masalah' => $this->input->post('batasan_masalah'),
            'tujuan' => $this->input->post('tujuan'),
            'teori' => $this->input->post('teori'),
            'metode' => $this->input->post('metode'),
            'nim' => $this->session->userdata('email'),
        );
        $this->db->where(array('id_proposal' => $id_proposal));
        $this->db->update('proposal', $data);
        redirect('/proposal');
    }

    function proposal_user()
    {
        $this->db->select('*');
        $this->db->order_by('id_proposal', 'DESC');
        $this->db->where('proposal.nim', $this->session->userdata('email'));
        return $this->db->get('proposal')->row();
    }
}
