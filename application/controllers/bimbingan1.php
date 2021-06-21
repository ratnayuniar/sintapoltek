<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan1 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bimbingan1');
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
        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();

        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/list_bimbingan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu14()
    {

        $data['query'] = $this->m_bimbingan1->tampil_data();

        // dipake ini 
        $data['bimbingan_user'] = $this->m_bimbingan1->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan1->bimbingan_user_dosen();

        // $data['topik_user'] = $this->m_profile->topik_user();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();

        // ini juga pake
        $data['query3'] = $this->m_pembimbing->bimbingan_dosen1();

        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();

        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu58()
    {

        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user58'] = $this->m_bimbingan1->bimbingan_user58();
        $data['bimbingan_user58_dosen'] = $this->m_bimbingan1->bimbingan_user58_dosen();

        //dipake ini
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();

        $data['dosen'] = $this->m_mahasiswa->getdosen();


        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan58', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu912()
    {
        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user912'] = $this->m_bimbingan1->bimbingan_user912();
        $data['bimbingan_user912_dosen'] = $this->m_bimbingan1->bimbingan_user912_dosen();

        //dipake ini
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();

        $data['dosen'] = $this->m_mahasiswa->getdosen();


        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan912', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minggu1316()
    {

        $data['query'] = $this->m_bimbingan1->tampil_data();
        $data['bimbingan_user1316'] = $this->m_bimbingan1->bimbingan_user1316();
        $data['bimbingan_user1316_dosen'] = $this->m_bimbingan1->bimbingan_user1316_dosen();

        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();

        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],
        )->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan/bimbingan1316', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $id_bimbingan = $this->input->post('id_bimbingan');

        if (empty($id_bimbingan)) $this->m_bimbingan1->tambah_data();
        else $this->m_bimbingan1->ubah_data($id_bimbingan);
    }

    public function add58()
    {
        $id_bimbingan = $this->input->post('id_bimbingan');

        if (empty($id_bimbingan)) $this->m_bimbingan1->tambah_data58();
        else $this->m_bimbingan1->ubah_data($id_bimbingan);
    }

    public function add912()
    {
        $id_bimbingan = $this->input->post('id_bimbingan');

        if (empty($id_bimbingan)) $this->m_bimbingan1->tambah_data912();
        else $this->m_bimbingan1->ubah_data($id_bimbingan);
    }

    public function add1316()
    {
        $id_topik = $this->input->post('id_topik');

        if (empty($id_topik)) $this->m_bimbingan1->tambah_data1316();
        else $this->m_bimbingan1->ubah_data($id_topik);
    }

    public function delete()
    {
        $id_topik = $this->input->post('id_topik2');
        $this->m_bimbingan1->hapus_data($id_topik);
    }

    function detail_bimbingan($nim)
    {
        $data['bimbingan'] = $this->m_bimbingan1->get_nim($nim);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($data['bimbingan']) {
            $data['title'] = 'SINTA PNM';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bimbingan/detail_bimbingan1', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    function delete_bimbingan($id)
    {
        $delete = $this->m_bimbingan1->get_id_bimbingan($id);
        if ($delete) {
            $this->m_bimbingan1->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('bimbingan1', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('bimbingan1', 'refresh');
        }
    }

    function save_topik_waiting()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('flash', 'Gagal');

        // $this->form_validation->set_message('required', '{field}Harus di isi');
        // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            redirect('index');
        } else {
            $data = array(
                'status' => $this->input->post('status')
            );

            $this->m_bimbingan1->update($this->input->post('id_topik'), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('topik', 'refresh');
        }
    }

    function save_komentar()
    {
        $this->form_validation->set_rules('solusi', 'Solusi', 'trim|required');

        $this->form_validation->set_message('required', '{field}Harus di isi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($this->input->post('id_bimbingan')) {
                $data = array(
                    'status' => 2,
                    'solusi' => $this->input->post('solusi'),
                );
                $this->m_bimbingan1->update($this->input->post('id_bimbingan'), $data);
            }
            // $data = array(
            //     'bimbingan_id' => $this->input->post('id_bimbingan'),
            //     'solusi' => $this->input->post('solusi'),
            //     // 'waktu_komentar' => date('Y-m-d'),
            // );
            // print_r($data);
            // exit();

            // $this->m_bimbingan1->insert_komentar($data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('bimbingan1', 'refresh');
        }
    }

    function save_close_topik()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('flash', 'Gagal');

        // $this->form_validation->set_message('required', '{field}Harus di isi');
        // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            redirect('index');
        } else {
            $data = array(
                'status' => $this->input->post('status')
            );

            $this->m_bimbingan1->update($this->input->post('id_bimbingan'), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Di Simpan</div>');
            redirect('bimbingan1', 'refresh');
        }
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
        $this->mypdf->generate('bimbingan/dompdf2', $data);
    }

    function cetak_kartu58()
    {
        $data['bimbingan_user58'] = $this->m_bimbingan1->bimbingan_user58();
        $data['get_mahasiswa'] = $this->m_bimbingan1->get_mahasiswa();
        $data['get_dosen'] = $this->m_bimbingan1->get_dosen();
        $data['get_tanggal'] = $this->m_bimbingan1->get_tanggal();
        $data['topik_user'] = $this->m_profile->topik_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('bimbingan/dompdf58', $data);
    }

    function cetak_kartu912()
    {
        $data['bimbingan_user912'] = $this->m_bimbingan1->bimbingan_user912();
        $data['get_mahasiswa'] = $this->m_bimbingan1->get_mahasiswa();
        $data['get_tanggal'] = $this->m_bimbingan1->get_tanggal();
        $data['get_dosen'] = $this->m_bimbingan1->get_dosen();
        $data['topik_user'] = $this->m_profile->topik_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('bimbingan/dompdf912', $data);
    }

    function cetak_kartu1316()
    {
        $data['bimbingan_user1316'] = $this->m_bimbingan1->bimbingan_user1316();
        $data['get_mahasiswa'] = $this->m_bimbingan1->get_mahasiswa();
        $data['get_tanggal'] = $this->m_bimbingan1->get_tanggal();
        $data['get_dosen'] = $this->m_bimbingan1->get_dosen();
        $data['topik_user'] = $this->m_profile->topik_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('bimbingan/dompdf1316', $data);
    }
}
