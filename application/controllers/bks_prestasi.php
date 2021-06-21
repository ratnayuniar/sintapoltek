<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_prestasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_prestasi');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bks_prestasi->tampil_data();

        $data['bks_prestasi_user'] = $this->m_bks_prestasi->bks_prestasi_user();
        $data['bks_prestasi_admin'] = $this->m_bks_prestasi->bks_prestasi_admin();

        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_prestasi')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_valid($id)
    {
        $this->m_bks_prestasi->update($id, ['status' => 1]);
        redirect('bks_prestasi', 'refresh');
    }

    function save_bks_tidakvalid($id)
    {
        $this->m_bks_prestasi->update($id, ['status' => 2]);
        redirect('bks_prestasi', 'refresh');
    }

    function save_bks_lengkap($id)
    {
        $this->m_bks_prestasi->update($id, ['status' => 3]);
        redirect('bks_prestasi', 'refresh');
    }

    function detail_bks_prestasi($nim)
    {
        $data['bks_prestasi'] = $this->m_bks_prestasi->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bks_prestasi']) {
            $data['title'] = 'SINTA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_prestasi', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama_lomba', 'Nama Lomba', 'required');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required');
            $this->form_validation->set_rules('juara', 'Juara', 'required');
            $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $config['upload_path'] = './assets/berkas/prestasi/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_prestasi-' . date('ymd');
            // $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['piagam'])) {
                $this->upload->do_upload('piagam');
                $data1 = $this->upload->data();
                $piagam = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $nama_lomba = $this->input->post('nama_lomba', TRUE);
                $tahun = $this->input->post('tahun', TRUE);
                $juara = $this->input->post('juara', TRUE);
                $tingkat = $this->input->post('tingkat', TRUE);
                $jenis = $this->input->post('jenis', TRUE);
                $data = [
                    'nim' => $nim,
                    'nama_lomba' => $nama_lomba,
                    'tahun' => $tahun,
                    'juara' => $juara,
                    'tingkat' => $tingkat,
                    'jenis' => $jenis,
                    'piagam' => $piagam,
                    'status' => 0,
                    'id_prodi' => $this->session->userdata('id_prodi')
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bks_prestasi', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_prestasi');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function delete_users($id_bks_prestasi)
    {
        $data = $this->m_bks_prestasi->ambil_id_gambar($id_bks_prestasi);
        // lokasi gambar berada
        $path = './assets/berkas/wisuda/';
        @unlink($path . $data->berita_acara); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->persetujuan); // hapus data di folder dimana data tersimpan
        @unlink($path . $data->proposal);
        @unlink($path . $data->presentasi);
        @unlink($path . $data->monitoring);
        if ($this->m_bks_prestasi->delete_users($id_bks_prestasi) == TRUE) {
            // TAMPILKAN PESAN JIKA BERHASIL
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_prestasi');
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

        $id_bks_prestasi = $this->input->post('id_bks_prestasi');
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
                $where = array('id_bks_prestasi' => $id_bks_prestasi);
                if ($this->m_bks_prestasi->update_users($data, $where) == TRUE) {
                    $this->session->set_flashdata('pesan', 'di edit');
                    redirect('bks_prestasi');
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
                $where = array('id_bks_prestasi' => $id_bks_prestasi);
                if ($this->m_bks_prestasi->update_users($data, $where) == TRUE) {
                    $this->session->set_flashdata('pesan', 'di edit');
                    redirect('bks_prestasi');
                } else {
                    $this->index();
                }
            } else {
                $this->index();
            }
        }
    }

    public function ambil_id_user($id_bks_prestasi)
    {
        $title = "edit data";
        $data = $this->m_bks_prestasi->ambil_id_users($id_bks_prestasi);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('berkas/edit_bks_prestasi', ['data' => $data, 'title' => $title]);
        $this->load->view('templates/footer');
    }
}
