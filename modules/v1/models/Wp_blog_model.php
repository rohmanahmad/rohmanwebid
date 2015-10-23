<?php

class Wp_blog_model extends CI_Model{

	var $server_url='http://rohman.web.id/blog/xmlrpc.php';
	var $server_user='admin';
	var $server_pass='admin-allahis1';

	function post(){
		if(!$_POST)return;
		$blogid = 1; 
	    $publishImmediately = TRUE;

	    $thePost = 
	    array(
	    	array(
		    	"post_type" => array("post", "string"), 
				"post_status" => array("draft", "string"), 
				"post_title" => array("testing 1", "string"), 
				"post_author" => array(1, "int"), 
				"post_excerpt" => array("excerpt", "string"), 
				"post_content" => array("pot pertama testing ini adalah content", "string")
	        ),
	        'struct'
	      );               


	    $this->xmlrpc->set_debug(TRUE);
	    $this->xmlrpc->server($this->server_url, 80);
	    $this->xmlrpc->method('wp.newPost');

	    $request = array($blogid, $this->server_user, $this->server_pass, $thePost, $publishImmediately);

	    $this->xmlrpc->request($request);
	    $result = $this->xmlrpc->send_request();

	    if ( !$result )
	    {
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }
	    else
	    {
	        //print($this->xmlrpc->display_response();
	        return true;
	    }
	}
}

//end of file