<?php
class M_verif_baak extends CI_Model
{

    function tampil_data()
    {
        $this->db->join('mahasiswa', 'bks_wisuda.nim = mahasiswa.nim', 'left');
        return $this->db->get('bks_wisuda');
    }

    public function get_mahasiswa($id)
    {
        // $this->db->select('*');
        // $this->db->from('bks_wisuda');
        // $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');
        // $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        // $this->db->where('prodi.id_prodi', $id);
        // return $this->db->get()->result();
        $this->db->select('*');
        $this->db->join('mahasiswa', 'bks_wisuda.nim=mahasiswa.nim', 'left');
        $this->db->join('prodi', 'mahasiswa.id_prodi=prodi.id_prodi', 'left');
        $this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
        $this->db->join('topik', 'master_ta.nim = topik.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id));
        return $this->db->get('bks_wisuda');
    }

    function ubah_data($nim)
    {
        $id_prodi = $this->input->post('id_prodi');
        $data = array(
            'status_baak' => $this->input->post('status_baak'),
            'catatan_baak' => $this->input->post('catatan_baak'),

        );
        // print_r($data);
        // exit();

        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        // redirect('/veri_perpus');
        redirect('verif_baak/detaildata/' . $id_prodi);
    }

    function ubah_data2($nim)
    {
        $id_prodi = $this->input->post('id_prodi');
        $data = array(
            'foto_wisuda' => $this->input->post('foto_wisuda'),
            'catatan_tanggungan_perpus' => $this->input->post('catatan_tanggungan_perpus'),

        );
        // print_r($data);
        // exit();

        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        // redirect('/veri_perpus');
        redirect('verif_baak/detaildata/' . $id_prodi);
    }

    function insert($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    function bks_wisuda_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->where('bks_wisuda.id_user', $this->session->userdata('id_user'));
        $this->db->or_where('bks_wisuda.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('bks_wisuda');
    }

    function update($id, $data)
    {
        $this->db->where('nim', $id);
        $this->db->update('mahasiswa', $data);
    }

    function keuangan_user()
    {
        $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
        $this->db->where('mahasiswa.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('mahasiswa');
    }

    function get_nim($nim)
    {
        $this->db->join('mahasiswa', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->where('nim', $nim);

        return $this->db->get('prodi')->row();
    }

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'laporan' => $this->input->post('laporan'),
            'tanggungan' => $this->input->post('tanggungan'),
        );
        $this->db->insert('perpustakaan', $data);
        redirect('/veri_perpus');
    }

    // function ubah_data($id_perpus)
    // {
    //     $data = array(
    //         'nim' => $this->input->post('nim'),
    //         'nama' => $this->input->post('nama'),
    //         'laporan' => $this->input->post('laporan'),
    //         'tanggungan' => $this->input->post('tanggungan')
    //     );
    //     $this->db->where(array('id_perpus' => $id_perpus));
    //     $this->db->update('perpustakaan', $data);
    //     redirect('/perpustakaan');
    // }
}
