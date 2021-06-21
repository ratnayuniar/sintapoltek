<?php
class M_bimbingan1 extends CI_Model
{

    function tampil_data()
    {
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');

        return $this->db->get('bimbingan')->row();
    }

    function get_nim($id_bimbingan)
    {
        $this->db->join('user', 'bimbingan.nim = user.nim', 'left');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        $this->db->join('jurusan', 'user.id_jurusan = jurusan.id_jurusan', 'left');
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('bimbingan.id_bimbingan', $id_bimbingan);

        return $this->db->get('bimbingan')->row();
    }


    // ini dipake
    function bimbingan_mhs()
    {
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('user', 'user.id_user=pembimbing.id_user');
        $this->db->where('pembimbing.id_user', $this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query;
    }

    function bimbingan_dosen()
    {
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->join('user', 'user.id_user=pembimbing.id_mahasiswa');
        $this->db->where('pembimbing.id_mahasiswa', $this->session->userdata('id_user'));
        // $query = $this->db->get();
        // return $query;
    }

    public function getmahasiswabyid($id)
    {
        return $this->db->get_where('user', ["id_user" => $id])->row();
    }
    public function getdosen1($id)
    {
        return $this->db->get_where('user', ["id_user" => $id])->row();
    }

    public function getdosen2($id)
    {
        return $this->db->get_where('user', ["id_user" => $id])->row();
    }

    function bimbingan_user_dosen()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        // $this->db->where('minggu', 14);
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.id_dosen', $this->session->userdata('id_dosen'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user58_dosen()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('minggu', 58);
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.id_dosen', $this->session->userdata('id_dosen'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user912_dosen()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('minggu', 912);
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.id_dosen', $this->session->userdata('id_dosen'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user1316_dosen()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('minggu', 1316);
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.id_dosen', $this->session->userdata('id_dosen'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user()
    {

        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->join('dosen', 'bimbingan.id_dosen = dosen.id_dosen', 'left');
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.nim', $this->session->userdata('nim'));
        $this->db->or_where('bimbingan.id_dosen', $this->session->userdata('id_dosen'));


        return $this->db->get('bimbingan');
    }

    function bimbingan_user58()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('minggu', 58);
        $this->db->where('status_dosen', 1);
        $this->db->where('bimbingan.nim', $this->session->userdata('nim'));
        $this->db->or_where('bimbingan.id_dosen', $this->session->userdata('id_user'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user912()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('bimbingan.nim', $this->session->userdata('nim'));
        $this->db->where('status_dosen', 1);
        $this->db->where('minggu', 912);
        $this->db->or_where('bimbingan.id_dosen', $this->session->userdata('id_user'));

        return $this->db->get('bimbingan');
    }

    function bimbingan_user1316()
    {
        // $this->db->join('detail_bimbingan', 'bimbingan.id_bimbingan = detail_bimbingan.bimbingan_id', 'left');
        $this->db->join('mahasiswa', 'bimbingan.nim = mahasiswa.nim', 'left');
        $this->db->where('bimbingan.nim', $this->session->userdata('nim'));
        $this->db->where('minggu', 1316);
        $this->db->where('status_dosen', 1);

        return $this->db->get('bimbingan');
    }

    function get_dosen()
    {
        // $this->db->join('mahasiswa', 'user.nim = mahasiswa.nim', 'left');
        // $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        // $this->db->join('user', 'bimbingan.id_dosen = user.id_dosen', 'left');
        $this->db->join('dosen', 'bimbingan.id_dosen = dosen.id_dosen', 'left');
        $this->db->where('status_dosen', 1);

        // $this->db->join('dosen', 'bimbingan.id_dosen = dosen.id_dosen', 'left');

        $this->db->where('bimbingan.nim', $this->session->userdata('nim'));

        $query = $this->db->get('bimbingan');
        return $query->row();
    }

    function get_tanggal()
    {
        return $this->db->query("SELECT * FROM `bimbingan` ORDER BY id_bimbingan DESC LIMIT 1")->row();
    }

    function get_mahasiswa()
    {
        // $this->db->join('mahasiswa', 'user.nim = mahasiswa.nim', 'left');
        // $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        // // $this->db->join('bimbingan', 'user.id_bimbingan = bimbingan.id_bimbingan', 'left');
        // $this->db->where('user.id_user', $this->session->userdata('id_user'));

        // $query = $this->db->get('user');
        // return $query->row();
        // $this->db->join('mahasiswa', 'user.nim = mahasiswa.nim', 'left');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
        // $this->db->join('bimbingan', 'user.id_bimbingan = bimbingan.id_bimbingan', 'left');
        $this->db->where('mahasiswa.nim', $this->session->userdata('nim'));

        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            // 'dosen' => $this->input->post('dosen'),
            'id_dosen' => $this->input->post('id_dosen'),
            'masalah' => $this->input->post('masalah'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => 0,
            // 'id_user' => $this->session->userdata('id_user'),
            // 'minggu' => 14,
            'status_dosen' => 1,

        );

        $this->db->insert('bimbingan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');

        redirect('/bimbingan1/minggu14');
    }

    function tambah_data58()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'dosen' => $this->input->post('dosen'),
            'id_dosen' => $this->input->post('id_dosen'),
            'masalah' => $this->input->post('masalah'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => 0,
            // 'id_user' => $this->session->userdata('id_user'),
            'minggu' => 58,
            'status_dosen' => 1,
        );

        $this->db->insert('bimbingan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');

        redirect('/bimbingan1/minggu58');
    }

    function tambah_data912()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'dosen' => $this->input->post('dosen'),
            'id_dosen' => $this->input->post('id_dosen'),
            'masalah' => $this->input->post('masalah'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => 0,
            // 'id_user' => $this->session->userdata('id_user'),
            'minggu' => 912,
            'status_dosen' => 1,
        );

        $this->db->insert('bimbingan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');

        redirect('/bimbingan1/minggu912');
    }

