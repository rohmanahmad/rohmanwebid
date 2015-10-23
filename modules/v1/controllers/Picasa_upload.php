<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picasa_upload extends MX_Controller {

var $sess_temboo;

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('version');
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
						'email_user'=>'rohmanwebid@gmail.com',
						'album_id'=>'6207586891292931041',
						'refresh_token'=>'1/o3G_592X5sxpQ5SO8xvuyIJKxn6IO3S_tZC06HyXjOrBactUREZofsF9C7PrpE-j',
						'client_id'=>'437877361893-v5bgn5lennfolmmogrd0dqpv1nfp1qhs.apps.googleusercontent.com',
						'client_secret'=>'rLrd6OE3guBTyx3NwhPenKuG',
					)
			);

		return $array_users[$user];
	}

	function upload_photo_to_tmp($tmpname){
		//echo 'asda';
		if($_FILES){
			//$tmpname=$_FILES['upload1']['tmp_name'];
			$filename=date('dmygis');
			if(!file_exists('/tmp/uploads')){
				mkdir('/tmp/uploads',0777);
				chmod('/tmp/uploads', 0777);
			}
			move_uploaded_file($tmpname, '/tmp/uploads/'.$filename);
			return $this->base($filename);
		}
		return 0;
	}

	function base($filename){
		$path="/tmp/uploads/".$filename;
		$data = file_get_contents($path);
		$file = base64_encode($data);
		return $file;
	}

	function upload_photo(){
		$user=$this->get_user($this->input->post('use_account'));
		if(!is_array($user))exit('Data tidak tersedia!');
		$filename=$this->input->post('filename');
		//print_r($_FILES);
		$file=$this->upload_photo_to_tmp($_FILES['file_data']['tmp_name']);
		//$email=$user['username'];
		$albumid=$user['album_id'];
		$ref_token=$user['refresh_token'];
		$client_id=$user['client_id'];
		$client_secret=$user['client_secret'];

		$result=$this->upload($filename,$file,$albumid,$client_id,$client_secret,$ref_token);
		return $result;
	}
	
	function upload($filename='',$file='',$albumid='',$client_id='',$client_secret='',$ref_token=''){
		$output=$this->upload_picasa(
				$filename,
				$file,
				$albumid,
				$client_id,
				$client_secret,
				$ref_token
			);
		//print_r($res);
		$f = new SimpleXMLElement($output);

		$res=json_decode(str_replace('@','',json_encode($f->content)));
		$res=str_replace('https','http',$res->attributes->src);
		$this->session->set_flashdata('result',$res);
		redirect('v1/picasa_upload');
	}
	
	function upload_picasa($filename='',$file='',$albumid='',$client_id='',$client_secret='',$ref_token=''){
		$file_lib=APPPATH.'libraries/temboo/Temboo_Session.php';
		if(file_exists($file_lib)){
			require_once($file_lib);
		}
			//require(realpath('temboo')."/temboo.php");
		//$this->load->library('temboo/Temboo_Session');
		$session = new Temboo_Session();
		 
		$postPhoto = new Google_Picasa_PostPhoto($session);

		// Get an input object for the Choreo
		$postPhotoInputs = $postPhoto->newInputs();

		// Set inputs
		$postPhotoInputs->setClientSecret($client_secret)
		->setImageName($filename)
		->setRefreshToken($ref_token)
		->setAlbumID($albumid)
		->setFileContents($file)
		->setClientID($client_id);

		// Execute Choreo and get results
		$postPhotoResults = $postPhoto->execute($postPhotoInputs)->getResults();		
		$output=$postPhotoResults->outputArray['Response'];
		
		return $output;
		
	}

}
