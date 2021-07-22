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
        $this->db->join('topik', 'master_ta.judul=topik.id_topik');
        $this->db->join('dosen', 'master_ta.pembimbing1 = dosen.id_dosen', 'left');
        $this->db->where('master_ta.nim', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query;
    }

    function hp()
    {
        $this->db->select('*');
        $this->db->from('master_ta');
        $this->db->join('mahasiswa', 'mahasiswa.nim=master_ta.nim');
        $this->db->join('dosen', 'master_ta.pembimbing2 = dosen.id_dosen', 'left');
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

    // mengambil data mahasiswa untuk bimbingan 1 per id dosen

    function getMahasiswaByidDosen()
    {
        return $this->db->select('mahasiswa.nama as nama_mahasiswa, mahasiswa.nim as nim, topik.judul as judul')
            ->join('mahasiswa', 'mahasiswa.nim = master_ta.nim')
            ->join('topik', 'topik.id_topik = master_ta.judul')
            ->where('master_ta.pembimbing1', $this->session->userdata('id_dosen'))
            ->get('master_ta')->result_array();
    }

    function getMahasiswaByidDosenTA()
    {
        return $this->db->select('mahasiswa.nama as nama_mahasiswa, mahasiswa.nim as nim, topik.judul as judul')
            ->join('mahasiswa', 'mahasiswa.nim = master_ta.nim')
            ->join('topik', 'topik.id_topik = master_ta.judul')
            ->where('master_ta.pembimbing1', $this->session->userdata('id_dosen'), array('jenis' => 'ta'))
            ->get('master_ta')->result_array();
    }

    function getMahasiswaByidDosen2()
    {
        return $this->db->select('mahasiswa.nama as nama_mahasiswa, mahasiswa.nim as nim, topik.judul as judul')
            ->join('mahasiswa', 'mahasiswa.nim = master_ta.nim')
            ->join('topik', 'topik.id_topik = master_ta.judul')
            ->where('master_ta.pembimbing2', $this->session->userdata('id_dosen'))
            ->get('master_ta')->result_array();
    }

    function getMahasiswaByidDosen2TA()
    {
        return $this->db->select('mahasiswa.nama as nama_mahasiswa, mahasiswa.nim as nim, topik.judul as judul')
            ->join('mahasiswa', 'mahasiswa.nim = master_ta.nim')
            ->join('topik', 'topik.id_topik = master_ta.judul')
            ->where('master_ta.pembimbing2', $this->session->userdata('id_dosen'), array('jenis' => 'ta'))
            ->get('master_ta')->result_array();
    }

    function getBimbinganByNim($nim)
    {
        return $this->db->order_by('tanggal', 'DESC')->get_where('bimbingan', array('nim' => $nim, 'status_dosen' => '1', 'jenis' => 'seminar'))->result_array();
    }

    function getBimbinganByNimTA($nim)
    {
        return $this->db->order_by('tanggal', 'DESC')->get_where('bimbingan', array('nim' => $nim, 'status_dosen' => '1', 'jenis' => 'ta'))->result_array();
    }

    function getBimbinganByNim2($nim)
    {
        return $this->db->order_by('tanggal', 'DESC')->get_where('bimbingan', array('nim' => $nim, 'status_dosen' => '2', 'jenis' => 'seminar'))->result_array();
    }

    function getBimbinganByNim2TA($nim)
    {
        return $this->db->order_by('tanggal', 'DESC')->get_where('bimbingan', array('nim' => $nim, 'status_dosen' => '2', 'jenis' => 'ta'))->result_array();
    }

    function getJudulByNim($nim)
    {
        return $this->db->join('mahasiswa', 'mahasiswa.nim = topik.nim')->get_where('topik', array('topik.nim' => $nim))->row_array();
    }

    function cekJumlahBimbinganSeminarDospem1($nim)
    {
        return $this->db->select('status')
            ->where('status', 1)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('nim', $nim)
            ->where('status_dosen', 1)
            ->count_all_results('bimbingan');
    }

    function cekJumlahBimbinganSeminarDospem2($nim)
    {
        return $this->db->select('status')
            ->where('status', 1)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('nim', $nim)
            ->where('status_dosen', 2)
            ->count_all_results('bimbingan');
    }

    function cekJumlahBimbinganTaDospem1($nim)
    {
        return $this->db->select('status')
            ->where('status', 1)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('nim', $nim)
            ->where('status_dosen', 1)
            ->where('jenis', 'ta')
            ->count_all_results('bimbingan');
    }

    function cekPersetujuanBimbingan($nim)
    {
        return $this->db->where('nim', $nim)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('status_dosen', 1)
            ->where('jenis', 'proposal')
            ->count_all_results('persetujuan');
    }

    function cekPersetujuanBimbingan2($nim)
    {
        return $this->db->where('nim', $nim)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('status_dosen', 2)
            ->where('jenis', 'proposal')
            ->count_all_results('persetujuan');
    }

    function cekPersetujuanBimbinganTA($nim)
    {
        return $this->db->where('nim', $nim)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('status_dosen', 1)
            ->where('jenis', 'ta')
            ->count_all_results('persetujuan');
    }

    function cekPersetujuanBimbinganTA2($nim)
    {
        return $this->db->where('nim', $nim)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('status_dosen', 2)
            ->where('jenis', 'ta')
            ->count_all_results('persetujuan');
    }

    function cekJumlahBimbinganTADospem2($nim)
    {
        return $this->db->select('status')
            ->where('status', 1)
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->where('nim', $nim)
            ->where('status_dosen', 2)
            ->where('jenis', 'ta')
            ->count_all_results('bimbingan');
    }
}
