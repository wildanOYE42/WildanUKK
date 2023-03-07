<?php
require_once FCPATH .'asset/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Generate extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('B_generate');
    }

    public function index(){
        $data['title'] = 'Aplikasi Pengaduan Masyarakat | Home';
		$data['pengguna'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $data['notif'] = $this->db->get('pengaduan')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('generate/index');
		$this->load->view('templates/footer');
    }

    private function to_generate($html, $filename = ''){
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4','portrait');
        $pdf->render();
        $pdf->stream($filename . 'pdf', array('Attachment' => 0));
    }

    public function gen_pengaduan(){
        $tglAwal = $this->input->post('tglAwal');
        $tglAkhir = $this->input->post('tglAkhir');

        $data['pengaduan'] = $this->B_generate->getPengaduanByTgl($tglAwal, $tglAkhir);
       
       $html = $this->load->view('generate/pengaduan', $data, true);
       $this->to_generate($html, 'Data Laporan Pengaduan');

    }

    public function gen_masyarakat(){
        $data['masyarakat'] = $this->B_generate->getMasyarakatAll();
        $html = $this->load->view('generate/masyarakat', $data, true);
        $this->to_generate($html, 'Data Masyarakat');
    }

    public function gen_tanggapan()
    {
        $data['tanggapan'] = $this->B_generate->getTanggapanAll();
        // var_dump($data['tanggapan']);die;
        $html = $this->load->view('generate/tanggapan', $data, true);
        $this->to_generate($html, 'Data tanggapan');

    }


    public function gen_petugas(){
        $data['petugas'] = $this->B_generate->getPetugasAll();
        $html = $this->load->view('generate/petugas', $data, true);
        $this->to_generate($html, 'Data Petugas');
    }
}