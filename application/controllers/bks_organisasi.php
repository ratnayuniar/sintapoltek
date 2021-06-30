<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_organisasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_organisasi');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bks_organisasi->tampil_data();
        $data['bks_organisasi_user'] = $this->m_bks_organisasi->bks_organisasi_user();
        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_organisasi')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_organisasi', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_valid($id)
    {
        $this->m_bks_organisasi->update($id, ['status' => 1]);
        redirect('bks_organisasi', 'refresh');
    }

    function save_bks_tidakvalid($id)
    {
        $this->m_bks_organisasi->update($id, ['status' => 2]);
        redirect('bks_organisasi', 'refresh');
    }

    function detail_bks_organisasi($nim)
    {
        $data['bks_organisasi'] = $this->m_bks_organisasi->get_nim($nim);


        if ($data['bks_organisasi']) {
            $data['title'] = 'SINTA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_organisasi', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama_org', 'Nama Organisasi', 'required');
            $this->form_validation->set_rules('tempat', 'Tempat', 'required');
            $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required');
            $this->form_validation->set_rules('tahun_keluar', 'Tahun Keluar', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $config['upload_path'] = './assets/berkas/organisasi/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_organisasi-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['sk_org'])) {
                $this->upload->do_upload('sk_org');
                $data1 = $this->upload->data();
                $sk_org = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $nama_org = $this->input->post('nama_org', TRUE);
                $tempat = $this->input->post('tempat', TRUE);
                $tahun_masuk = $this->input->post('tahun_masuk', TRUE);
                $tahun_keluar = $this->input->post('tahun_keluar', TRUE);
                $jabatan = $this->input->post('jabatan', TRUE);
                $data = [
                    'nim' => $nim,
                    'nama_org' => $nama_org,
                    'tempat' => $tempat,
                    'tahun_masuk' => $tahun_masuk,
                    'tahun_keluar' => $tahun_keluar,
                    'jabatan' => $jabatan,
                    'sk_org' => $sk_org,
                    'status' => 0,
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bks_organisasi', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_organisasi');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function delete_users($id_bks_org)
    {
        $data = $this->m_bks_organisasi->ambil_id_gambar($id_bks_org);
        $path = './assets/berkas/organisasi/';
        @unlink($path . $data->sk_org);
        if ($this->m_bks_organisasi->delete_users($id_bks_org) == TRUE) {
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_organisasi');
    }
}
