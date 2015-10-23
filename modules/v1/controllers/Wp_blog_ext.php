<?php
/*
	* NOTICE :
	*	INI DIGUNAKAN JIKA CLASS Wp_post.php TIDAK BISA DIPAKAI
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_post_ext extends MX_Controller {

	var $server_url='http://rohman.web.id/blog/xmlrpc.php';
	var $server_user='admin';
	var $server_pass='admin-allahis1';

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('version');
	}
	
	function rpc_init(){
		include(APPPATH."libraries/XMLRPC/xmlrpc.inc");
		$rpc = new xmlrpc_client($this->server_url);
		$rpc->return_type = 'phpvals';
		return $rpc;
	}

	function index(){
		$this->rpc_init();
	}

	function new_post(){
		$rpc=$this->rpc_init();
		$function_name = "wp.newPost";

		$message = new xmlrpcmsg(
				$function_name, 
				array(
					new xmlrpcval(0, "int"), 
					new xmlrpcval($this->server_user, "string"), 
					new xmlrpcval($this->server_pass, "string"), 
					new xmlrpcval(
						array(
							"post_type" => new xmlrpcval("post", "string"), 
							"post_status" => new xmlrpcval("draft", "string"), 
							"post_title" => new xmlrpcval("testing post", "string"), 
							"post_author" => new xmlrpcval(1, "int"), 
							"post_excerpt" => new xmlrpcval("excerpt", "string"), 
							"post_content" => new xmlrpcval("ini adalah content", "string")
							), 
						"struct"
						)
					)
				);

		$resp = $rpc->send($message);

		if ($resp->faultCode()) echo 'KO. Error: '.$resp->faultString(); else echo "Post id is: " . $resp->value();
	
	}	


}
//end of file