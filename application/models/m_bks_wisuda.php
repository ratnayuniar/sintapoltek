<?php
class M_bks_wisuda extends CI_Model
{

    function tampil_data()
    {
        return $this->db->query("SELECT * FROM mahasiswa, bks_wisuda WHERE mahasiswa.nim=bks_wisuda.nim");
    }

    function bks_wisuda_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left');
        $this->db->where('bks_wisuda.nim', $this->session->userdata('email'));
        $this->db->or_where('bks_wisuda.nim', $this->session->userdata('id_prodi'));
        return $this->db->get('bks_wisuda')->row();
    }

    function bks_baak_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left');
        $this->db->where('bks_wisuda.nim', $this->session->userdata('email'));
        $this->db->or_where('bks_wisuda.nim', $this->session->userdata('id_prodi'));
        return $this->db->get('bks_wisuda');
    }

    function bks_perpus_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left');
        $this->db->where('bks_wisuda.nim', $this->session->userdata('email'));
        return $this->db->get('bks_wisuda');
    }

    function bks_keuangan_user()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=bks_wisuda.nim', 'left');
        $this->db->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left');
        $this->db->where('bks_wisuda.nim', $this->session->userdata('email'));
        return $this->db->get('bks_wisuda');
    }



    function bks_wisuda_admin($id_prodi)
    {

        $this->db->select('*');
        $this->db->join('mahasiswa', 'bks_wisuda.nim=mahasiswa.nim', 'left');
        $this->db->join('master_ta', 'mahasiswa.nim = master_ta.nim', 'left');
        $this->db->join('topik', 'master_ta.nim = topik.nim', 'left');
        $this->db->where(array('mahasiswa.id_prodi' => $id_prodi));
        return $this->db->get('bks_wisuda');
    }

    function ubah_data($id_bks_wisuda)
    {
        $data = array(
            'status_file_ta' => $this->input->post('status_file_ta'),
            'catatan_file_ta' => $this->input->post('catatan_file_ta'),
            'tgl_file_ta' => $this->input->post('tgl_file_ta'),

        );

        // print_r($data);
        // exit();

        $this->db->where(array('id_bks_wisuda' => $id_bks_wisuda));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }

    function ubah_data2($nim)
    {
        $data = array(
            'status_jurnal' => $this->input->post('status_jurnal'),
            'catatan_jurnal' => $this->input->post('catatan_jurnal'),
            'tgl_jurnal' => $this->input->post('tgl_jurnal'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }


    function ubah_data3($nim)
    {
        $data = array(
            'status_lap_ta' => $this->input->post('status_lap_ta'),
            'catatan_lap_ta' => $this->input->post('catatan_lap_ta'),
            'tgl_lap_ta' => $this->input->post('tgl_lap_ta'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }

    function ubah_data4($nim)
    {
        $data = array(
            'status_aplikasi' => $this->input->post('status_aplikasi'),
            'catatan_aplikasi' => $this->input->post('catatan_aplikasi'),
            'tgl_aplikasi' => $this->input->post('tgl_aplikasi'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }

    function ubah_data5($nim)
    {
        $data = array(
            'status_ppt' => $this->input->post('status_ppt'),
            'catatan_ppt' => $this->input->post('catatan_ppt'),
            'tgl_ppt' => $this->input->post('tgl_ppt'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }

    function ubah_data6($nim)
    {
        $data = array(
            'status_video' => $this->input->post('status_video'),
            'catatan_video' => $this->input->post('catatan_video'),
            'tgl_video' => $this->input->post('tgl_video'),

        );
        $this->db->where(array('nim' => $nim));
        $this->db->update('bks_wisuda', $data);
        redirect('/bks_wisuda');
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
        // $this->db->join('user', 'bks_wisuda.nim = user.nim', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.nim = bks_wisuda.nim', 'left');
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

    function tambah_data()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'file_ta' => $this->input->post('file_ta'),
            'jurnal' => $this->input->post('jurnal'),
            'aplikasi' => $this->input->post('aplikasi'),
        );
        $this->db->insert('bks_wisuda', $data);
        redirect('/bks_wisuda');
    }

    // function ubah_data($nim)
    // {
    //     $data = array(
    //         // 'nim' => $this->input->post('nim'),
    //         'file_ta' => $this->input->post('file_ta'),
    //         'jurnal' => $this->input->post('jurnal'),
    //         'aplikasi' => $this->input->post('aplikasi')
    //     );
    //     $this->db->where(array('nim' => $nim));
    //     $this->db->update('bks_wisuda', $data);
    //     redirect('/bks_wisuda');
    // }
}
