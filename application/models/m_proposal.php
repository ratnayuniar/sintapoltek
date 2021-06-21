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
            'id_user' => $this->session->userdata('id_user'),
        );
        // str_replace('\n', '<br>', $data);
        $this->db->insert('proposal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');

        redirect('/proposal');
    }


    function ubah_data($id_topik)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'bidang' => $this->input->post('bidang'),
            'judul' => $this->input->post('judul'),
            'lokasi' => $this->input->post('lokasi'),
            'status' => $this->input->post('status'),
        );
        $this->db->where(array('id_topik' => $id_topik));
        $this->db->update('topik', $data);
        redirect('/topik');
    }


    function hapus_data($id_topik)
    {
        $this->db->where(array('id_topik' => $id_topik));
        $this->db->delete('topik');
        redirect('/topik');
    }

    function get_nim($id_topik)
    {
        $this->db->join('user', 'topik.id_user = user.id_user', 'left');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        $this->db->join('jurusan', 'user.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('detail_topik', 'topik.id_topik = detail_topik.topik_id', 'left');
        // $this->db->join('mahasiswa', 'topik.nim_t = mahasiswa.nim', 'left');
        $this->db->where('id_topik', $id_topik);

        return $this->db->get('topik')->row();
    }

    function get_id_user($id_user)
    {
        $this->db->join('user', 'topik.id_user = user.id_user', 'left');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        $this->db->join('jurusan', 'user.id_jurusan = jurusan.id_jurusan', 'left');

        $this->db->where('id_user', $id_user);

        return $this->db->get('topik')->row();
    }

    function get_id_topik($id)
    {
        $this->db->where('id_topik', $id);
        return $this->db->get('topik');
    }

    function delete($id)
    {
        $this->db->where('id_topik', $id);
        $this->db->delete('topik');
    }

    function update($id, $data)
    {
        $this->db->where('id_topik', $id);
        $this->db->update('topik', $data);
    }

    function insert_komentar($data)
    {
        return $this->db->insert('detail_topik', $data);
    }

    function get_id($id_proposal)
    {
        $this->db->join('user', 'bks_organisasi.id_user = user.id_user', 'left');
        $this->db->where('id_proposal', $id_proposal);

        return $this->db->get('proposal')->row();
    }

    function proposal_user()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        // $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        // SELECT * FROM `proposal` ORDER BY id_proposal DESC LIMIT 1
        $this->db->select('*');
        // $this->db->from('proposal');
        $this->db->order_by('id_proposal', 'DESC');



        $this->db->where('proposal.id_user', $this->session->userdata('id_user'));
        // $this->db->or_where('bimbingan.id_user_dosen', $this->session->userdata('id_user'));
        // $this->db->where('minggu', 14);

        return $this->db->get('proposal')->row();
    }
}
