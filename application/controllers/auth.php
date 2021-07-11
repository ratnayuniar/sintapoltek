<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('fungsi_helper');

        $this->load->model('m_auth');
    }
    public function index()
    {
        // check_already_login();
        // check_not_login();
        // $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'Halaman Login';
        //     $this->load->view('templates/auth_header', $data);
        //     $this->load->view('auth/login');
        //     $this->load->view('templates/auth_footer');
        // } else {
        $this->login();
        // }
    }
    function login()
    {
        if ($this->session->userdata('level') == '1') {
            redirect('page_admin');
        } else if ($this->session->userdata('level') == '2') {
            redirect('page_mahasiswa');
        } else if ($this->session->userdata('level') == '3') {
            redirect('page_dosen');
        } else if ($this->session->userdata('level') == '4') {
            redirect('page_kaprodi');
        } else if ($this->session->userdata('level') == '5') {
            redirect('page_keuangan');
        } else if ($this->session->userdata('level') == '6') {
            redirect('page_perpus');
        } else if ($this->session->userdata('level') == '7') {
            redirect('page_baak');
        } else if ($this->session->userdata('level') == '8') {
            redirect('page_lab');
        } else if ($this->session->userdata('level') == '9') {
            redirect('page_bahasa');
        } else {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
    }

    function login_mahasiswa()
    {

        if ($this->session->userdata('level') == '1') {
            redirect('page_admin');
        } else if ($this->session->userdata('level') == '2') {
            redirect('page_mahasiswa');
        } else if ($this->session->userdata('level') == '3') {
            redirect('page_dosen');
        } else if ($this->session->userdata('level') == '4') {
            redirect('page_kaprodi');
        } else if ($this->session->userdata('level') == '5') {
            redirect('page_keuangan');
        } else if ($this->session->userdata('level') == '6') {
            redirect('page_perpus');
        } else if ($this->session->userdata('level') == '7') {
            redirect('page_baak');
        } else if ($this->session->userdata('level') == '8') {
            redirect('page_lab');
        } else if ($this->session->userdata('level') == '9') {
            redirect('page_bahasa');
        } else {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login_mahasiswa');
            $this->load->view('templates/auth_footer');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda berhasil logout</div>');
        redirect('auth/login');
    }

    function proses_login2()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $nim = htmlspecialchars($this->input->post('nim', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $check_dosen = $this->m_auth->auth_dosen($email, $password);
        $check_mahasiswa = $this->m_auth->auth_mahasiswa($email, $password);

        if ($check_dosen->num_rows() == 1) {
            foreach ($check_dosen->result() as $data) {
                $user_data = array(
                    'id_dosen' => $data->id_dosen,
                    'id_prodi' => $data->id_prodi,
                    'email' => $data->email,
                    'nip' => $data->nip,
                    'nama' => $data->nama,
                    'hp' => $data->hp,
                    'level' => $data->level,
                    'aktif' => $data->aktif
                );
                $this->session->set_userdata($user_data);
            }
            if ($this->session->userdata('level') == '1') {
                redirect('page_admin');
            } else if ($this->session->userdata('level') == '3') {
                redirect('page_dosen');
            } else if ($this->session->userdata('level') == '4') {
                redirect('page_kaprodi');
            } else if ($this->session->userdata('level') == '5') {
                redirect('page_keuangan');
            } else if ($this->session->userdata('level') == '6') {
                redirect('page_perpus');
            } else if ($this->session->userdata('level') == '7') {
                redirect('page_baak');
            } else if ($this->session->userdata('level') == '8') {
                redirect('page_lab');
            } else if ($this->session->userdata('level') == '9') {
                redirect('page_bahasa');
            } else {
                $text = '<div class="alert alert-danger">Kombinasi Email dan Password Salah</div>';
                echo $this->session->set_flashdata('msg', $text);
                redirect('auth');
            }
        } elseif ($check_mahasiswa->num_rows() == 1) {
            foreach ($check_mahasiswa->result() as $data) {
                $user_data = array(
                    'email' => $data->nim,
                    'id_prodi' => $data->id_prodi,
                    'aktif' => $data->aktif,
                    'nama' => $data->nama,
                    'alamat' => $data->alamat,
                    'hp' => $data->hp,
                    'level' => '2'
                );
                $this->session->set_userdata($user_data);
            }
            redirect('page_mahasiswa');
        } else {
            $text = '<div class="alert alert-danger">Kombinasi Email dan Password Salah</div>';
            echo $this->session->set_flashdata('msg', $text);
            redirect('auth');
        }
    }
}
