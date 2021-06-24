<?php
class M_bks_pkl extends CI_Model
{

    function tampil_data()
    {
        // return $this->db->get('bks_seminar');
        return $this->db->query("SELECT * FROM mahasiswa, bks_pkl WHERE mahasiswa.nim=bks_pkl.nim");
    }

    function bks_pkl_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_pkl.nim', 'left');
        $this->db->where('bks_pkl.nim', $this->session->userdata('email'));
        return $this->db->get('bks_pkl');
    }



    // function bks_pkl_admin($id_prodi)
    // {
    //     $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_pkl.nim,bks_pkl.status,bks_pkl.id_bks_pkl, COUNT(*) AS jumlah")->group_by('bks_pkl.nim');
    //     $this->db->join('mahasiswa', 'mahasiswa.nim=bks_pkl.nim', 'left');
    //     $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
    //     return $this->db->get('bks_pkl');
    // }

    function bks_pkl_admin($id_prodi)
    {
        $this->db->select("mahasiswa.nama, mahasiswa.nim, bks_pkl.nim,bks_pkl.status,bks_pkl.id_bks_pkl, COUNT(*) AS jumlah")->group_by('bks_pkl.nim');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_pkl.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('bks_pkl');

        //return $this->db->query("SELECT nim,status,id_bks_ket, COUNT(*) AS jumlah FROM bks_keterampilan AS jumlah GROUP BY nim ");
        // return $this->db->query("SELECT * FROM mahasiswa, bks_keterampilan WHERE mahasiswa.nim=bks_keterampilan.nim");
    }

    function insert($data)
    {
        return $this->db->insert('bks_pkl', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_bks_pkl', $id);
        $this->db->update('bks_pkl', $data);
    }

    function get_nim($nim)
    {
        // $this->db->join('user', 'user.nim = bks_pkl.nim', 'left');
        $this->db->join('mahasiswa', 'bks_pkl.nim = mahasiswa.nim', 'left');
        $this->db->where('bks_pkl.nim', $nim);

        return $this->db->get('bks_pkl');
    }

    public function ambil_id_gambar($id_bks_pkl)
    {
        $this->db->from('bks_pkl');
        $this->db->where('id_bks_pkl', $id_bks_pkl);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }

    public function delete_users($id_bks_pkl)
    {
        $this->db->where('id_bks_pkl', $id_bks_pkl);
        $this->db->delete('bks_pkl');
        return TRUE;
    }

    public function update_users($data, $where)
    {
        $this->db->where($where);
        $this->db->update('bks_pkl', $data);
        return TRUE;
    }

    public function ambil_id_users($id_bks_pkl)
    {
        $data = $this->db->where(['id_bks_pkl' => $id_bks_pkl])
            ->get("bks_pkl");
        if ($data->num_rows() > 0) {
            return $data->row();
        }
    }

    // function bks_pkl_admin()
    // {

    //     $this->db->select('*');
    //     $this->db->join('mahasiswa', 'mahasiswa.nim=bks_pkl.nim', 'left');
    //     $this->db->where('bks_pkl.nim', $this->session->userdata('nim'));
    //     $this->db->or_where('bks_pkl.id_prodi', $this->session->userdata('id_prodi'));
    //     return $this->db->get('bks_pkl');
    // }
}
