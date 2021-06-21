<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class Mypdf extends Dompdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($contxt);
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);
        // $dompdf->loadHtml("<img src='bg_1.jpg'>");
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}