    function tambah_data1316()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'dosen' => $this->input->post('dosen'),
            'id_dosen' => $this->input->post('id_dosen'),
            'masalah' => $this->input->post('masalah'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => 0,
            // 'id_user' => $this->session->userdata('id_user'),
            'minggu' => 1316,
            'status_dosen' => 1,
        );

        $this->db->insert('bimbingan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');

        redirect('/bimbingan1/minggu1316');
    }


    function ubah_data($id_bimbingan)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'bidang' => $this->input->post('bidang'),
            'judul' => $this->input->post('judul'),
            'lokasi' => $this->input->post('lokasi'),
            'status' => $this->input->post('status'),
        );
        $this->db->where(array('id_bimbingan' => $id_bimbingan));
        $this->db->update('bimbingan', $data);
        redirect('/bimbingan');
    }


    function hapus_data($id_bimbingan)
    {
        $this->db->where(array('id_bimbingan' => $id_bimbingan));
        $this->db->delete('bimbingan');
        redirect('/bimbingan');
    }





    function get_id_user($id_user)
    {
        $this->db->join('user', 'bimbingan.id_user = user.id_user', 'left');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
        $this->db->join('jurusan', 'user.id_jurusan = jurusan.id_jurusan', 'left');

        $this->db->where('id_user', $id_user);

        return $this->db->get('bimbingan')->row();
    }

    function get_id_bimbingan($id)
    {
        $this->db->where('id_bimbingan', $id);
        return $this->db->get('bimbingan');
    }

    function delete($id)
    {
        $this->db->where('id_bimbingan', $id);
        $this->db->delete('bimbingan');
    }

    function update($id, $data)
    {
        $this->db->where('id_bimbingan', $id);
        $this->db->update('bimbingan', $data);
    }

    function insert_komentar($data)
    {
        return $this->db->insert('detail_bimbingan', $data);
    }
}
