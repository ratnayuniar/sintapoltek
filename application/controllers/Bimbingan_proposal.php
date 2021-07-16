<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_proposal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_bimbingan1');
        $this->load->model('m_bimbingan2');
        $this->load->model('m_dosen');
        $this->load->model('m_profile');
        $this->load->model('m_pembimbing');
        $this->load->model('m_mahasiswa');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
    }

    public function index()
    {
        redirect('bimbingan_proposal/dospem1');
    }

    // Khusus Mahasiswa

    public function dospem1()
    {
        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        // $data['bimbingan_user_dosen'] = $this->m_bimbingan1->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        // 
        $data['mahasiswaBimbingan'] = $this->m_pembimbing->getMahasiswaByidDosen();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dospem1_simpanbimbingan()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required');
            $this->form_validation->set_rules('masalah', 'masalah', 'required');
            $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
            $config['upload_path'] = './assets/berkas/bimbingan/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_bimbingan-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['file'])) {
                $this->upload->do_upload('file');
                $data1 = $this->upload->data();
                $file = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $id_dosen = $this->input->post('id_dosen', TRUE);
                $masalah = $this->input->post('masalah', TRUE);
                $tanggal = $this->input->post('tanggal', TRUE);
                $data = [
                    'nim' => $nim,
                    'id_dosen' => $id_dosen,
                    'masalah' => $masalah,
                    'tanggal' => $tanggal,
                    'file' => $file,
                    'status' => 0,
                    'status_dosen' => 1,
                    'jenis' => "seminar",
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bimbingan', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bimbingan_proposal/dospem1');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function dospem2()
    {
        $data['query'] = $this->m_bimbingan2->tampil_data();
        $data['bimbingan_user'] = $this->m_bimbingan2->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan2->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        $data['mahasiswaBimbingan'] = $this->m_pembimbing->getMahasiswaByidDosen2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dospem2_simpanbimbingan()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required');
            $this->form_validation->set_rules('masalah', 'masalah', 'required');
            $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
            $config['upload_path'] = './assets/berkas/bimbingan/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']  = 2048;
            $config['file_name'] = 'bks_bimbingan-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['file'])) {
                $this->upload->do_upload('file');
                $data1 = $this->upload->data();
                $file = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $id_dosen = $this->input->post('id_dosen', TRUE);
                $masalah = $this->input->post('masalah', TRUE);
                $tanggal = $this->input->post('tanggal', TRUE);
                $data = [
                    'nim' => $nim,
                    'id_dosen' => $id_dosen,
                    'masalah' => $masalah,
                    'tanggal' => $tanggal,
                    'file' => $file,
                    'status' => 0,
                    'status_dosen' => 2,
                    'jenis' => "seminar",
                ];
                // print_r($data);
                // exit();
                // var_dump($data);
                $insert = $this->db->insert('bimbingan', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bimbingan_proposal/dospem2');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    // Khusus Dosen Pembimbing (mahasiswa bimbingan pertama -> mabim1)

    public function mabim1()
    {
        $data['query'] = $this->m_bimbingan1->tampil_data();
        // $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan1->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        // 
        $data['mahasiswaBimbingan'] = $this->m_pembimbing->getMahasiswaByidDosen();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mabim1_detail($nim)
    {
        $data['table_bimbingan'] = $this->m_pembimbing->getBimbinganByNim($nim);
        $data['table_bimbinganTA'] = $this->m_pembimbing->getBimbinganByNimTA($nim);
        $data['info_judul'] = $this->m_pembimbing->getJudulByNim($nim);

        $data['cekJumlahBimbingan'] = $this->m_pembimbing->cekJumlahBimbinganSeminarDospem1($nim);

        $data['cekPersetujuanBimbingan'] = $this->m_pembimbing->cekPersetujuanBimbingan($nim);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bimbingan/detail1', $data);
        $this->load->view('templates/footer');
    }

    public function mabim1_simpansolusi()
    {
        $nim = $this->input->post('nim');
        $id_bimbingan = $this->input->post('id_bimbingan');

        $data = [
            'solusi' => $this->input->post('solusi'),
            'status' => 1,
            'status_dosen' => 1,
        ];

        $this->db->where('id_bimbingan', $id_bimbingan);
        $this->db->update('bimbingan', $data);

        redirect('bimbingan_proposal/mabim1_detail/' . $nim);
    }

    public function mabim2()
    {
        $data['query'] = $this->m_bimbingan2->tampil_data();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan2->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        $data['mahasiswaBimbingan'] = $this->m_pembimbing->getMahasiswaByidDosen2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan2', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mabim2_detail($nim)
    {
        $data['table_bimbingan'] = $this->m_pembimbing->getBimbinganByNim2($nim);
        $data['info_judul'] = $this->m_pembimbing->getJudulByNim($nim);

        $data['cekJumlahBimbingan'] = $this->m_pembimbing->cekJumlahBimbinganSeminarDospem2($nim);

        $data['cekPersetujuanBimbingan2'] = $this->m_pembimbing->cekPersetujuanBimbingan2($nim);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bimbingan/detail2', $data);
        $this->load->view('templates/footer');
    }

    public function mabim2_simpansolusi()
    {
        $nim = $this->input->post('nim');
        $id_bimbingan = $this->input->post('id_bimbingan');

        $data = [
            'solusi' => $this->input->post('solusi'),
            'status' => 1,
            'status_dosen' => 2,
        ];

        $this->db->where('id_bimbingan', $id_bimbingan);
        $this->db->update('bimbingan', $data);

        redirect('bimbingan_proposal/mabim2_detail/' . $nim);
    }

    public function persetujuan($nim, $judul, $id_dosen, $status_dosen, $tanggal_persetujuan)
    {
        $data = [
            'nim' => $nim,
            'judul' => urldecode($judul),
            'id_dosen' => $id_dosen,
            'status_dosen' => $status_dosen,
            'tanggal_persetujuan' => $tanggal_persetujuan,
            'jenis' => 'proposal'
        ];

        $this->db->insert('persetujuan', $data);
        redirect('bimbingan_proposal/mabim1_detail/' . $nim);
    }

    function cetak_kartu()
    {
        $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        $data['get_dosen'] = $this->m_bimbingan1->get_dosen();
        $data['get_tanggal'] = $this->m_bimbingan1->get_tanggal();
        $data['get_mahasiswa'] = $this->m_bimbingan1->get_mahasiswa();
        $data['topik_user'] = $this->m_profile->topik_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('bimbingan/dompdf_seminar', $data, TRUE);
    }
}

/* End of file Bimbingan_proposal.php */
