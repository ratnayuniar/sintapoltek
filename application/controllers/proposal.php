<?php
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
}
