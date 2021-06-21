<?php
class M_verif_lab extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->query("SELECT * FROM jurusan, mahasiswa,prodi WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi");
        // return $this->db->query("SELECT * FROM jurusan, user,prodi WHERE jurusan.id_jurusan=user.id_jurusan AND prodi.id_prodi=user.id_prodi");
        // $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan', 'left');
        // $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
        return $this->db->get('mahasiswa');
    }

    function tampil2()
    {
        $this->db->join('mahasiswa', 'mahasiswa.nim=perpustakaan.nim', 'left');
        // $this->db->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left'); 

        return $this->db->get('perpustakaan');
    }

    function insert($data)
    {
        return $this->db->insert('bks_wisuda', $data);
    }

    function update($id, $data)
    {
        $this->db->where('nim', $id);
        $this->db->update('mahasiswa', $data);
    }

    function get_nim($id_perpus)
    {
        $this->db->join('mahasiswa', 'perpustakaan.nim = mahasiswa.nim', 'left');
        // $this->db->join('user', 'bks_bahasa.id_user = user.id_user', 'left');
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

    function ubah_data($id_perpus)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'laporan' => $this->input->post('laporan'),
            'tanggungan' => $this->input->post('tanggungan')
        );
        $this->db->where(array('id_perpus' => $id_perpus));
        $this->db->update('perpustakaan', $data);
        redirect('/perpustakaan');
    }

    // function get_nim($nim)
    // {
    // 	$this->db->join('user', 'topik.id_user = user.id_user', 'left');
    // 	$this->db->join('prodi', 'user.id_prodi = prodi.id_prodi', 'left');
    // 	$this->db->join('jurusan', 'user.id_jurusan = jurusan.id_jurusan', 'left');
    // 	$this->db->join('detail_topik', 'topik.id_topik = detail_topik.topik_id', 'left');
    // 	$this->db->join('mahasiswa', 'bks_seminar.id_mhs = mahasiswa.id_mhs', 'left');
    // 	$this->db->where('nim', $nim);

    // 	return $this->db->get('bks_seminar')->row();
    // }



    // function tambah_data(){
    // 	$data = array(
    // 		'nim' => $this->input->post('nim'),
    // 		'nama' => $this->input->post('nama'),
    // 		'prodi' => $this->input->post('prodi'),
    // 		'jurusan' => $this->input->post('jurusan'),
    // 	);
    // 	$this->db->insert('bks_seminar', $data);
    // 	redirect('../bks_seminar');
    // }





    // function hapus_data($id_mhs){
    // 	$this->db->where(array('id_mhs'=> $id_mhs));
    // 	$this->db->delete('bks_seminar');
    // 	redirect('../bks_seminar');
    // }


}
