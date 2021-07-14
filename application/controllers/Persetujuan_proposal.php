<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_proposal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal_seminar');
        $this->load->model('m_nilai_seminar');
        $this->load->model('m_persetujuan_proposal');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_penguji_sidang');
        $this->load->model('m_pembimbing');
        $this->load->helper(array('form', 'url', 'fungsi', 'download'));
    }

    public function index()
    {
        $data['query3'] = $this->m_persetujuan_proposal->bimbingan_dosen();
        $data['query2'] = $this->m_persetujuan_proposal->revisi_mhs();
        $data['mahasiswa'] = $this->m_mahasiswa->getmahasiswa();
        $data['dosen'] = $this->m_mahasiswa->getdosen();
        $data['query'] = $this->m_nilai_seminar->tampil_data();
        $data['title'] = 'SINTA PNM';

        // menghitung apakah revisinya sudah mencapai 3 dosen
        $data['cekRevisi'] = $this->db->get_where('revisi', array('nim' => $this->session->userdata('email'), 'status' => 1));

        // ambil berkas
        $data['ambilBerkas'] = $this->db->get_where('revisi', array('nim' => $this->session->userdata('email')))->row_array();

        // ambil data mahasiswa revisi
        // $data['get_mahasiswa'] = $this->m_persetujuan_proposal->get_mahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('persetujuan/persetujuan_proposal', $data);
        $this->load->view('templates/footer', $data);
    }

    function revisi_mahasiswa($nim)
    {
        $data['revisi_seminar'] = $this->m_persetujuan_proposal->get_nim($nim);

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
        $this->m_persetujuan_proposal->tambah_data();
    }

    public function approve()
    {
        $revisiId = $this->input->post('revisiId');

        $cek_status = $this->db->get_where('revisi', array('id_revisi' => $revisiId, 'status' => 0));

        if ($cek_status->num_rows() > 0) {
            $data = [
                'status' => 1,
            ];
        } else {
            $data = [
                'status' => 0,
            ];
        }

        $this->db->where('id_revisi', $revisiId);
        $this->db->update('revisi', $data);

        redirect('revisi_upload');
    }

    public function upload_berkas()
    {

        $nim = $this->session->userdata('email');

        $config['upload_path']          = './assets/berkas/sidang/';
        $config['allowed_types']        = 'doc|pdf|docx';
        $config['file_name']            = $nim . ' - Revisi Sidang';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_revisi')) {
            $error = array('error' => $this->upload->display_error());
            redirect('revisi_upload');
        } else {
            $this->db->set('file_revisi', $this->upload->data('file_name'))->where('nim', $nim)->update('revisi');
            redirect('revisi_upload');
        }
    }

    public function download($file)
    {
        force_download(FCPATH . 'assets/berkas/' . $file, null);
    }
}
