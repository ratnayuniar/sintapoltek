<?php
class M_veri_perpus extends CI_Model
{

    function tampil_data()
    {
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');

        return $this->db->get('bks_wisuda');
    }

    public function get_mahasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('bks_wisuda');
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->join('master_ta', 'master_ta.nim = mahasiswa.nim', 'left');
        $this->db->where('prodi.id_prodi', $id);
        return $this->db->get()->result();
    }

    function ubah_data($nim)
    {
        $data = array(
            'laporan_perpus' => $this->input->post('laporan_perpus'),
            'catatan_laporan_perpus' => $this->input->post('catatan_laporan_perpus'),

        );
        // print_r($data);
        // exit();

        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/veri_perpus');
    }

    function ubah_data2($nim)
    {
        $data = array(
            'tanggungan_perpus' => $this->input->post('tanggungan_perpus'),
            'catatan_tanggungan_perpus' => $this->input->post('catatan_tanggungan_perpus'),

        );
        // print_r($data);
        // exit();

        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/veri_perpus');
    }


    function tampil2()
    {
        $this->db->join('mahasiswa', 'mahasiswa.nim=perpustakaan.nim', 'left');

        return $this->db->get('perpustakaan');
    }

    function insert($data)
    {
        return $this->db->insert('bks_wisuda', $data);
    }

    function update($id, $data)
    {
        $this->db->where('nim', $id);
        $this->db->update('bks_wisuda', $data);
    }

    function get_nim($id_perpus)
    {
        $this->db->join('mahasiswa', 'perpustakaan.nim = mahasiswa.nim', 'left');
        $this->db->where('id_perpus', $id_perpus);

        return $this->db->get('perpustakaan')->row();
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
