<?php

class Post extends CI_Controller {
	public function __construct() {
		Parent::__construct();
		$this->load->model('Post_model');
	}

	public function tambah() {
		if (logged_in()) {
			$data['judul'] = "Tulis Jurnal";

			$this->load->view('templates/header', $data);
			$this->load->view('post/tambah');
			$this->load->view('templates/footer');
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"
                role="alert">
               <strong>Failure!</strong> Silakan login terlebih dahulu !
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
			redirect(base_url('post'));
		}
	}

	public function prosesTambah() {
		$this->Post_model->tambahPost();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
                role="alert">
               <strong>Success!</strong> Data sudah berhasil ditambahkan !
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
		redirect(base_url('post'));
	}

	public function index() {
		if ($this->session->userdata('keyword') == false) {
			$this->session->set_userdata('keyword', '');
		}
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/index';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Tampil Jurnal';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/index');
		$this->load->view('templates/footer');
	}

	public function update($id) {
		$data['judul'] = 'Update Jurnal';
		$data['post'] = $this->Post_model->getPostById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('post/update');
		$this->load->view('templates/footer');
	}

	public function prosesUpdate($id) {
		$this->Post_model->updatePost($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
                role="alert">
               <strong>Success!</strong> Data sudah berhasil diupdate !
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
		redirect(base_url('post'));
		redirect(base_url() . "post");
	}

	public function hapus($id) {
		$this->Post_model->hapusPost($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
                role="alert">
               <strong>Success!</strong> Data sudah berhasil dihapus !
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
		redirect(base_url() . "post");
	}

	public function lihat($id) {
		$data['judul'] = 'Lihat Detail';
		$data['post'] = $this->Post_model->getPostById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('post/lihat');
		$this->load->view('templates/footer');
	}

	public function entertainment() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/entertainment';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countEntPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Entertainment';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getEntPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/entertainment');
		$this->load->view('templates/footer');
	}

	public function lifestyle() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/lifestyle';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countLifPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Lifestyle';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getLifPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/lifestyle');
		$this->load->view('templates/footer');
	}

	public function health() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/health';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countHeaPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Health';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getHeaPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/health');
		$this->load->view('templates/footer');
	}

	public function opinion() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/opinion';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countOpiPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Opinion';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getOpiPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/opinion');
		$this->load->view('templates/footer');
	}

	public function business() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/Assignment_Web/post/business';
		if (isset($_POST['submit'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $_SESSION['keyword'];
		}
		$config['total_rows'] = $this->Post_model->countBusPost($data['keyword']);
		$config['per_page'] = 5;

		//--- Styling Pagination ---
		$config['full_tag_open'] = '<nav> <ul class="justify-content-center pagination">';
		$config['full_tag_close'] = '</ul> </nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		//--- Styling Pagination ---

		$this->pagination->initialize($config);
		$data['judul'] = 'Business';
		$data['start'] = $this->uri->segment(3);
		$data['posts'] = $this->Post_model
		->getBusPosts($config['per_page'], $data['start'], $data['keyword']);
		


		$this->load->view('templates/header', $data);
		$this->load->view('post/business');
		$this->load->view('templates/footer');
	}
}