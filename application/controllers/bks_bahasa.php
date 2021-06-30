<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_bahasa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_bahasa');
        $this->load->model('m_prodi2');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bks_bahasa->tampil_data();
        $data['bks_bahasa_user'] = $this->m_bks_bahasa->bks_bahasa_user();
        $data['bks_bahasa_admin'] = $this->m_bks_bahasa->bks_bahasa_admin();
        $data['prodi'] = $this->m_prodi2->tampil_data();
        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_bahasa')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_bahasa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function admin()
    {
        $data['query'] = $this->m_bks_bahasa->tampil_data();
        $data['bks_bahasa_user'] = $this->m_bks_bahasa->bks_bahasa_user();
        $data['bks_bahasa_admin'] = $this->m_bks_bahasa->bks_bahasa_admin();
        $data['prodi'] = $this->m_prodi2->tampil_data();
        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_bahasa')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasi/list_bahasa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata($id)
    {
        $data['title'] = 'SINTA PNM';
        $data['bks_bahasa_admin'] = $this->m_bks_bahasa->bks_bahasa_admin();
        $data['get_mahasiswa'] = $this->m_bks_bahasa->get_mahasiswa($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_bahasa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detaildata_mhs()
    {
        $data['title'] = 'SINTA PNM';
        $data['bks_bahasa_admin'] = $this->m_bks_bahasa->bks_bahasa_admin();
        // $data['get_mahasiswa'] = $this->m_bks_bahasa->get_mahasiswa($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_bahasa', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_valid($id)
    {
        // $data['bks_bahasa'] = $this->m_bks_bahasa->get_nim($nim);
        $this->m_bks_bahasa->update($id, ['status' => 1]);

        // redirect('bks_bahasa', 'refresh');
        $data['bks_bahasa_admin'] = $this->m_bks_bahasa->bks_bahasa_admin();
        redirect('bks_bahasa', 'refresh');
    }

    function save_bks_tidakvalid($id)
    {
        $this->m_bks_bahasa->update($id, ['status' => 2]);
        redirect('bks_bahasa', 'refresh');
    }

    function detail_bks_bahasa($nim)
    {
        $data['bks_bahasa'] = $this->m_bks_bahasa->get_nim($nim);
        if ($data['bks_bahasa']) {
            $data['title'] = 'Detail Berkas';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_bahasa', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('periode', 'Periode', 'required');
            $this->form_validation->set_rules('tahun', 'tahun', 'required');
            $this->form_validation->set_rules('nama_bhs', 'Tahun Masuk', 'required');
            $this->form_validation->set_rules('skor', 'Tahun Keluar', 'required');
            $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
            $config['upload_path'] = './assets/berkas/bahasa/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_bahasa-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['sk_bahasa'])) {
                $this->upload->do_upload('sk_bahasa');
                $data1 = $this->upload->data();
                $sk_bahasa = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $periode = $this->input->post('periode', TRUE);
                $tahun = $this->input->post('tahun', TRUE);
                $nama_bhs = $this->input->post('nama_bhs', TRUE);
                $skor = $this->input->post('skor', TRUE);
                $tanggal = $this->input->post('tanggal', TRUE);
                $data = [
                    'nim' => $nim,
                    'periode' => $periode,
                    'tahun' => $tahun,
                    'nama_bhs' => $nama_bhs,
                    'skor' => $skor,
                    'tanggal' => $tanggal,
                    'sk_bahasa' => $sk_bahasa,
                    'status' => 0,
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bks_bahasa', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_bahasa');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }


    public function delete_users($id_bks_bhs)
    {
        $data = $this->m_bks_bahasa->ambil_id_gambar($id_bks_bhs);
        $path = './assets/berkas/bahasa/';
        @unlink($path . $data->sk_bahasa);

        if ($this->m_bks_bahasa->delete_users($id_bks_bhs) == TRUE) {
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_bahasa');
    }

    public function ambil_id_user($id_bks_bhs)
    {
        $title = "edit data";
        $data = $this->m_bks_bahasa->ambil_id_users($id_bks_bhs);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('berkas/edit_bks_bahasa', ['data' => $data, 'title' => $title]);
        $this->load->view('templates/footer');
    }


    // function save_bks_lengkap($id)
    // {
    //     $this->m_bks_bahasa->update($id, ['status' => 3]);
    //     redirect('bks_bahasa', 'refresh');
    // }
}
