<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V2 extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	function index()
	{
		$d['title_head']='Home';
		$this->load->view('header',$d);
		$this->load->view('index_page');
		$this->load->view('footer');
	}
}
