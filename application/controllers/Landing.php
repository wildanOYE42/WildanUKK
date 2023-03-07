<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Aplikasi Pengaduan Masyarakat | Home';
		$this->load->view('landing');
	}
}
