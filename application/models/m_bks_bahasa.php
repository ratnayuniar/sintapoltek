<?php
class M_bks_bahasa extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->get('bks_seminar');
        return $this->db->query("SELECT * FROM mahasiswa, bks_bahasa WHERE mahasiswa.nim=bks_bahasa.nim");
    }

    function bks_bahasa_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_bahasa.nim', 'left');
        $this->db->where('bks_bahasa.nim', $this->session->userdata('email'));
        return $this->db->get('bks_bahasa');
    }

    function bks_bahasa_admin()
    {
        $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_bahasa.nim,bks_bahasa.status,bks_bahasa.id_bks_bhs, COUNT(*) AS jumlah")->group_by('bks_bahasa.nim');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_bahasa.nim', 'left');
        return $this->db->get('bks_bahasa');
    }

    public function get_mahasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('bks_bahasa');
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_bahasa.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->where('prodi.id_prodi', $id);
        return $this->db->get()->result();
    }

    function insert($data)
    {
        return $this->db->insert('bks_bahasa', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_bhs', $id);
        $this->db->update('bks_bahasa', $data);
    }

    function get_nim($nim)
    {
        $this->db->join('mahasiswa', 'bks_bahasa.nim = mahasiswa.nim', 'left');
        $this->db->where('bks_bahasa.nim', $nim);

        return $this->db->get('bks_bahasa');
    }


    public function ambil_id_gambar($id_bks_bhs)
    {
        $this->db->from('bks_bahasa');
        $this->db->where('id_bks_bhs', $id_bks_bhs);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_bhs)
    {
        $this->db->where('id_bks_bhs', $id_bks_bhs);
        $this->db->delete('bks_bahasa');
        return TRUE;
    }

    public function update_users($data, $where)
    {
        $this->db->where($where);
        $this->db->update('bks_bahasa', $data);
        return TRUE;
    }

    public function ambil_id_users($id_bks_bhs)
    {
        $data = $this->db->where(['id_bks_bhs' => $id_bks_bhs])
            ->get("bks_bahasa");
        if ($data->num_rows() > 0) {
            return $data->row();
        }
    }
}
