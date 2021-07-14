<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bks_wisuda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_bks_wisuda');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['query'] = $this->m_bks_wisuda->tampil_data();
        $data['bks_wisuda_user'] = $this->m_bks_wisuda->bks_wisuda_user();
        $data['title'] = 'SINTA PNM';
        $data['data'] = $this->db->get('bks_wisuda')->result();
        $data['bks_wisuda'] = $this->db->query('select * from bks_wisuda')->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berkas/bks_wisuda', $data);
        $this->load->view('templates/footer', $data);
    }

    function save_bks_belum($id)
    {
        $this->m_bks_wisuda->update($id, ['status' => 1]);
        redirect('bks_wisuda', 'refresh');
    }

    function save_bks_kurang($id)
    {
        $this->m_bks_wisuda->update($id, ['status' => 2]);
        redirect('bks_wisuda', 'refresh');
    }

    function save_bks_lengkap($id)
    {
        $this->m_bks_wisuda->update($id, ['status' => 3]);
        redirect('bks_wisuda', 'refresh');
    }

    function detail_bks_wisuda($nim)
    {
        $data['bks_wisuda'] = $this->m_bks_wisuda->get_nim($nim);

        if ($data['bks_wisuda']) {
            $data['title'] = 'Detail Berkas' . $data['bks_wisuda']->nim;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berkas/detail_bks_wisuda', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'pdf|jpg|png|exe|jpeg|mp4|ppt|pptx';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['file_ta'])) {
                $this->upload->do_upload('file_ta');
                $data1 = $this->upload->data();
                $file_ta = $data1['file_name'];
            }

            if (!empty($_FILES['jurnal'])) {
                $this->upload->do_upload('jurnal');
                $data2 = $this->upload->data();
                $jurnal = $data2['file_name'];
            }

            if (!empty($_FILES['lap_ta_prodi'])) {
                $this->upload->do_upload('lap_ta_prodi');
                $data3 = $this->upload->data();
                $lap_ta_prodi = $data3['file_name'];
            }

            if (!empty($_FILES['aplikasi'])) {
                $this->upload->do_upload('aplikasi');
                $data4 = $this->upload->data();
                $aplikasi = $data4['file_name'];
            }

            if (!empty($_FILES['ppt'])) {
                $this->upload->do_upload('ppt');
                $data5 = $this->upload->data();
                $ppt = $data5['file_name'];
            }

            if (!empty($_FILES['video'])) {
                $this->upload->do_upload('video');
                $data6 = $this->upload->data();
                $video = $data6['file_name'];
            }

            if (!empty($_FILES['foto_ijazah'])) {
                $this->upload->do_upload('foto_ijazah');
                $data7 = $this->upload->data();
                $foto_ijazah = $data7['file_name'];
            }

            if (!empty($_FILES['foto_wisuda'])) {
                $this->upload->do_upload('foto_wisuda');
                $data8 = $this->upload->data();
                $foto_wisuda = $data8['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $data = [
                    'nim' => $nim,
                    'file_ta' => $file_ta,
                    'jurnal' => $jurnal,
                    'lap_ta_prodi' => $lap_ta_prodi,
                    'aplikasi' => $aplikasi,
                    'ppt' => $ppt,
                    'video' => $video,
                    'foto_ijazah' => $foto_ijazah,
                    'foto_wisuda' => $foto_wisuda,
                    'status' => 0,
                    'laporan_perpus' => 0,
                    'tanggungan_perpus' => 0,
                    'ukt' => 0,
                    'pinjaman_alat' => 0,
                ];
                // print_r($data);
                // exit();


                $insert = $this->db->insert('bks_wisuda', $data);
                if ($insert) {
                    $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                    redirect('bks_wisuda');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function upload_fileta()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'pdf|jpg';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');
            $ekstensi =  array('pdf', 'jpg');

            $this->load->library('upload', $config);

            if (!empty($_FILES['file_ta'])) {
                $this->upload->do_upload('file_ta');
                $data1 = $this->upload->data();
                $file_ta = $data1['file_name'];
                $tipe_file = pathinfo($file_ta, PATHINFO_EXTENSION);
            }

            if ($this->form_validation->run()) {
                if (!in_array($tipe_file, $ekstensi)) {
                    $this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
                    redirect('bks_wisuda');
                } else {
                    $nim = $this->input->post('nim', TRUE);
                    $data = [
                        'nim' => $nim,
                        'file_ta' => $file_ta,
                        'status_file_ta' => 0,
                        'laporan_perpus' => 0,
                        'tanggungan_perpus' => 0,
                        'ukt' => 0,
                        'pinjaman_alat' => 0,

                    ];

                    $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

                    if ($cek > 0) {
                        $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    } else {
                        $this->db->insert('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    }
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function upload_jurnal()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'pdf|jpg';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');
            $ekstensi =  array('pdf', 'jpg');

            $this->load->library('upload', $config);

            if (!empty($_FILES['jurnal'])) {
                $this->upload->do_upload('jurnal');
                $data1 = $this->upload->data();
                $jurnal = $data1['file_name'];
                $tipe_file = pathinfo($jurnal, PATHINFO_EXTENSION);
            }

            if ($this->form_validation->run()) {
                if (!in_array($tipe_file, $ekstensi)) {
                    $this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
                    redirect('bks_wisuda');
                } else {
                    $nim = $this->input->post('nim', TRUE);
                    $data = [
                        'nim' => $nim,
                        'jurnal' => $jurnal,
                        'status_jurnal' => 0,

                    ];

                    $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

                    if ($cek > 0) {
                        $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    } else {
                        $this->db->insert('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    }
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function upload_aplikasi()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'zip|rar';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');
            $ekstensi =  array('zip', 'rar');

            $this->load->library('upload', $config);

            if (!empty($_FILES['aplikasi'])) {
                $this->upload->do_upload('aplikasi');
                $data1 = $this->upload->data();
                $aplikasi = $data1['file_name'];
                $tipe_file = pathinfo($aplikasi, PATHINFO_EXTENSION);
            }

            if ($this->form_validation->run()) {
                if (!in_array($tipe_file, $ekstensi)) {
                    $this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
                    redirect('bks_wisuda');
                } else {
                    $nim = $this->input->post('nim', TRUE);
                    $data = [
                        'nim' => $nim,
                        'aplikasi' => $aplikasi,
                        'status_aplikasi' => 0,

                    ];

                    $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

                    if ($cek > 0) {
                        $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    } else {
                        $this->db->insert('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    }
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    // public function upload_ppt()
    // {
    //     if (isset($_POST['submit'])) {
    //         $this->form_validation->set_rules('nim', 'NIM', 'required');
    //         $config['upload_path'] = './assets/berkas/wisuda/';
    //         $config['allowed_types'] = 'ppt|pptx';
    //         $config['max_size']  = 50000;
    //         $config['file_name'] = 'bks_wisuda-' . date('ymd');
    //         $ekstensi =  array('zip', 'rar');

    //         $this->load->library('upload', $config);

    //         if (!empty($_FILES['ppt'])) {
    //             $this->upload->do_upload('ppt');
    //             $data1 = $this->upload->data();
    //             $ppt = $data1['file_name'];
    //             $tipe_file = pathinfo($ppt, PATHINFO_EXTENSION);
    //         }

    //         if ($this->form_validation->run()) {
    //             if (!in_array($tipe_file, $ekstensi)) {
    //                 $this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
    //                 redirect('bks_wisuda');
    //             } else {
    //                 $nim = $this->input->post('nim', TRUE);
    //                 $data = [
    //                     'nim' => $nim,
    //                     'ppt' => $ppt,
    //                     'status_ppt' => 0,

    //                 ];

    //                 $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

    //                 if ($cek > 0) {
    //                     $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
    //                     redirect('bks_wisuda');
    //                 } else {
    //                     $this->db->insert('bks_wisuda', $data);
    //                     redirect('bks_wisuda');
    //                 }
    //             }
    //         } else {
    //             $this->index();
    //         }
    //     } else {
    //         $this->index();
    //     }
    // }


    public function upload_video()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'mp4|avi|mpeg|wmv|mkv|webm';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');
            $ekstensi =  array('mp4', 'avi', 'mpeg', 'wmv', 'mkv', 'webm');

            $this->load->library('upload', $config);

            if (!empty($_FILES['video'])) {
                $this->upload->do_upload('video');
                $data1 = $this->upload->data();
                $video = $data1['file_name'];
                $tipe_file = pathinfo($video, PATHINFO_EXTENSION);
            }

            if ($this->form_validation->run()) {
                if (!in_array($tipe_file, $ekstensi)) {
                    $this->session->set_flashdata('gagal', 'Tipe Yang Dimasukkan Salah');
                    redirect('bks_wisuda');
                } else {
                    $nim = $this->input->post('nim', TRUE);
                    $data = [
                        'nim' => $nim,
                        'video' => $video,
                        'status_video' => 0,

                    ];

                    $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

                    if ($cek > 0) {
                        $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    } else {
                        $this->db->insert('bks_wisuda', $data);
                        redirect('bks_wisuda');
                    }
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function upload_ppt()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $config['upload_path'] = './assets/berkas/wisuda/';
            $config['allowed_types'] = 'pdf|jpg|png|exe|jpeg|mp4|ppt|pptx';
            $config['max_size']  = 50000;
            $config['file_name'] = 'bks_wisuda-' . date('ymd');

            $this->load->library('upload', $config);

            if (!empty($_FILES['ppt'])) {
                $this->upload->do_upload('ppt');
                $data1 = $this->upload->data();
                $ppt = $data1['file_name'];
            }

            if ($this->form_validation->run()) {
                $nim = $this->input->post('nim', TRUE);
                $data = [
                    'nim' => $nim,
                    'ppt' => $ppt,
                    'status_ppt' => 0,

                ];

                $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

                if ($cek > 0) {
                    $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
                    redirect('bks_wisuda');
                } else {
                    $this->db->insert('bks_wisuda', $data);
                    redirect('bks_wisuda');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    // public function upload_video()
    // {
    //     if (isset($_POST['submit'])) {
    //         $this->form_validation->set_rules('nim', 'NIM', 'required');
    //         $config['upload_path'] = './assets/berkas/wisuda/';
    //         $config['allowed_types'] = 'pdf|jpg|png|exe|jpeg|mp4|ppt|pptx';
    //         $config['max_size']  = 50000;
    //         $config['file_name'] = 'bks_wisuda-' . date('ymd');

    //         $this->load->library('upload', $config);

    //         if (!empty($_FILES['video'])) {
    //             $this->upload->do_upload('video');
    //             $data1 = $this->upload->data();
    //             $video = $data1['file_name'];
    //         }

    //         if ($this->form_validation->run()) {
    //             $nim = $this->input->post('nim', TRUE);
    //             $data = [
    //                 'nim' => $nim,
    //                 'video' => $video,
    //                 'status_video' => 0,
    //                 'status_lap_ta' => 0,

    //             ];

    //             $cek = $this->db->like('nim', $data['nim'])->from('bks_wisuda')->count_all_results();

    //             if ($cek > 0) {
    //                 $this->db->where('nim', $data['nim'])->update('bks_wisuda', $data);
    //                 redirect('bks_wisuda');
    //             } else {
    //                 $this->db->insert('bks_wisuda', $data);
    //                 redirect('bks_wisuda');
    //             }
    //         } else {
    //             $this->index();
    //         }
    //     } else {
    //         $this->index();
    //     }
    // }

    public function tes()
    {


        // return $this->db->where('nim', '183307018')->count_all_results('bks_wisuda');

        // $this->db->like('nim', '183307018');
        // $this->db->from('bks_wisuda');
        // return $this->db->count_all_results();

        // return $this->db->count_all('bks_wisuda');

        // return $this->db->get_where('bks_wisuda', array('id_bks_wisuda' => 29))->row_array();


    }



    public function delete_users($id_bks_wisuda)
    {
        $data = $this->m_bks_wisuda->ambil_id_gambar($id_bks_wisuda);
        $path = './assets/berkas/wisuda/';
        @unlink($path . $data->file_ta);
        @unlink($path . $data->jurnal);
        @unlink($path . $data->lap_ta_prodi);
        @unlink($path . $data->aplikasi);
        @unlink($path . $data->ppt);
        @unlink($path . $data->video);
        @unlink($path . $data->foto_ijazah);
        @unlink($path . $data->foto_wisuda);

        if ($this->m_bks_wisuda->delete_users($id_bks_wisuda) == TRUE) {
            $this->session->set_flashdata('pesan', 'dihapus');
        }
        redirect('bks_wisuda');
    }

    public function verif_fileta()
    {
        $id_bks_wisuda = $this->input->post('id_bks_wisuda');

        if (empty($id_bks_wisuda)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data($id_bks_wisuda);
    }

    public function verif_jurnal()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data2($nim);
    }

    public function verif_lapta()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data3($nim);
    }

    public function verif_aplikasi()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data4($nim);
    }

    public function verif_ppt()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data5($nim);
    }

    public function verif_video()
    {
        $nim = $this->input->post('nim');

        if (empty($nim)) $this->m_bks_wisuda->tambah_data();
        else $this->m_bks_wisuda->ubah_data6($nim);
    }
}
