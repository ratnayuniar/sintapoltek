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
        $this->load->helper("file");
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

        $nim = $this->input->post('nim');
        $filename =  'bks-bimbingan' . '-' . substr(md5(rand()), 0, 10);

        $config['upload_path'] = './assets/berkas/bimbingan/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']  = 5000;
        $config['file_name']  = $filename;
        // $config['encrypt_name'] = TRUE;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $data = [
                'nim' => $this->input->post('nim'),
                'id_dosen' => $this->input->post('id_dosen'),
                'masalah' => $this->input->post('masalah'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => 0,
                'status_dosen' => 1,
                'jenis' => "seminar",
            ];
        } else {
            // Jika name="file_dosen di view berisi file, maka update row tabel bimbingan berdasarkan isi array dibawah ini
            $data = [
                'nim' => $this->input->post('nim'),
                'id_dosen' => $this->input->post('id_dosen'),
                'masalah' => $this->input->post('masalah'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => 0,
                'status_dosen' => 1,
                'jenis' => "seminar",
                // nama file digabung dengan properti mahasiswa, bisa dicek di atas
                'file' => $filename
            ];
        }

        $insert = $this->db->insert('bimbingan', $data);
        if ($insert) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('bimbingan_proposal/dospem1');
        }
    }

    public function dospem2()
    {
        $data['query'] = $this->m_bimbingan2->tampil_data();
        $data['bimbingan_user'] = $this->m_bimbingan2->bimbingan_user();
        $data['bimbingan_user_dosen'] = $this->m_bimbingan2->bimbingan_user_dosen();
        $data['query2'] = $this->m_pembimbing->bimbingan_mhs();
        $data['hp'] = $this->m_pembimbing->hp();
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
        $nim = $this->input->post('nim');
        $filename =  'bks-bimbingan' . '-' . substr(md5(rand()), 0, 10);

        $config['upload_path'] = './assets/berkas/bimbingan/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']  = 5000;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $data = [
                'nim' => $this->input->post('nim'),
                'id_dosen' => $this->input->post('id_dosen'),
                'masalah' => $this->input->post('masalah'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => 0,
                'status_dosen' => 2,
                'jenis' => "seminar",
            ];
        } else {
            // Jika name="file_dosen di view berisi file, maka update row tabel bimbingan berdasarkan isi array dibawah ini
            $data = [
                'nim' => $this->input->post('nim'),
                'id_dosen' => $this->input->post('id_dosen'),
                'masalah' => $this->input->post('masalah'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => 0,
                'status_dosen' => 2,
                'jenis' => "seminar",
                // nama file digabung dengan properti mahasiswa, bisa dicek di atas
                'file' => $filename
            ];
        }


        $insert = $this->db->insert('bimbingan', $data);
        if ($insert) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('bimbingan_proposal/dospem2');
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
        $data['title'] = 'SINTA PNM';

        $data['cekJumlahBimbingan'] = $this->m_pembimbing->cekJumlahBimbinganSeminarDospem1($nim);

        $data['cekPersetujuanBimbingan'] = $this->m_pembimbing->cekPersetujuanBimbingan($nim);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('bimbingan/detail1', $data);
        $this->load->view('templates/footer');
    }

    public function mabim1_simpansolusi()
    {
        $nim = $this->input->post('nim');
        $id_bimbingan = $this->input->post('id_bimbingan');
        $filename =  'bks-bimbingan' . '-' . substr(md5(rand()), 0, 10);

        // config file
        $config['upload_path']          = './assets/berkas/bimbingan/';
        $config['allowed_types']        = 'pdf|docx|doc';
        $config['max_size']  = 5000;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        // cek name="file_dosen" di view, jika tidak berisi file maka update row tabel bimbingan berdasarkan isi array data dibawah ini
        if (!$this->upload->do_upload('file_dosen')) {
            $data = [
                'solusi' => $this->input->post('solusi'),
                'status' => 1,
                'status_dosen' => 1,
            ];
        } else {
            // Jika name="file_dosen di view berisi file, maka update row tabel bimbingan berdasarkan isi array dibawah ini
            $data = [
                'solusi' => $this->input->post('solusi'),
                'status' => 1,
                'status_dosen' => 1,
                // nama file digabung dengan properti mahasiswa, bisa dicek di atas
                'file_solusi' => $filename
            ];
        }

        $this->db->where('id_bimbingan', $id_bimbingan);
        $this->db->update('bimbingan', $data);

        redirect('bimbingan_proposal/mabim1_detail/' . $nim);

        // Note : error handlingnya nanti dulu yaakk wkwk
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
        $data['title'] = 'SINTA PNM';

        $data['cekJumlahBimbingan2'] = $this->m_pembimbing->cekJumlahBimbinganSeminarDospem2($nim);

        $data['cekPersetujuanBimbingan2'] = $this->m_pembimbing->cekPersetujuanBimbingan2($nim);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('bimbingan/detail2', $data);
        $this->load->view('templates/footer');
    }

    public function mabim2_simpansolusi()
    {
        $nim = $this->input->post('nim');
        $id_bimbingan = $this->input->post('id_bimbingan');
        $filename =  'bks-bimbingan' . '-' . substr(md5(rand()), 0, 10);

        // config file
        $config['upload_path']          = './assets/berkas/bimbingan/';
        $config['allowed_types']        = 'pdf|docx|doc';
        $config['max_size']  = 5000;
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        // cek name="file_dosen" di view, jika tidak berisi file maka update row tabel bimbingan berdasarkan isi array data dibawah ini
        if (!$this->upload->do_upload('file_dosen')) {
            $data = [
                'solusi' => $this->input->post('solusi'),
                'status' => 1,
                'status_dosen' => 2,
            ];
        } else {
            // Jika name="file_dosen di view berisi file, maka update row tabel bimbingan berdasarkan isi array dibawah ini
            $data = [
                'solusi' => $this->input->post('solusi'),
                'status' => 1,
                'status_dosen' => 2,
                // nama file digabung dengan properti mahasiswa, bisa dicek di atas
                'file_solusi' => $filename
            ];
        }

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

    public function persetujuanProposal2($nim, $judul, $id_dosen, $status_dosen, $tanggal_persetujuan)
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
        redirect('bimbingan_proposal/mabim2_detail/' . $nim);
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

    function delete_bimbingan($id)
    {
        $delete = $this->m_bimbingan1->get_id_bimbingan($id);
        if ($delete) {
            $this->m_bimbingan1->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil di Hapus</div>');
            redirect('bimbingan_proposal/dospem1', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak ada</div>');
            redirect('bimbingan_proposal/dospem1', 'refresh');
        }
    }
}

/* End of file Bimbingan_proposal.php */
