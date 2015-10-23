<?php
class V1_model extends CI_Model{

	function data($email,$password){
		echo 'result:<br>';
		$arr_data=array(
			//  'password'						   => 'user_email'
			'21232f297a57a5a743894a0e4a801fc3' => 'admin@rohman.web.id'
		);
		$pass=array_search('admin@rohman.web.id', $arr_data);
		if($pass === $password) return true;
	}

	function login(){
		if($_POST){
			$email=$this->input->post('email_user');
			$password=$this->input->post('pass_user');
			if(!empty($email) && !empty($password)){
				$is_user=$this->data($email,md5($password));
				if($is_user){
					$this->session->set_userdata('email',$email);
					redirect(get_link(1));
				}
			}
			$this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">Password dan Email Salah.</div>');
		}
	}

}

// end of file