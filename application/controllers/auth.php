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
    // LOGIN BARU
    function proses_login2()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $nim = htmlspecialchars($this->input->post('nim', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $check_dosen = $this->m_auth->auth_dosen($email, $password);
        $check_mahasiswa = $this->m_auth->auth_mahasiswa($email, $password);

        if ($check_dosen->num_rows() == 1) { //table dosen
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
        } elseif ($check_mahasiswa->num_rows() == 1) { //table mahasiswa 
            foreach ($check_mahasiswa->result() as $data) {
                $user_data = array(
                    'email' => $data->nim,
                    // 'nim' => $data->nim,
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

    //SALAH

    // function proses_login()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');

    //     if ($this->form_validation->run() == TRUE) {
    //         $user = $this->m_auth->get_email_user($this->input->post('email'));


    //         if (!$user) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger">Email Salah</div>');
    //             redirect('auth/login', 'refresh');
    //         } else if ($user->aktif == '0') {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger">User Tidak Aktif</div>');
    //             redirect('auth/login', 'refresh');
    //         } else if (md5($this->input->post('password')) != $user->password) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger">Password Salah</div>');
    //             redirect('auth/login', 'refresh');
    //         } else {
    //             // $prodi = $this->m_auth->get_prodi($user->id_prodi);
    //             // $jurusan = $this->m_auth->get_jurusan($user->id_jurusan);
    //             $dosen = $this->m_auth->get_dosen($user->id_dosen);
    //             $mahasiswa = $this->m_auth->get_mahasiswa($user->nim);
    //             $session = array(
    //                 'id_user' => $user->id_user,
    //                 'nama' => $user->nama,
    //                 'email' => $user->email,
    //                 'image' => $user->image,
    //                 // 'id_role' => $user->id_role,
    //                 'nim' => $user->nim,
    //                 'id_dosen' => $user->id_dosen,
    //                 'id_prodi' => $user->id_prodi,
    //                 'id_jurusan' => $user->id_jurusan,
    //                 // 'nama_jurusan' => $jurusan->nama_jurusan,
    //                 // 'nama_prodi' => $prodi->nama_prodi,
    //                 'level' => $dosen->level,
    //                 'level_mhs' => $mahasiswa->level,
    //                 'nama_mhs' => $mahasiswa->nama,
    //                 'nama' => $dosen->nama,
    //             );
    //             $this->session->set_userdata($session);
    //             redirect('beranda');
    //         }
    //     } else {
    //         $data['title'] = 'Login Page';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/login');
    //         $this->load->view('templates/auth_footer');
    //     }
    // }

    // public function registrasi()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique' => 'Email sudah digunakan'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
    //         'matches' => 'Password Tidak Sama!',
    //         'min_length' => 'Password Terlalu Pendek'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/auth_header');
    //         $this->load->view('auth/registrasi');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('nama', true)),
    //             'email' => htmlspecialchars($this->input->post('email', true)),
    //             'image' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'id_role' => 2,
    //             'aktif' => 1,
    //             'tanggal_buat' => time()
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil di buat</div>');
    //         redirect('auth');
    //     }
    // }
}
