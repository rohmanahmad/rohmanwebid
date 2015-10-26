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

	function browse_post(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Browse Baru';
		$this->load->view('header',$d);

		$d['posts']=$this->m->get_posts();
		$this->load->view('wp_blog/browse_posts',$d);
		$this->load->view('footer');
	}

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

	function list_category(){
		$this->load->library('xmlrpc');
		$this->load->helper('form');
		$this->load_model();
		$d['title_head']='Post Baru';
		$this->load->view('header',$d);

		$this->load->view('wp_blog/category_list',$d);
		
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
	

}
//end of file