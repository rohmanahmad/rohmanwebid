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

	function new_post(){
		$this->load->helper('form');
		$this->load_model();
		$this->load->library('xmlrpc');
		
		$d['title_head']='Home';
		$this->m->post(); //if POST submit
		$this->load->view('header',$d);
		$this->load->view('wp_blog/new_post');
		$this->load->view('footer');
	}	

}
//end of file