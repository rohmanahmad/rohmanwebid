<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picasa_upload extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	function index()
	{
		$this->load->helper('form');
		$d['title_head']='Home';
		$this->load->view('header',$d);
		$this->load->view('picasa/index_page');
		$this->load->view('footer');
	}

	function galery(){
		$d['title_head']='Galery';
		$this->load->view('header',$d);
		$this->load->view('picasa/galery_page');
		$this->load->view('footer');
	}
}
