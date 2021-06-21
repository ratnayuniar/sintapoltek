<?php
class M_bks_wisuda extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->get('bks_wisuda');
        return $this->db->query("SELECT * FROM mahasiswa, bks_wisuda WHERE mahasiswa.nim=bks_wisuda.nim");
    }

    function bks_wisuda_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->where('bks_wisuda.nim', $this->session->userdata('nim'));
        $this->db->or_where('bks_wisuda.id_prodi', $this->session->userdata('id_prodi'));
        return $this->db->get('bks_wisuda');
    }

    function insert($data)
    {
        return $this->db->insert('bks_wisuda', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_wisuda', $id);
        $this->db->update('bks_wisuda', $data);
    }

    function get_nim($id_bks_wisuda)
    {
        $this->db->join('user', 'bks_wisuda.nim = user.nim', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.nim = user.nim', 'left');
        $this->db->where('id_bks_wisuda', $id_bks_wisuda);

        return $this->db->get('bks_wisuda')->row();
    }


    public function ambil_id_gambar($id_bks_wisuda)
    {
        $this->db->from('bks_wisuda');
        $this->db->where('id_bks_wisuda', $id_bks_wisuda);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_wisuda)
    {
        $this->db->where('id_bks_wisuda', $id_bks_wisuda);
        $this->db->delete('bks_wisuda');
        return TRUE;
    }

    public function update_users($data, $where)
    {
        $this->db->where($where);
        $this->db->update('bks_wisuda', $data);
        return TRUE;
    }

    public function ambil_id_users($id_bks_wisuda)
    {
        $data = $this->db->where(['id_bks_wisuda' => $id_bks_wisuda])
            ->get("bks_wisuda");
        if ($data->num_rows() > 0) {
            return $data->row();
        }
    }
}
