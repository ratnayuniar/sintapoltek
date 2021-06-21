<?php
class M_prodi2 extends CI_Model
{
    function tampil_data()
    {
        return $this->db->query("SELECT * FROM jurusan, prodi WHERE jurusan.id_jurusan=prodi.id_jurusan");
    }

    function tambah_data()
    {
        $data = array(

            'id_jurusan' => $this->input->post('id_jurusan'),
            'nama_prodi' => $this->input->post('nama_prodi'),
        );
        $this->db->insert('prodi', $data);
        redirect('/prodi2');
    }

    function ubah_data($id_prodi)
    {
        $data = array(

            'id_jurusan' => $this->input->post('id_jurusan'),
            'nama_prodi' => $this->input->post('nama_prodi'),
        );
        $this->db->where(array('id_prodi' => $id_prodi));
        $this->db->update('prodi', $data);
        redirect('/prodi2');
    }

    function hapus_data($id_prodi)
    {
        $this->db->where(array('id_prodi' => $id_prodi));
        $this->db->delete('prodi');
        redirect('/prodi2');
    }

    function delete($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->delete('prodi');
    }

    function get_id_prodi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('prodi');
    }
}
