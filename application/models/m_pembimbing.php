<?php
class M_pembimbing extends CI_Model
{

    function tampil_data($id_prodi)
    {

        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('master_ta');
    }
    function listbimbingandosen()
    {
        $id = $this->session->userdata('id_dosen');
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('dosen', 'dosen.id_dosen=master_ta.pembimbing1');
        $this->db->where("master_ta.pembimbing1", $id)->or_where("master_ta.pembimbing2", $id);
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

    public function getmahasiswabyid2($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where("mahasiswa.nim", $id);
        $query = $this->db->get()->row();
        return $query;
    }


    public function getdosenbyid($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getbyid($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }
    public function getdosen1($id)
    {
        return $this->db->get_where('dosen', ["id_dosen" => $id])->row();
    }
    public function getdosen3($id)
    {
        return $this->db->get_where('dosen', ["id_dosen" => $id])->row();
    }

    public function getdosen2($id)
    {
        return $this->db->get_where('dosen', ["id_dosen" => $id])->row();
    }



    function bimbingan_mhs()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->where('master_ta.nim', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query;
    }

    function tempat()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('topik', 'mahasiswa.nim=topik.nim');
        $this->db->where('topik.nim', $this->session->userdata('email'));
        $query = $this->db->get();
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

    function bimbingan_dosen1()
    {
        return $this->db->get('bimbingan');
    }

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'pembimbing1' => $this->input->post('pembimbing1'),
            'pembimbing2' => $this->input->post('pembimbing2'),
        );
        $this->db->insert('master_ta', $data);
        redirect('/pembimbing');
    }

    function cek_nim($nim)
    {
        $query = array('nim' => $nim);
        return $this->db->get_where('mahasiswa', $query);
    }

    function ubah_data($id_master_ta)
    {
        $data = array(
            // 'id_master_ta' => $this->input->post('id_master_ta'),
            'nim' => $this->input->post('nim'),
            'pembimbing1' => $this->input->post('pembimbing1'),
            'pembimbing2' => $this->input->post('pembimbing2')
        );
        $this->db->where(array('id_master_ta' => $id_master_ta));
        $this->db->update('master_ta', $data);
        redirect('/pembimbing');
    }



    function hapus_data($id_master_ta)
    {
        $this->db->where(array('id_master_ta' => $id_master_ta));
        $this->db->delete('master_ta');
        redirect('/pembimbing');
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

    function get_id_pembimbing($id)
    {
        $this->db->where('id_pembimbing', $id);
        return $this->db->get('pembimbing');
    }

    function delete($id)
    {
        $this->db->where('id_pembimbing', $id);
        $this->db->delete('pembimbing');
    }

    function dosen_user()
    {
        $this->db->or_where('master_ta.pembimbing1', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.pembimbing2', $this->session->userdata('id_dosen'));
        return $this->db->get('master_ta');
    }
}
