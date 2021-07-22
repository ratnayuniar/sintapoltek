<?php
class M_jadwal_wisuda extends CI_Model
{

    function tampil_data()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        $this->db->where('jadwal_wisuda is NOT NULL', NULL, FALSE);
        $query = $this->db->get('master_ta');
        return $query;
    }

    function jadwal_sidang_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        $this->db->where('master_ta.nim', $this->session->userdata('email'));
        $this->db->where('jadwal_sidang is NOT NULL', NULL, FALSE);
        return $this->db->get('master_ta');
    }

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'jadwal_wisuda' => $this->input->post('jadwal_wisuda'),
            'tempat_wisuda' => $this->input->post('tempat_wisuda'),
        );
        $this->db->insert('master_ta', $data);
        redirect('/jadwal_wisuda');
    }

    function getmahasiswa()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'master_ta.nim = mahasiswa.nim', 'left');
        // $this->db->where('master_ta.id_prodi', $this->session->userdata('id_prodi'));
        $query = $this->db->get();
        return $query;
    }


    function ubah_data($nim)
    {
        $data = array(
            // 'nim' => $this->input->post('nim'),
            'jadwal_wisuda' => $this->input->post('jadwal_wisuda'),
            'tempat_wisuda' => $this->input->post('tempat_wisuda'),
        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('master_ta', $data);
        redirect('/jadwal_wisuda');
    }

    function hapus_data($id_jadwal)
    {
        $this->db->where(array('id_jadwal' => $id_jadwal));
        $this->db->delete('jadwal');
        redirect('/jadwal_sidang');
    }

    function delete($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->delete('jadwal');
    }

    function get_id_jadwal($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->get('jadwal');
    }

    function getDataDosen1($id)
    {
        return $this->db->select('dosen.id_dosen, master_ta.penguji1_sidang, dosen.nama')
            ->join('dosen', 'dosen.id_dosen = master_ta.penguji1_sidang')
            ->get_where('master_ta', ['nim' => $id])->result_array();
    }

    function getDataDosen2($id)
    {
        return $this->db->select('dosen.id_dosen, master_ta.penguji2_sidang, dosen.nama')
            ->join('dosen', 'dosen.id_dosen = master_ta.penguji2_sidang')
            ->get_where('master_ta', ['nim' => $id])->result_array();
    }

    function getDataDosen3($id)
    {
        return $this->db->select('dosen.id_dosen, master_ta.penguji3_sidang, dosen.nama')
            ->join('dosen', 'dosen.id_dosen = master_ta.penguji3_sidang')
            ->get_where('master_ta', ['nim' => $id])->result_array();
    }
}
