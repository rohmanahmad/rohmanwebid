<?php
function version($num){
	switch ($num) {
		case 0:
			$v='a';
			break;
		case 1:
			$v='v1';
			break;
		
		default:
			$v='a';
			break;
	}
	return $v;
}

function controller_get($controller_id=0 ){
	$arr_controller=array(
			'v1'=>0,
			'picasa_upload'=>1,
			'wp_blog'=>2,
		);
	return array_search($controller_id, $arr_controller);
}

function get_link($version,$controller_id=''){
	$version=	version($version); // get from function version
	$controller= controller_get($controller_id);
	return $version.'/'.$controller;
}

?>