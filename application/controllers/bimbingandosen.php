<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingandosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('bimbingan_model');
        $this->load->model('m_pembimbing');
        $this->load->model('m_dosen');
        $this->load->model('m_pembimbing');
        $this->load->model('m_mahasiswa');
    }

    public function index()
    {
        $data['query'] = $this->m_pembimbing->listbimbingandosen();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['title'] = 'SINTA PNM';

        $id = $this->session->userdata('id_user');
        $data['users'] = $this->bimbingan_model->getisichat();
        $data['pesans'] = $this->bimbingan_model->getId($id); // tampilkan data pesan

        $this->form_validation->set_rules('isi_pesan', 'Isi pesan', 'required');

        if ($this->form_validation->run()) {

            $data_pesan = array(
                'id_pengirim' => $this->session->userdata('level'),
                'isi_pesan' => $this->input->post('isi_pesan'),
                'id_mahasiswabimbingan' => $this->session->userdata('id_user'),
            );
            $file = $_FILES;
            if (!empty($file['foto']["name"])) {
                $filename = $file['foto']["name"];

                $config['upload_path']   = './assets/berkas/bimbingan/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('gagal', 'Gagal Upload File');
                    redirect(base_url('daftar'));
                    exit();
                } else {
                    $uploaded = $this->upload->data();
                    $data_pesan['file'] = $uploaded['file_name'];
                }
            }

            $this->chat_model->save($data_pesan);

            redirect(base_url('bimbingandosen', 'reload'));
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('list_chat', $data);
        $this->load->view('templates/footer', $data);
    }

    public function reply($id_mahasiswabimbingan = null)
    {
        $id = $this->session->userdata('id_dosen');
        $data['title'] = 'SINTA PNM';
        $data['user'] = $this->bimbingan_model->getId($id_mahasiswabimbingan)->row();
        $data['pesans'] = $this->bimbingan_model->getId($id_mahasiswabimbingan)->result(); // tampilkan data pesan        

        $this->form_validation->set_rules('isi_pesan', 'Isi pesan', 'required');

        if ($this->form_validation->run()) {

            $data_pesan = array(
                'id_pengirim' => $id,
                'isi_pesan' => $this->input->post('isi_pesan'),
                'id_mahasiswabimbingan' => $id_mahasiswabimbingan,
                'level' => '1',
            );
            $file = $_FILES;
            if (!empty($file['file']["name"])) {
                $filename = $file['file']["name"];
                $config['upload_path']   = './assets/berkas/bimbingan/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
                $config['file_name']      = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('gagal', 'Gagal upload file user');
                    redirect(base_url('daftar'));
                    exit();
                } else {
                    $uploaded = $this->upload->data();
                    $data_pesan['file'] = $uploaded['file_name'];
                }
            }

            $this->bimbingan_model->save($data_pesan);

            redirect(base_url('bimbingandosen/reply/' . $id_mahasiswabimbingan), 'refresh');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingandosen', $data);
        $this->load->view('templates/footer', $data);
    }
}
