<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Revisi_sidang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal_seminar');
        $this->load->model('m_nilai_seminar');
        $this->load->model('m_revisi_sidang');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_penguji_sidang');
        $this->load->model('m_pembimbing');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
        $data['query2'] = $this->m_revisi_sidang->revisi_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['query'] = $this->m_nilai_seminar->tampil_data();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/revisi_sidang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function upload_revisi_sidang()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/sidang/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|ppt|pptx|doc|docx';
            $config['max_size']  = 50000;
            $config['file_name'] = 'revisi_sidang-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['revisi_sidang'])) {
                $this->upload->do_upload('revisi_sidang');
                $data1 = $this->upload->data();
                $revisi_sidang = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $data = [
                    'nim' => $nim,
                    'revisi_sidang' => $revisi_sidang,
                    'status_sidang' => $this->input->post('status_sidang'),
                ];

                $cek = $this->db->like('nim', $data['nim'])->from('master_ta')->count_all_results();

                if ($cek > 0) {
                    $this->db->where('nim', $data['nim'])->update('master_ta', $data);
                    redirect('revisi_sidang');
                } else {
                    $this->db->insert('master_ta', $data);
                    redirect('revisi_sidang');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    function revisi_mahasiswa($nim)
    {
        $data['revisi_seminar'] = $this->m_revisi_sidang->get_nim($nim);

        $data['id'] = $nim;
        if ($data['revisi_seminar']) {
            $data['title'] = 'Detail Berkas' . $data['revisi_seminar']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('revisi/revisi_seminar', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    function detail_revisi_sidang2()
    {
        $data['title'] = 'SINTA PNM';
        $data['nim'] = $this->input->get('id');
        $data['query'] = $this->m_nilai_seminar->tampil_data2($data['nim']);
        $data['query3'] = $this->m_penguji_sidang->bimbingan_dosen();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('revisi/detail_revisi_sidang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function add()
    {
        $this->m_revisi_sidang->tambah_data();
    }
}
