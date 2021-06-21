<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $this->load->library('mypdf');
        $data['data'] = array(
            ['nim' => '123456789', 'name' => 'ratna'],
            ['nim' => '12345678910', 'name' => 'yuniar']
        );
        $this->mypdf->generate('Bimbingan/dompdf');
    }
}
