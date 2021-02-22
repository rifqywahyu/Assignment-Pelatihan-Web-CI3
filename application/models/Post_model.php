<?php

	class Post_model extends CI_Model{
		public function tambahPost(){
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'kategori' => $this->input->post('kategori')
			);
			$this->db->insert('posts',$data);
		}

		public function getAllPost(){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->get('posts')->result_array();
		}

		public function getNewestPost(){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->order_by('id_post', 'desc')
			->limit('2')
			->get('posts')->result_array();
		}

		public function getPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();

		}

		public function countPost($keyword = null){
			return $this->db->like('judul', $keyword)->from('posts')
			->count_all_results();
		}

		public function getPostById($id) {
			return $this->db->select("id_post,judul,isi,kategori")
			->where('id_post',$id)
			->get('posts')
			->result_array();
		}

		public function updatePost($id) {
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'kategori' =>$this->input->post('kategori')
			);

			$this->db->where('id_post', $id)->update('posts', $data);
		}

		public function hapusPost($id) {
			$this->db->where('id_post', $id)->delete('posts');
		}

		public function getEntPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('kategori', 'entertainment')
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();
		}

		public function countEntPost($keyword = null){
			return $this->db->like('kategori', 'entertainment')->from('posts')
			->count_all_results();
		}

		public function getLifPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('kategori', 'lifestyle')
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();
		}

		public function countLifPost($keyword = null){
			return $this->db->like('kategori', 'lifestyle')->from('posts')
			->count_all_results();
		}

		public function getHeaPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('kategori', 'health')
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();
		}

		public function countHeaPost($keyword = null){
			return $this->db->like('kategori', 'health')->from('posts')
			->count_all_results();
		}

		public function getOpiPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('kategori', 'opinion')
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();
		}

		public function countOpiPost($keyword = null){
			return $this->db->like('kategori', 'opinion')->from('posts')
			->count_all_results();
		}

		public function getBusPosts($limit, $start, $keyword = null){
			return $this->db
			->select("id_post, judul, SUBSTRING(isi,1,150) as isi, kategori")
			->like('kategori', 'business')
			->like('judul', $keyword)
			->order_by('id_post', 'asc')
			->get('posts', $limit, $start)->result_array();
		}

		public function countBusPost($keyword = null){
			return $this->db->like('kategori', 'business')->from('posts')
			->count_all_results();
		}
	}