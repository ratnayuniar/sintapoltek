<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_proposal');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_proposal->tampil_data();
        $data['proposal_user'] = $this->m_proposal->proposal_user();

        $data['ambilBerkas'] = $this->db->get_where('proposal', array('nim' => $this->session->userdata('email')))->row_array();
        $data['title'] = 'SINTA PNM';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proposal/add_proposal', $data);
        $this->load->view('templates/footer', $data);
    }


    public function add()
    {
        $id_proposal = $this->input->post('id_proposal');

        if (empty($id_proposal)) $this->m_proposal->tambah_data();
        else $this->m_proposal->ubah_data($id_proposal);
    }

    public function add_rumusan()
    {
        $nim = $this->input->post('nim', TRUE);
        $data = [
            'nim' => $nim,
            'rumusan_masalah' => $this->input->post('rumusan_masalah'),
        ];

        $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

        if ($cek > 0) {
            $this->db->where('nim', $data['nim'])->update('proposal', $data);
            redirect('proposal');
        } else {
            $this->db->insert('proposal', $data);
            redirect('proposal');
        }
    }

    public function add_batasan()
    {
        $nim = $this->input->post('nim', TRUE);
        $data = [
            'nim' => $nim,
            'batasan_masalah' => $this->input->post('batasan_masalah'),
        ];

        $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

        if ($cek > 0) {
            $this->db->where('nim', $data['nim'])->update('proposal', $data);
            redirect('proposal');
        } else {
            $this->db->insert('proposal', $data);
            redirect('proposal');
        }
    }

    public function add_tujuan()
    {
        $nim = $this->input->post('nim', TRUE);
        $data = [
            'nim' => $nim,
            'tujuan' => $this->input->post('tujuan'),
        ];

        $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

        if ($cek > 0) {
            $this->db->where('nim', $data['nim'])->update('proposal', $data);
            redirect('proposal');
        } else {
            $this->db->insert('proposal', $data);
            redirect('proposal');
        }
    }

    public function add_teori()
    {
        $nim = $this->input->post('nim', TRUE);
        $data = [
            'nim' => $nim,
            'teori' => $this->input->post('teori'),
        ];

        $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

        if ($cek > 0) {
            $this->db->where('nim', $data['nim'])->update('proposal', $data);
            redirect('proposal');
        } else {
            $this->db->insert('proposal', $data);
            redirect('proposal');
        }
    }

    public function add_metode()
    {
        $nim = $this->input->post('nim', TRUE);
        $data = [
            'nim' => $nim,
            'metode' => $this->input->post('metode'),
        ];

        $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

        if ($cek > 0) {
            $this->db->where('nim', $data['nim'])->update('proposal', $data);
            redirect('proposal');
        } else {
            $this->db->insert('proposal', $data);
            redirect('proposal');
        }
    }


    function cetak_kartu()
    {
        $data['query'] = $this->m_proposal->tampil_data();
        $data['proposal_user'] = $this->m_proposal->proposal_user();
        $this->load->library('mypdf');
        $this->mypdf->setPaper('A4', 'potrait');
        $this->mypdf->filename = "laporan";
        $this->mypdf->generate('proposal/proposal2', $data);
    }

    public function upload_berkas()
    {


        // $nim = $this->session->userdata('email');
        $nim = $this->input->post('nim');

        $config['upload_path']          = './assets/berkas/seminar/';
        $config['allowed_types']        = 'doc|pdf|docx';
        $config['file_name']            = $nim . ' - Proposal';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('latar_belakang')) {
            $error = array('error' => $this->upload->display_error());
            redirect('proposal');
        } else {
            $array = array(
                'latar_belakang' => $this->upload->data('file_name'),
                'nim' => $this->input->post('nim'),

            );

            $this->db->set($array);
            $this->db->insert('proposal');
            // $this->db->set('latar_belakang', $this->upload->data('file_name'))->where('nim', $nim)->insert('proposal');
            redirect('proposal');
        }
    }

    public function upload_proposal()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/seminar/';
            $config['allowed_types'] = 'pdf|jpg|png|exe|jpeg|mp4|ppt|pptx';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_seminar-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['latar_belakang'])) {
                $this->upload->do_upload('latar_belakang');
                $data1 = $this->upload->data();
                $latar_belakang = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $data = [
                    'nim' => $nim,
                    'latar_belakang' => $latar_belakang,
                ];

                $cek = $this->db->like('nim', $data['nim'])->from('proposal')->count_all_results();

                if ($cek > 0) {
                    $this->db->where('nim', $data['nim'])->update('proposal', $data);
                    redirect('proposal');
                } else {
                    $this->db->insert('proposal', $data);
                    redirect('proposal');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }
}
