<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct() {
		Parent::__construct();
	}

	public function index()
	{
		// redirect('family/index');
		$data['page_title'] = 'Ss. Peter and Paul Catholic Church, Baruwa, Lagos';
		$data['app'] = $this->crm->read();
		$this->load->view('templates/header', $data);
		$this->load->view('index');
		$this->load->view('templates/footer');
	}
}
