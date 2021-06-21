<?php
class M_penguji extends CI_Model
{

    function tampil_data()
    {

        $this->db->select('*');
        $this->db->where('penguji1_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji2_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji3_sempro is NOT NULL', NULL, FALSE);
        $query = $this->db->get('master_ta');
        return $query;
        // return $this->db->get('master_ta');
        // return $this->db->query("SELECT * FROM dosen, penguji WHERE dosen.id_dosen=penguji.penguji1");
        // return $this->db->query("SELECT * FROM dosen, penguji WHERE dosen.id_dosen=penguji.id_penguji2");
        // return $this->db->query("SELECT * FROM jurusan, prodi WHERE jurusan.id_jurusan=prodi.id_jurusan");
        // return $this->db->query("SELECT * FROM jurusan, mahasiswa,prodi WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi");
        // return $this->db->query("SELECT * FROM dosen, penguji,mahasiswa WHERE dosen.id_dosen=penguji.id_penguji1 AND mahasiswa.nim=penguji.id_penguji");
    }

    function bimbingan_dosen()
    {
        // $this->db->select('*');
        // $this->db->from('penguji');
        // $this->db->join('user', 'user.id_user=penguji.penguji1');
        // $this->db->where('penguji.penguji1', $this->session->userdata('id_user'));
        // $this->db->or_where('penguji.penguji2', $this->session->userdata('id_user'));
        // $this->db->or_where('penguji.penguji3', $this->session->userdata('id_user'));
        // $query = $this->db->get();
        // return $query;
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('dosen', 'dosen.id_dosen=master_ta.penguji1_sempro');
        $this->db->where('master_ta.penguji1_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji2_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji3_sempro', $this->session->userdata('id_dosen'));
        $query = $this->db->get();
        return $query;
    }

    //diganti
    function bimbingan_mhs()
    {
        // $this->db->select('*');
        // $this->db->from('penguji');
        // $this->db->join('user', 'user.id_user=penguji.id_mahasiswa');
        // $this->db->where('penguji.id_mahasiswa', $this->session->userdata('id_user'));
        // $query = $this->db->get();
        // return $query;
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->where('penguji1_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji2_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji3_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('master_ta.nim', $this->session->userdata('nim'));
        $query = $this->db->get();
        return $query;
    }

    // public function getmahasiswabyid($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('mahasiswa');
    //     $this->db->join('user', 'user.nim=mahasiswa.nim');
    //     $this->db->where("user.id_user", $id);
    //     $query = $this->db->get()->row();
    //     return $query;
    // }

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
    public function getdosen1($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        // $this->db->join('user', 'user.id_dosen=dosen.id_dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getdosen2($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        // $this->db->join('user', 'user.id_dosen=dosen.id_dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getdosen3($id)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        // $this->db->join('user', 'user.id_dosen=dosen.id_dosen');
        $this->db->where("dosen.id_dosen", $id);
        $query = $this->db->get()->row();
        return $query;
    }


    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'penguji1_sempro' => $this->input->post('penguji1_sempro'),
            'penguji2_sempro' => $this->input->post('penguji2_sempro'),
            'penguji3_sempro' => $this->input->post('penguji3_sempro'),
        );
        $this->db->insert('master_ta', $data);
        redirect('/penguji');
    }

    // function penguji_user()
    // {
    //     $this->db->join('mahasiswa', 'penguji.nim = mahasiswa.nim', 'left');
    //     $this->db->where('penguji.nim', $this->session->userdata('nim'));
    //     return $this->db->get('penguji');
    // }

    function dosen_user()
    {
        // $this->db->where('penguji.id_penguji1', $this->session->userdata('id_dosen'));
        // $this->db->where('penguji.id_penguji2', $this->session->userdata('id_dosen'));
        //$this->db->where('penguji.id_penguji1', $this->session->userdata('id_dosen'));
        $this->db->or_where('penguji.id_penguji1', $this->session->userdata('id_dosen'));
        $this->db->or_where('penguji.id_penguji2', $this->session->userdata('id_dosen'));
        $this->db->or_where('penguji.id_penguji3', $this->session->userdata('id_dosen'));

        return $this->db->get('penguji');
    }

    function cek_nim($nim)
    {
        $query = array('nim' => $nim);
        return $this->db->get_where('mahasiswa', $query);
    }

    function ubah_data($nim)
    {
        $data = array(
            // 'nim' => $this->input->post('nim'),
            'penguji1_sempro' => $this->input->post('penguji1_sempro'),
            'penguji2_sempro' => $this->input->post('penguji2_sempro'),
            'penguji3_sempro' => $this->input->post('penguji3_sempro')
        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('master_ta', $data);
        redirect('/penguji');
    }


    function hapus_data($id_penguji)
    {
        $this->db->where(array('id_penguji' => $id_penguji));
        $this->db->delete('penguji');
        redirect('/penguji');
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

    function get_id_penguji($id)
    {
        $this->db->where('id_penguji', $id);
        return $this->db->get('penguji');
    }

    function delete($id)
    {
        $this->db->where('id_penguji', $id);
        $this->db->delete('penguji');
    }
}
