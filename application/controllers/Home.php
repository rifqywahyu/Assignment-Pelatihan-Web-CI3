<?php

class Home extends CI_Controller {
	public function __construct() {
		Parent::__construct();
		$this->load->model('Post_model');
	}

	public function index($nama = 'User') {
		$data['judul'] = 'Home';
		$data['nama'] = $nama;
		$data['posts'] = $this->Post_model->getNewestPost();
		
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}