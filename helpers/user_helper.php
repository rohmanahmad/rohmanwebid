<?php
function is_logged_in(){
	$ci=& get_instance();
	// mengambil session user
	$user=$ci->session->userdata('email');
	if(!empty($user)){
		return true;
	}
}


//end of file