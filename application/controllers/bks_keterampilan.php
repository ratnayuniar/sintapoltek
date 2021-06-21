<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_keterampilan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_keterampilan');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data['query'] = $this->m_bks_keterampilan->tampil_data(); 
        $data['bks_keterampilan_user'] = $this->m_bks_keterampilan->bks_keterampilan_user();
        $data['bks_keterampilan_admin'] = $this->m_bks_keterampilan->bks_keterampilan_admin();

        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_keterampilan')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_keterampilan', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_valid($id)
    {
        $this->m_bks_keterampilan->update($id, ['status' => 1]);
        redirect('bks_keterampilan', 'refresh');
    }

    function save_bks_tidakvalid($id)
    {
        $this->m_bks_keterampilan->update($id, ['status' => 2]);
        redirect('bks_keterampilan', 'refresh');
    }

    function detail_bks_ket($nim)
    {
        $data['bks_keterampilan'] = $this->m_bks_keterampilan->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_keterampilan']) {
            $data['title'] = 'SINA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_ket', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function detail_bks_ketmhs($nim)
    {
        $data['bks_keterampilan'] = $this->m_bks_keterampilan->get_nim_mhs($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_keterampilan']) {
            $data['title'] = 'SINA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_ket', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama_ket', 'Nama', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
            $config['upload_path'] = './assets/berkas/keterampilan/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_keterampilan-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['sk_ket'])) {
                $this->upload->do_upload('sk_ket');
                $data1 = $this->upload->data();
                $sk_ket = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $nama_ket = $this->input->post('nama_ket', TRUE);
                $jenis = $this->input->post('jenis', TRUE);
                $tingkat = $this->input->post('tingkat', TRUE);
                $data = [
                    'nim' => $nim,
                    'nama_ket' => $nama_ket,
                    'jenis' => $jenis,
                    'tingkat' => $tingkat,
                    'sk_ket' => $sk_ket,
                    'status' => 0,
                    'id_prodi' => $this->session->userdata('id_prodi')
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bks_keterampilan', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_keterampilan');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }


    public function delete_users($id_bks_ket)
    {
        $data = $this->m_bks_keterampilan->ambil_id_gambar($id_bks_ket);
        // lokasi gambar berada
        $path = './assets/berkas/wisuda/';
        @unlink($path . $data->berita_acara); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->persetujuan); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->proposal);
        @unlink($path . $data->presentasi);
        @unlink($path . $data->monitoring);
        if ($this->m_bks_keterampilan->delete_users($id_bks_ket) == TRUE) {
            // TAMPILKAN PESAN JIKA BERHASIL
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_keterampilan');
    }

    // public function update_users()
    // {
    //     $this->form_validation->set_rules('nim', 'nim', 'required');
    //     $this->form_validation->set_error_delimiters('', '');
    //     $this->load->library('upload');
    //     $path = './assets/berkas/wisuda/';
    //     $config['upload_path'] = $path;
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //     $config['max_size']     = '2048';
    //     $config['max_width'] = '1024';
    //     $config['max_height'] = '768';
    //     $nama_file = "gambar_" . time();
    //     $config['file_name'] = $nama_file;
    //     $this->upload->initialize($config);

    //     $id_bks_ket = $this->input->post('id_bks_ket');
    //     $gambar_lama = $this->input->post('ganti_gambar');

    //     if ($_FILES['berita_acara']['name']) {
    //         $field_name = "berita_acara";
    //         if ($this->form_validation->run() &&  $this->upload->do_upload($field_name)) {
    //             $nim = $this->input->post('nim'); //sesuaikan nama fiednya denagn inputan ok

    //             $gambar = $this->upload->data();
    //             $user = ([
    //                 'nim' => $nim,
    //                 'status' => 0,
    //                 'berita_acara' => $gambar['file_name']
    //             ]);
    //             $data = array_merge($user);

    //             @unlink($path . $gambar_lama);
    //             $where = array('id_bks_ket' => $id_bks_ket);
    //             if ($this->m_bks_keterampilan->update_users($data, $where) == TRUE) {
    //                 $this->session->set_flashdata('pesan', 'di edit');
    //                 redirect('bks_keterampilan');
    //             } else {
    //                 $this->index();
    //             }
    //         } else {
    //             $this->index();
    //         }
    //     }

    //     if ($_FILES['persetujuan']['name']) {
    //         $field_name = "persetujuan";
    //         if ($this->form_validation->run() &&  $this->upload->do_upload($field_name)) {
    //             $nim = $this->input->post('nim'); //sesuaikan nama fiednya denagn inputan ok

    //             $gambar = $this->upload->data();
    //             $user = ([
    //                 'nim' => $nim,
    //                 'status' => 0,
    //                 'persetujuan' => $gambar['file_name']
    //             ]);
    //             $data = array_merge($user);

    //             @unlink($path . $gambar_lama);
    //             $where = array('id_bks_ket' => $id_bks_ket);
    //             if ($this->m_bks_keterampilan->update_users($data, $where) == TRUE) {
    //                 $this->session->set_flashdata('pesan', 'di edit');
    //                 redirect('bks_keterampilan');
    //             } else {
    //                 $this->index();
    //             }
    //         } else {
    //             $this->index();
    //         }
    //     }
    // }

    // public function ambil_id_user($id_bks_ket)
    // {
    //     $title = "edit data";
    //     $data = $this->m_bks_keterampilan->ambil_id_users($id_bks_ket);
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('berkas/edit_bks_keterampilan', ['data' => $data, 'title' => $title]);
    //     $this->load->view('templates/footer');
    // }

    // function save_bks_lengkap($id)
    // {
    //     $this->m_bks_keterampilan->update($id, ['status' => 3]);
    //     redirect('bks_keterampilan', 'refresh');
    // }
}
