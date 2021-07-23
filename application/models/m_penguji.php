<?php
class M_penguji extends CI_Model
{

    function tampil_data($id_prodi)
    {

        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        $this->db->where('master_ta.penguji1_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji2_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji3_sempro', $this->session->userdata('id_dosen'));
        $query = $this->db->get('master_ta');
        return $query;
    }

    function tampil_data2($id_prodi)
    {

        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim', 'left');
        //revisi di hide karena bikin tmbah penguji error
        // $this->db->join('revisi', 'master_ta.penguji1_sempro = revisi.penguji', 'left');

        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('master_ta');
    }


    function bimbingan_dosen()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('dosen', 'dosen.id_dosen=master_ta.penguji1_sempro');
        //dijoin dengan nilai
        // $this->db->join('nilai_sempro', 'master_ta.penguji1_sempro = nilai_sempro.id_dosen', 'left');

        $this->db->where('master_ta.penguji1_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji2_sempro', $this->session->userdata('id_dosen'));
        $this->db->or_where('master_ta.penguji3_sempro', $this->session->userdata('id_dosen'));
        $query = $this->db->get();
        return $query;
    }

    function bimbingan_nilai_dosen()
    {
        // $this->db->select('*');
        // $this->db->from('master_ta');
        // $this->db->join('dosen', 'dosen.id_dosen=master_ta.penguji1_sempro');
        // // $this->db->join('nilai_sempro', 'master_ta.nim = nilai_sempro.nim', 'left');
        // $this->db->where('master_ta.penguji1_sempro', $this->session->userdata('id_dosen'));
        // $this->db->or_where('master_ta.penguji2_sempro', $this->session->userdata('id_dosen'));
        // $this->db->or_where('master_ta.penguji3_sempro', $this->session->userdata('id_dosen'));
        // // $this->db->where('nilai_sempro.id_dosen', $this->session->userdata('id_dosen'));
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

    function getrata()
    {
        $this->db->select('*');
        $this->db->from('nilai_sempro');
        $this->db->where('id_dosen', $this->session->userdata('id_dosen'));
        return $this->db->get()->row();
    }

    function getNilaiSempro()
    {
        $this->db->query('
        SELECT mahasiswa.nama, mahasiswa.nim, nilai_sempro.id_dosen, dospeng_sempro1.nama AS dospeng_sempro1, dospeng_sempro2.nama AS dospeng_sempro2,
        dospeng_sempro3.nama AS dospeng_sempro3, nilai_sempro.rata as rata_rata, nilai_sempro.nilai_akhir as nilai_akhir

        FROM master_ta

        JOIN mahasiswa ON master_ta.nim = mahasiswa.nim

        JOIN dosen AS dospeng_sempro1 ON dospeng_sempro1.id_dosen = master_ta.penguji1_sempro
        JOIN dosen AS dospeng_sempro2 ON dospeng_sempro2.id_dosen = master_ta.penguji2_sempro
        JOIN dosen AS dospeng_sempro3 ON dospeng_sempro3.id_dosen = master_ta.penguji3_sempro

        LEFT JOIN nilai_sempro ON nilai_sempro.nim = master_ta.nim

        WHERE nilai_sempro.id_dosen = ' . $this->session->userdata('id_dosen') . ' AND master_ta.penguji1_sempro = ' . $this->session->userdata('id_dosen') . ' OR master_ta.penguji2_sempro = ' . $this->session->userdata('id_dosen') . '
        OR master_ta.penguji3_sempro = ' . $this->session->userdata('id_dosen') . '
        And nilai_sempro.id_dosen = ' . $this->session->userdata('id_dosen') . '
        ')->result_array();
        return $this->db->get_where('nilai_sempro', array('id_dosen' => $this->session->userdata('id_dosen')),);
    }



    function bimbingan_mhs()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->where('penguji1_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji2_sempro is NOT NULL', NULL, FALSE);
        $this->db->where('penguji3_sempro is NOT NULL', NULL, FALSE);
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
            'penguji1_sempro' => $this->input->post('penguji1_sempro'),
            'penguji2_sempro' => $this->input->post('penguji2_sempro'),
            'penguji3_sempro' => $this->input->post('penguji3_sempro'),
        );
        $this->db->insert('master_ta', $data);
        redirect('/penguji');
    }

    function dosen_user()
    {
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
