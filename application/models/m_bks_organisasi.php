<?php
class M_bks_organisasi extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->get('bks_seminar');
        return $this->db->query("SELECT * FROM mahasiswa, bks_organisasi WHERE mahasiswa.nim=bks_organisasi.nim");
    }

    function bks_organisasi_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_organisasi.nim', 'left');
        $this->db->where('bks_organisasi.nim', $this->session->userdata('email'));
        return $this->db->get('bks_organisasi');
    }

    function bks_organisasi_admin($id_prodi)
    {
        $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_organisasi.nim,bks_organisasi.status,bks_organisasi.id_bks_org, COUNT(*) AS jumlah")->group_by('bks_organisasi.nim');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_organisasi.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('bks_organisasi');
    }

    function insert($data)
    {
        return $this->db->insert('bks_organisasi', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_org', $id);
        $this->db->update('bks_organisasi', $data);
    }

    function get_nim($nim)
    {
        $this->db->join('mahasiswa', 'bks_organisasi.nim = mahasiswa.nim', 'left');
        $this->db->where('bks_organisasi.nim', $nim);

        return $this->db->get('bks_organisasi');
    }

    public function ambil_id_gambar($id_bks_org)
    {
        $this->db->from('bks_organisasi');
        $this->db->where('id_bks_org', $id_bks_org);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_org)
    {
        $this->db->where('id_bks_org', $id_bks_org);
        $this->db->delete('bks_organisasi');
        return TRUE;
    }

    public function update_users($data, $where)
    {
        $this->db->where($where);
        $this->db->update('bks_organisasi', $data);
        return TRUE;
    }

    public function ambil_id_users($id_bks_org)
    {
        $data = $this->db->where(['id_bks_org' => $id_bks_org])
            ->get("bks_organisasi");
        if ($data->num_rows() > 0) {
            return $data->row();
        }
    }
}
