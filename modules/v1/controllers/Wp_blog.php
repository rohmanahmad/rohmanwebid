<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_blog extends MX_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('version');
	}

	function load_model(){
		$this->load->model('wp_blog_model','m');
	}

	function index(){
		$d['title_head']='Home';
		$this->load->view('header',$d);
		$this->load->view('wp_blog/index_page');
		$this->load->view('footer');		
	}

# BROWSE FUNCTIONS

	function browse_post(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Browse Posts';
		$this->load->view('header',$d);

		$d['posts']=$this->m->get_posts();
		$this->load->view('wp_blog/browse_posts',$d);
		$this->load->view('footer');
	}

	function browse_page(){
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Browse Pages';
		$this->load->view('header',$d);

		$d['page_list']=$this->m->get_pages();
		$this->load->view('wp_blog/browse_pages',$d);
		$this->load->view('footer');
	}

	function browse_categories(){
		$this->load->library('xmlrpc');
		$this->load->helper('form');
		$this->load_model();
		$d['title_head']='Browse Kategori';
		$this->load->view('header',$d);

		$d['categories']=$this->m->get_categories();
		$this->load->view('wp_blog/browse_categories',$d);
		
		$this->load->view('footer');
	}	

	function browse_user(){
		$this->load->library('xmlrpc');
		$this->load->helper('form');
		$this->load_model();
		$d['title_head']='Browse User';
		$this->load->view('header',$d);
		$d['user']=$this->m->wp_user();
		$this->load->view('wp_blog/browse_user',$d);
		
		$this->load->view('footer');		
	}

# NEW INSERT FUNCTIONS

	function new_post(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Post Baru';
		$this->m->create_post(); //if POST submit
		$this->load->view('header',$d);

		//$d['cat']=$this->m->list_category();
		$d['post_status']=$this->m->post_get_status_list();
		$this->load->view('wp_blog/new_post',$d);
		$this->load->view('footer');
	}	

	function new_page(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Page Baru';
		$this->m->create_page(); //if POST submit
		$this->load->view('header',$d);

		$d['cat']=$this->m->list_category();
		$d['page_status']=$this->m->page_get_status_list();
		$this->load->view('wp_blog/new_page',$d);
		$this->load->view('footer');
	}	

	function new_category(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Kategori Baru';
		$this->m->create_category(); //if POST submit
		$this->load->view('header',$d);

		$d['cat']=$this->m->list_category();
		$this->load->view('wp_blog/new_category',$d);
		$this->load->view('footer');
	}

# EDIT FUNCTIONS

	function edit_page($page_id=''){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');

		$this->m->save_page_modified(); //if submit
		$d['title_head']='Edit Page';
		$this->load->view('header',$d);

		$d['page_info']=$this->m->get_page_edit($page_id);
		$d['page_status']=$this->m->page_get_status_list();
		$this->load->view('wp_blog/edit_page',$d);
		$this->load->view('footer');
	}

	function edit_post($post_id=''){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');

		$this->m->save_post_modified(); //if submit
		$d['title_head']='Edit Page';
		$this->load->view('header',$d);

		$d['post_info']=$this->m->get_post_edit($post_id);
		$d['post_status']=$this->m->post_get_status_list();
		$this->load->view('wp_blog/edit_post',$d);
		$this->load->view('footer');
	}
	

}
//end of file