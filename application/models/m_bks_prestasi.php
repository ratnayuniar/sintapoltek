<?php
class M_bks_prestasi extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->get('bks_seminar');
        return $this->db->query("SELECT * FROM mahasiswa, bks_prestasi WHERE mahasiswa.nim=bks_prestasi.nim");
    }

    function bks_prestasi_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_prestasi.nim', 'left');
        $this->db->where('bks_prestasi.nim', $this->session->userdata('nim'));
        $this->db->or_where('bks_prestasi.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('bks_prestasi');
    }

    function bks_prestasi_admin()
    {


        $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_prestasi.nim,bks_prestasi.status,bks_prestasi.id_bks_prestasi, COUNT(*) AS jumlah")->group_by('bks_prestasi.nim');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_prestasi.nim', 'left');
        return $this->db->get('bks_prestasi');
        // return $this->db->query("SELECT * FROM mahasiswa, bks_prestasi WHERE mahasiswa.nim=bks_prestasi.nim");
    }

    function insert($data)
    {
        return $this->db->insert('bks_prestasi', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_prestasi', $id);
        $this->db->update('bks_prestasi', $data);
    }

    function get_nim($nim)
    {
        $this->db->join('user', 'user.nim = bks_prestasi.nim', 'left');
        $this->db->join('mahasiswa', 'bks_prestasi.nim = mahasiswa.nim', 'left');
        $this->db->where('bks_prestasi.nim', $nim);

        return $this->db->get('bks_prestasi');
    }

    public function ambil_id_gambar($id_bks_prestasi)
    {
        $this->db->from('bks_prestasi');
        $this->db->where('id_bks_prestasi', $id_bks_prestasi);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_prestasi)
    {
        $this->db->where('id_bks_prestasi', $id_bks_prestasi);
        $this->db->delete('bks_prestasi');
        return TRUE;
    }

    public function update_users($data, $where)
    {
        $this->db->where($where);
        $this->db->update('bks_prestasi', $data);
        return TRUE;
    }

    public function ambil_id_users($id_bks_prestasi)
    {
        $data = $this->db->where(['id_bks_prestasi' => $id_bks_prestasi])
            ->get("bks_prestasi");
        if ($data->num_rows() > 0) {
            return $data->row();
        }
    }
}
