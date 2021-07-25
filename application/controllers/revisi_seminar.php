<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Revisi_seminar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal_seminar');
        $this->load->model('m_nilai_seminar');
        $this->load->model('m_revisi_seminar');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_penguji');
        $this->load->model('m_pembimbing');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query3'] = $this->m_penguji->bimbingan_dosen();
        $data['query2'] = $this->m_revisi_seminar->revisi_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['query'] = $this->m_nilai_seminar->tampil_data();
        $data['title'] = 'SINTA PNM';

        $data['statusseminar'] = $this->m_revisi_seminar->getStatusSeminar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/revisi_seminar', $data);
        $this->load->view('templates/footer', $data);
    }

    function revisi_mahasiswa($nim)
    {
        $data['revisi_seminar'] = $this->m_revisi_seminar->get_nim($nim);

        $data['id'] = $nim;
        if ($data['revisi_seminar']) {
            $data['title'] = 'Detail Berkas' . $data['revisi_seminar']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('revisi/revisi_seminar', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function detail_revisi_seminar2($nim)
    {
        $data['title'] = 'SINTA PNM';
       $data['nim'] = $nim;
        $data['query3'] = $this->m_penguji->bimbingan_dosen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/detail_revisi_seminar', $data);
        $this->load->view('templates/footer', $data);
    }

    
    public function add()
    {
        $id_revisi = $this->input->post('id_revisi');

        if (empty($id_revisi)) $this->m_revisi_seminar->tambah_data();
        else $this->m_revisi_seminar->ubah_data($id_revisi);

        // $this->m_revisi_seminar->tambah_data();
    }

    public function upload_revisi_seminar()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/seminar/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|ppt|pptx|doc|docx';
            $config['max_size']  = 50000;
            $config['file_name'] = 'revisi_seminar-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['revisi_seminar'])) {
                $this->upload->do_upload('revisi_seminar');
                $data1 = $this->upload->data();
                $revisi_seminar = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $data = [
                    'nim' => $nim,
                    'revisi_seminar' => $revisi_seminar,
                    'status_seminar' => $this->input->post('status_seminar'),
                ];

                $cek = $this->db->like('nim', $data['nim'])->from('master_ta')->count_all_results();

                if ($cek > 0) {
                    $this->db->where('nim', $data['nim'])->update('master_ta', $data);
                    redirect('revisi_seminar');
                } else {
                    $this->db->insert('master_ta', $data);
                    redirect('revisi_seminar');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }
}
