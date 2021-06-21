<?php
class M_pembimbing extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('master_ta');
    }
    function listbimbingandosen()
    {
        // $id = $this->session->userdata('id_dosen');
        // $this->db->select('*');
        // $this->db->from('pembimbing');
        // $this->db->join('user', 'user.nim=pembimbing.id_mahasiswa');
        // $this->db->where("pembimbing.pembimbing1", $id)->or_where("pembimbing.pembimbing2", $id);
        // $query = $this->db->get();
        // return $query;

    }
    public function getmahasiswabyid($id)
    {
        // return $this->db->get_where('user', ["id_user" => $id])->row();
        $this->db->select('*');
        $this->db->from('mahasiswa');
        // $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
        // $this->db->join('dosen', 'dosen.id_dosen=user.id_dosen');
        $this->db->where("mahasiswa.nim", $id);
        // $this->db->or_where("user.id_user", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    // public function getdosenbyid($id)
    // {
    //     // return $this->db->get_where('user', ["id_user" => $id])->row();
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     // $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
    //     $this->db->join('dosen', 'dosen.id_dosen=user.id_dosen');
    //     $this->db->where("user.id_user", $id);
    //     $query = $this->db->get()->row();
    //     return $query;
    // }
    // function ceksudahnilai($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('pembimbing');
    //     $this->db->where(['pembimbing1' => $this->session->userdata('id_dosen'), 'id_mahasiswa' => '183307018']);
    //     $this->db->or_where(['pembimbing2' => $this->session->userdata('id_dosen'), 'id_mahasiswa' => '183307018']);
    //     // $this->db->where("pembimbing.id_mahasiswa", $id);
    //     // $this->db->or_where("pembimbing.pembimbing1", $this->session->userdata('id_dosen'));
    //     // $this->db->or_where("pembimbing.pembimbing2", $this->session->userdata('id_dosen'));
    //     $query = $this->db->get()->row();
    //     return $query;
    // }

    // public function getbyid($id)
    // {
    //     // return $this->db->get_where('user', ["id_user" => $id])->row();
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->join('dosen', 'dosen.id_dosen=user.id_dosen');
    //     $this->db->where("user.id_user", $id);
    //     $query = $this->db->get()->row();
    //     return $query;
    // }
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

    // function bimbingan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('pembimbing');
    //     $this->db->join('user', 'user.id_user=pembimbing.id_mahasiswa');
    //     $query = $this->db->get();
    //     return $query;
    // }

    // function bimbingan_mhs()
    // {
    //     $this->db->select('*');
    //     $this->db->from('pembimbing');
    //     $this->db->join('user', 'user.nim=pembimbing.id_mahasiswa');
    //     $this->db->where('pembimbing.id_mahasiswa', $this->session->userdata('nim'));
    //     $query = $this->db->get();
    //     return $query;
    // }

    function bimbingan_mhs()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->where('master_ta.nim', $this->session->userdata('nim'));
        $query = $this->db->get();
        return $query;
    }

    // function bimbingan_dosen()
    // {
    //     $this->db->select('*');
    //     $this->db->from('bimbingan');
    //     $this->db->join('user', 'user.id_user=bimbingan.id_user_dosen');
    //     $this->db->where('bimbingan.id_user_dosen', $this->session->userdata('id_user'));
    //     // $this->db->where('pembimbing.pembimbing1', $this->session->userdata('id_user'));
    //     // $this->db->or_where('pembimbing.pembimbing2', $this->session->userdata('id_user'));
    //     $query = $this->db->get();
    //     return $query;
    // }
    function bimbingan_dosen()
    {
        // $this->db->select('*');
        // $this->db->from('pembimbing');
        // // $this->db->join('user', 'user.id_user=pembimbing.pembimbing1');
        // $this->db->where('pembimbing.pembimbing1', $this->session->userdata('id_dosen'));
        // $this->db->or_where('pembimbing.pembimbing2', $this->session->userdata('id_dosen'));
        // $query = $this->db->get();
        // return $query;
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
            // 'nim' => $this->input->post('nim'),
            'id_master_ta' => $this->input->post('id_master_ta'),
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

    // function tambah_data(){
    // 	$data = array(
    // 		'nim' => $this->input->post('nim'),
    // 		'nama' => $this->input->post('nama'),
    // 		'prodi' => $this->input->post('prodi'),
    // 		'jurusan' => $this->input->post('jurusan'),
    // 	);
    // 	$this->db->insert('mahasiswa', $data);
    // 	redirect('../mahasiswa');
    // }

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
