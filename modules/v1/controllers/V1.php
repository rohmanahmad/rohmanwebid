<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('user','version'));
		$this->load->library('session');
	}

	function load_model(){
		$this->load->model('v1_model','m'); //jarang dipake
	}

	function index()
	{
		$d['title_head']='Home';
		$this->load->view('header',$d);
		// if submit post
		$this->load_model();
		$this->m->login();
		if(is_logged_in()){
			$this->load->view('index_page');
		}else{
			$this->load->view('login_page');
		}
		
		$this->load->view('footer');
	}

}
