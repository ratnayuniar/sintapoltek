<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    }
    public function index()
    {
        check_already_login();
        $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->login();
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'aktif' => 1,
                'tanggal_buat' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil di buat</div>');
            redirect('auth');
        }
    }

    function proses_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $user = $this->m_auth->get_email_user($this->input->post('email'));


            if (!$user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Email Salah</div>');
                redirect('auth/login', 'refresh');
            } else if ($user->aktif == '0') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">User Tidak Aktif</div>');
                redirect('auth/login', 'refresh');
            } else if (md5($this->input->post('password')) != $user->password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password Salah</div>');
                redirect('auth/login', 'refresh');
            } else {
                // $prodi = $this->m_auth->get_prodi($user->id_prodi);
                // $jurusan = $this->m_auth->get_jurusan($user->id_jurusan);
                $dosen = $this->m_auth->get_dosen($user->id_dosen);
                $mahasiswa = $this->m_auth->get_mahasiswa($user->nim);
                $session = array(
                    'id_user' => $user->id_user,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'image' => $user->image,
                    // 'id_role' => $user->id_role,
                    'nim' => $user->nim,
                    'id_dosen' => $user->id_dosen,
                    'id_prodi' => $user->id_prodi,
                    'id_jurusan' => $user->id_jurusan,
                    // 'nama_jurusan' => $jurusan->nama_jurusan,
                    // 'nama_prodi' => $prodi->nama_prodi,
                    'level' => $dosen->level,
                    'level_mhs' => $mahasiswa->level,
                    'nama_mhs' => $mahasiswa->nama,
                    'nama' => $dosen->nama,
                );
                $this->session->set_userdata($session);
                redirect('beranda');
            }
        } else {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
    }

    function login()
    {

        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda berhasil logout</div>');
        redirect('auth/login');
    }
}
