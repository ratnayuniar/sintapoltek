<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('bimbingan_model');
        $this->load->model('m_pembimbing');
        if ($this->session->userdata('level') !== '2') {
            redirect('auth/logout', 'refresh');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('email');
        $data['pesans'] = $this->bimbingan_model->getId($id)->result();

        $this->form_validation->set_rules('isi_pesan', 'Isi pesan', 'required');

        if ($this->form_validation->run()) {

            $data_pesan = array(
                'id_pengirim' => $id,
                'isi_pesan' => $this->input->post('isi_pesan'),
                'id_mahasiswabimbingan' => $id,
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

            redirect(base_url('bimbingan'), 'refresh');
        }

        $data['title'] = 'Bimbingann';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bimbingan', $data);
        $this->load->view('templates/footer', $data);
    }
}
