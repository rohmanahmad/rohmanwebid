<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picasa_upload extends MX_Controller {

var $sess_temboo;

	function __construct(){
		parent::__construct();
	}

	function set_temboo_session(){
		if($this->sess_temboo == ''){
		}
			$this->sess_temboo=$this->picasa();
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

	function get_user($user){
		$array_users=array(
				'default'=>array(
						'username'=>'rohmanwebid@gmail.com',
						'password'=>'allah is 1'
					)
			);

		return $array_users[$user];
	}

	function upload_photo(){
		$user=$this->get_user($this->input->post('use_account'));
		if(!is_array($user))exit('Data tidak tersedia!');
		$filename=$this->input->post('filename');
		$file=$_FILES['file']['tmp_name'];

		$albumid='105181859478368215246';
		$puser=$user['username'];
		$ppass=$user['password'];
		
		$sess=$this->picasa();
		$this->upload_picasa($sess,$filename,$file,$puser,$ppass,$albumid);
	}
	
	function upload_picasa($session,$filename='',$file='',$puser='',$ppass='',$albumid=''){
		//$file=$this->upload_photo($file); //matikan jika memanggil function 'tes'
		// Instantiate the Choreo, using a previously instantiated Temboo_Session object, eg:
		$postPhoto = new Google_Picasa_PostPhoto($session);
		// Get an input object for the Choreo
		$postPhotoInputs = $postPhoto->newInputs();
		// Set inputs
		try{
		$postPhotoInputs->setImageName($filename)//$judul
			->setClientSecret("rLrd6OE3guBTyx3NwhPenKuG")
			->setRefreshToken("1/o3G_592X5sxpQ5SO8xvuyIJKxn6IO3S_tZC06HyXjOrBactUREZofsF9C7PrpE-j")
			->setAlbumID($albumid)//$albumid
			->setFileContents($file)
			->setUserID('117107516089877359680')//dunia grup
			->setClientID("437877361893-v5bgn5lennfolmmogrd0dqpv1nfp1qhs.apps.googleusercontent.com");
		}catch(Exception $e){
			$e->getMessage();
		}

		// Execute Choreo and get results
		$postPhotoResults = $postPhoto->execute($postPhotoInputs)->getResults();
		$output=$postPhotoResults->outputArray['Response'];

		//print_r($res);
		$f = new SimpleXMLElement($output);

		$res=json_decode(str_replace('@','',json_encode($f->content)));
		$res=str_replace('https','http',$res->attributes->src);
		return $res;
	}
	
	function picasa(){
		require(realpath('temboo')."/temboo.php");
		$session = new Temboo_Session('rohmanwebid', 'myFirstApp', '24b088fea0a14d7eb53e3f13082724c5');

		return $session;
	}


	function form_ex(){
		$this->load->helper('form');
		echo form_open_multipart();
		echo form_upload('file');
		echo form_submit('submit','upload');
		echo form_close();
	}
}
