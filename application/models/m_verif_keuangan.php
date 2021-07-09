<?php
class M_verif_keuangan extends CI_Model
{

    function tampil_data()
    {
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');
        return $this->db->get('bks_wisuda');
    }

    function insert($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function get_mahasiswa($id_prodi)
    {
        $this->db->select('*');
        $this->db->from('bks_wisuda');
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->join('master_ta', 'master_ta.nim = mahasiswa.nim', 'left');
        $this->db->where('prodi.id_prodi', $id_prodi);
        return $this->db->get()->result();
    }

    function ubah_data($nim)
    {
        $data = array(
            'ukt' => $this->input->post('ukt'),
            'catatan_ukt' => $this->input->post('catatan_ukt'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/verif_keuangan');
    }

    function update($id, $data)
    {
        $this->db->where('nim', $id);
        $this->db->update('bks_wisuda', $data);
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
