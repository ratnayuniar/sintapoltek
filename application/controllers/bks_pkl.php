<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_pkl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_pkl');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bks_pkl->tampil_data();

        $data['bks_pkl_user'] = $this->m_bks_pkl->bks_pkl_user();

        $data['bks_pkl_admin'] = $this->m_bks_pkl->bks_pkl_admin();

        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_pkl')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_pkl', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_valid($id)
    {
        $this->m_bks_pkl->update($id, ['status' => 1]);
        redirect('bks_pkl', 'refresh');
    }

    function save_bks_tidakvalid($id)
    {
        $this->m_bks_pkl->update($id, ['status' => 2]);
        redirect('bks_pkl', 'refresh');
    }

    function save_bks_lengkap($id)
    {
        $this->m_bks_seminar->update($id, ['status' => 3]);
        redirect('bks_seminar', 'refresh');
    }

    function detail_bks_pkl($nim)
    {
        $data['bks_pkl'] = $this->m_bks_pkl->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_pkl']) { 
            $data['title'] = 'SINTA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_pkl', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('tempat', 'Tempat', 'required');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
            $config['upload_path'] = './assets/berkas/magang/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_pkl-' . date('ymd');
            // $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['sk_pkl'])) {
                $this->upload->do_upload('sk_pkl');
                $data1 = $this->upload->data();
                $sk_pkl = $data1['file_name'];
            }

            if (!empty($_FILES['laporan'])) {
                $this->upload->do_upload('laporan');
                $data2 = $this->upload->data();
                $laporan = $data2['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $judul = $this->input->post('judul', TRUE);
                $tempat = $this->input->post('tempat', TRUE);
                $provinsi = $this->input->post('provinsi', TRUE);
                $kota = $this->input->post('kota', TRUE);
                $tanggal = $this->input->post('tanggal', TRUE);
                $ringkasan = $this->input->post('ringkasan', TRUE);
                $data = [
                    'nim' => $nim,
                    'judul' => $judul,
                    'tempat' => $tempat,
                    'provinsi' => $provinsi,
                    'kota' => $kota,
                    'tanggal' => $tanggal,
                    'sk_pkl' => $sk_pkl,
                    'laporan' => $laporan,
                    'ringkasan' => $ringkasan,
                    'status' => 0,
                    'id_prodi' => $this->session->userdata('id_prodi')
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bks_pkl', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_pkl');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function delete_users($id_bks_pkl)
    {
        $data = $this->m_bks_pkl->ambil_id_gambar($id_bks_pkl);
        // lokasi gambar berada
        $path = './assets/berkas/wisuda/';
        @unlink($path . $data->berita_acara); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->persetujuan); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->proposal);
        @unlink($path . $data->presentasi);
        @unlink($path . $data->monitoring);
        if ($this->m_bks_pkl->delete_users($id_bks_pkl) == TRUE) {
            // TAMPILKAN PESAN JIKA BERHASIL
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_pkl');
    }

    public function update_users()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->library('upload');
        $path = './assets/berkas/wisuda/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $nama_file = "gambar_" . time();
        $config['file_name'] = $nama_file;
        $this->upload->initialize($config);

        $id_bks_pkl = $this->input->post('id_bks_pkl');
        $gambar_lama = $this->input->post('ganti_gambar');

        if ($_FILES['berita_acara']['name']) {
            $field_name = "berita_acara";
            if ($this->form_validation->run() &&  $this->upload->do_upload($field_name)) {
                $nim = $this->input->post('nim'); //sesuaikan nama fiednya denagn inputan ok

                $gambar = $this->upload->data();
                $user = ([
                    'nim' => $nim,
                    'status' => 0,
                    'berita_acara' => $gambar['file_name']
                ]);
                $data = array_merge($user);

                @unlink($path . $gambar_lama);
                $where = array('id_bks_pkl' => $id_bks_pkl);
                if ($this->m_bks_pkl->update_users($data, $where) == TRUE) {
                    $this->session->set_flashdata('pesan', 'di edit');
                    redirect('bks_pkl');
                } else {
                    $this->index();
                }
            } else {
                $this->index();
            }
        }

        if ($_FILES['persetujuan']['name']) {
            $field_name = "persetujuan";
            if ($this->form_validation->run() &&  $this->upload->do_upload($field_name)) {
                $nim = $this->input->post('nim'); //sesuaikan nama fiednya denagn inputan ok

                $gambar = $this->upload->data();
                $user = ([
                    'nim' => $nim,
                    'status' => 0,
                    'persetujuan' => $gambar['file_name']
                ]);
                $data = array_merge($user);

                @unlink($path . $gambar_lama);
                $where = array('id_bks_pkl' => $id_bks_pkl);
                if ($this->m_bks_pkl->update_users($data, $where) == TRUE) {
                    $this->session->set_flashdata('pesan', 'di edit');
                    redirect('bks_pkl');
                } else {
                    $this->index();
                }
            } else {
                $this->index();
            }
        }
    }

    public function ambil_id_user($id_bks_pkl)
    {
        $title = "edit data";
        $data = $this->m_bks_pkl->ambil_id_users($id_bks_pkl);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('berkas/edit_bks_pkl', ['data' => $data, 'title' => $title]);
        $this->load->view('templates/footer');
    }
}
