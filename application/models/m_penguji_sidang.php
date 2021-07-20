<?php
class M_penguji_sidang extends CI_Model
{

    function tampil_data($id_prodi)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        $query = $this->db->get('master_ta');
        return $query;
    }

    // edit dijoin dengan nilai_sidang
    function bimbingan_dosen()
    {

        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('nilai_sidang', 'master_ta.penguji1_sidang = nilai_sidang.id_dosen', 'left');
        $this->db->join('dosen', 'dosen.id_dosen=master_ta.penguji1_sidang');
        $this->db->where('master_ta.penguji1_sidang', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji2_sidang', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji3_sidang', $this->session->userdata('id_dosen'));
        $query = $this->db->get();
        return $query;
    }

    function bimbingan_mhs()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->where('penguji1_sidang is NOT NULL', NULL, FALSE);
        $this->db->where('penguji2_sidang is NOT NULL', NULL, FALSE);
        $this->db->where('penguji3_sidang is NOT NULL', NULL, FALSE);
        $this->db->where('master_ta.nim', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query;
    }

    public function getmahasiswabyid($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where("mahasiswa.nim", $id);
        $query = $this->db->get()->row();
        return $query;
    }
    public function getdosen1($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getdosen2($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getdosen3($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }


    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji1_sidang' => $this->input->post('penguji1_sidang'),
            'penguji2_sidang' => $this->input->post('penguji2_sidang'),
            'penguji3_sidang' => $this->input->post('penguji3_sidang'),
        );
        $this->db->insert('master_ta', $data);
        redirect('/penguji_sidang');
    }



    function dosen_user()
    {
        $this->db->or_where('penguji_sidang.id_penguji1', $this->session->userdata('id_dosen'));
        $this->db->or_where('penguji_sidang.id_penguji2', $this->session->userdata('id_dosen'));
        $this->db->or_where('penguji_sidang.id_penguji3', $this->session->userdata('id_dosen'));

        return $this->db->get('penguji_sidang');
    }

    function cek_nim($nim)
    {
        $query = array('nim' => $nim);
        return $this->db->get_where('mahasiswa', $query);
    }

    function ubah_data($nim)
    {
        $data = array(

            'penguji1_sidang' => $this->input->post('penguji1_sidang'),
            'penguji2_sidang' => $this->input->post('penguji2_sidang'),
            'penguji3_sidang' => $this->input->post('penguji3_sidang')
        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('master_ta', $data);
        redirect('/penguji_sidang');
    }


    function hapus_data($id_penguji_sidang)
    {
        $this->db->where(array('id_penguji_sidang' => $id_penguji_sidang));
        $this->db->delete('penguji_sidang');
        redirect('/penguji_sidang');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data2($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_id_penguji($id)
    {
        $this->db->where('id_penguji_sidang', $id);
        return $this->db->get('penguji_sidang');
    }

    function delete($id)
    {
        $this->db->where('id_penguji_sidang', $id);
        $this->db->delete('penguji_sidang');
    }
}
