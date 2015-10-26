<?php

class Wp_blog_model extends CI_Model{

	var $server_url='http://rohman.web.id/blog/xmlrpc.php';
	var $server_user='admin';
	var $server_pass='admin-allahis1';

	function xmlRPC($method,$request,$debugMode=FALSE){
	    //$this->xmlrpc->set_debug(TRUE); // aktifkan jika ingin melihat response headernya
	    $this->xmlrpc->server($this->server_url, 80);
	    $this->xmlrpc->method($method);
	    $this->xmlrpc->request($request);
	    $result = $this->xmlrpc->send_request();
	    if ( !$result ){
	        exit('Error:<br>'.$this->xmlrpc->display_error());
	    }
	    return $result;
	}

	function create_post(){
		if(!$_POST)return;
	    $thePost = 
	    array(
	    	array(
		    	"post_type" => array('post', "string"), 
				"post_status" => array($this->input->post('status'), "string"), 
				"post_title" => array($this->input->post('title'), "string"), 
				"post_author" => array(1, "int"), 
				"post_excerpt" => array("excerpt", "string"), 
				"post_content" => array($this->input->post('content'), "string"),
				),
	        'struct',
	        
	      );               

	    $method='wp.newPost';

	    $request = array(1, $this->server_user, $this->server_pass, $thePost);

	    $result = $this->xmlRPC($method,$request,FALSE);
	    $this->session->set_flashdata('posting_report','Sukses Membuat Posting');
	    redirect(get_link(1,2).'/new_post');

	}

	function get_posts(){
	    $method='wp.getPosts';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        
	        return $xmldata;
	    }
	}

	function get_pages(){
	    $method='wp.getPages';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        
	        return $xmldata;
	    }
	}

	function create_page(){
		if(!$_POST)return;
	    $thePost = 
	    array(
	    	array(
				"title" => array($this->input->post('title'), "string"), 
				"description" => array($this->input->post('content'), "string"),
				"page_status" => array($this->input->post('status'), "string"), 
				"post_author" => array(1, "int"), 
				"mt_excerpt" => array("excerpt", "string"), 
				"wp_slug" => array(str_replace(' ','-',strtolower($this->input->post('title'))), "string"), 
				"mt_allow_comments" => array("close", "string"), 
				//"enclosure"=>array('http://rohman.web.id/blog/hello-world','string')
				),
	        'struct',
	      );               

	    $method='wp.newPage';

	    $request = array(1, $this->server_user, $this->server_pass, $thePost);

	    $result = $this->xmlRPC($method,$request,FALSE);
	    $this->session->set_flashdata('page_report','Sukses Membuat Page Baru');
	    redirect(get_link(1,2).'/new_page');

	}

	function list_category(){
	    $method='wp.getCategories';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        foreach($xmldata as $r=>$key){
	        	$parent=$key['parentId'];
	        	if($parent > 0){
	        		$suf='';
	        	}else{
	        		$suf='';
	        	}
	        	$cat[$key['categoryId']]=$suf.$key['categoryName'];
	        }
	        return $cat;
	    }
	}

	function get_category_list(){
	    $method='wp.getCategories';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        foreach($xmldata as $r=>$key){
	        	$parent=$key['parentId'];
	        	if($parent > 0){
	        		$suf='';
	        	}else{
	        		$suf='';
	        	}
	        	$cat[$key['categoryId']]=$suf.$key['categoryName'];
	        }
	        return $cat;
	    }
	}

	function page_get_status_list(){
	    $method='wp.getPageStatusList';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        foreach($xmldata as $r=>$key){
	        	$cat[$r]=$key;
	        }
	        return $cat;
	    }
	}

	function post_get_status_list(){
	    $method='wp.getPostStatusList';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        foreach($xmldata as $r=>$key){
	        	$cat[$r]=$key;
	        }
	        return $cat;
	    }
	}

	function wp_user(){
	    $method='wp.getUsers';

	    $request = array(0, $this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        
	        return $xmldata;
	    }
	}

	function get_page_edit($page_id){
		if(empty($page_id) or !is_numeric($page_id)) exit("Tidak Valid");
		$this->session->set_userdata('page_id',$page_id);
		$method='wp.getPage';

	    $request = array(0, $page_id,$this->server_user, $this->server_pass);

	    $result=$this->xmlRPC($method,$request,FALSE);
	    
	    if ( !$result ){
	        echo 'Error:<br>'.$this->xmlrpc->display_error();
	    }else{
	        $xmldata=$this->xmlrpc->display_response();
	        
	        return $xmldata;
	    }
	}

	function save_page_modified(){
		if($_POST){
			$page_id=$this->session->userdata('page_id');

		    $method='wp.editPage';

		    $thePost = 
		    array(
		    	array(
					"title" => array($this->input->post('title'), "string"), 
					"description" => array($this->input->post('content'), "string"),
					"page_status" => array($this->input->post('status'), "string"), 
					"post_author" => array(1, "int"), 
					"mt_excerpt" => array("excerpt", "string"), 
					"wp_slug" => array(str_replace(' ','-',strtolower($this->input->post('title'))), "string"), 
					"mt_allow_comments" => array("close", "string"), 
					//"enclosure"=>array('http://rohman.web.id/blog/hello-world','string')
					),
		        'struct',
		      );               

		    $request = array(1, $page_id, $this->server_user, $this->server_pass, $thePost);

		    $result = $this->xmlRPC($method,$request,FALSE);
		    $this->session->set_flashdata('page_report','Sukses Menyimpan Page "'.$this->input->post('title').'"');
		    redirect(get_link(1,2).'/browse_page');
		}
	}


}

//end of file