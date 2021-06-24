<?php
class M_topik extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('topik')->result();
    }

    function topik_user()
    {
        $this->db->where('topik.nim', $this->session->userdata('email'));
        // $this->db->or_where('topik.id_prodi', $this->session->userdata('id_prodi'));
        $this->db->join('mahasiswa', 'topik.nim = mahasiswa.nim', 'left');
        return $this->db->get('topik');
    }

    function topik_dosen()
    {
        // $this->db->where('topik.nim', $this->session->userdata('nim'));
        // $this->db->or_where('topik.id_prodi', $this->session->userdata('id_prodi'));
        $this->db->join('mahasiswa', 'topik.nim = mahasiswa.nim', 'left');
        return $this->db->get('topik');
    }

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'bidang' => $this->input->post('bidang'),
            'judul' => $this->input->post('judul'),
            'lokasi' => $this->input->post('lokasi'),
            'status' => 0,
            // 'id_user' => $this->session->userdata('id_user'),
            // 'id_prodi' => $this->session->userdata('id_prodi'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->db->insert('topik', $data);
        $this->session->set_flashdata('pesan', 'disimpan');

        redirect('/topik');
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
        $this->session->set_flashdata('pesan', 'dihapus');
        redirect('/topik');
    }

    function get_nim($id_topik)
    {
        // $this->db->join('user', 'topik.nim = user.nim', 'left');
        $this->db->join('mahasiswa', 'topik.nim = mahasiswa.nim', 'left');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
        $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan', 'left');
        // $this->db->join('detail_topik', 'topik.id_topik = detail_topik.topik_id', 'left');
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
}
