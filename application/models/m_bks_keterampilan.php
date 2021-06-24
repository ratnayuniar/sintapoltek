<?php
class M_bks_keterampilan extends CI_Model
{

    function bks_keterampilan_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_keterampilan.nim', 'left');
        $this->db->where('bks_keterampilan.nim', $this->session->userdata('email'));
        return $this->db->get('bks_keterampilan');
    }

    function bks_keterampilan_admin($id_prodi)
    {
        $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_keterampilan.nim,bks_keterampilan.status,bks_keterampilan.id_bks_ket, COUNT(*) AS jumlah")->group_by('bks_keterampilan.nim');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_keterampilan.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('bks_keterampilan');
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_ket', $id);
        $this->db->update('bks_keterampilan', $data);
    }

    function get_nim($nim)
    {
        $this->db->join('mahasiswa', 'bks_keterampilan.nim = mahasiswa.nim', 'left');
        $this->db->where('bks_keterampilan.nim', $nim);

        return $this->db->get('bks_keterampilan');
    }

    function get_nim_mhs($id_bks_ket)
    {
        $this->db->join('user', 'user.nim = bks_keterampilan.nim', 'left');
        $this->db->join('mahasiswa', 'bks_keterampilan.nim = mahasiswa.nim', 'left');
        $this->db->where('id_bks_ket', $id_bks_ket);

        return $this->db->get('bks_keterampilan');
    }

    public function ambil_id_gambar($id_bks_ket)
    {
        $this->db->from('bks_keterampilan');
        $this->db->where('id_bks_ket', $id_bks_ket);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_ket)
    {
        $this->db->where('id_bks_ket', $id_bks_ket);
        $this->db->delete('bks_keterampilan');
        return TRUE;
    }
}
