<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A0 extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$d['title_head']='Home';
		$this->load->view('header',$d);
		$this->load->view('index-page');
		$this->load->view('footer');
	}

	function notfound(){
		echo 'notfound';
	}
}
