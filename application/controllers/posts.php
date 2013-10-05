<?php

class Posts extends CI_Controller
{
	
	function __construct()
	{
		parent::Controller();
		$this->load->library('pagination');
		$this->load->model('postsmodel');
	}
	
	public function index($offset='')
	{		echo "a"; die();
		$limit = 2;
		$total = $this->postsmodel->count_posts();
		$data['posts'] = $this->postsmodel->list_posts($limit, $offset);
		
		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		
		$this->pagination->initialize($config);
		
		$data['pag_links'] = $this->pagination->create_links();

		$data['title'] = 'Pagination';
		$this->load->view('posts', $data);
	}
	
	public function category($cat, $offset='')
	{
		$limit = 2;
		$total = $this->postsmodel->count_posts($cat);
		$data['posts'] = $this->postsmodel->list_posts($limit, $offset, $cat);
		
		$config['base_url'] = base_url().'posts/category/'.$cat.'/';
		$config['total_rows'] = $total;
		$config['uri_segment'] = 4;
		$config['per_page'] = $limit;
		
		$this->pagination->initialize($config);
		
		$data['pag_links'] = $this->pagination->create_links();

		$data['title'] = 'Pagination';
		$this->load->view('posts', $data);		
	}	
}