<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class logManager extends CI_Controller {

	public function index(){
		$this->load->view('rtims');							//this function directly go to log in page
	}

	public function logout(){								//destroy all the sessions when the user logged out
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function checkUser(){
		$name = $_POST['username'];
		$password = $_POST['password'];
		$res = $this->logAccess->loginAdmin($name,$password);
		if(isset($res[0]['admin_username'])){	
			$newdata = array(
	           'uname'  => $res[0]['admin_username'],
	           'logged_in' => TRUE
	       );
			$this->session->set_userdata($newdata);
			header("Location: ".base_url()."index.php/mapsManager");
		}
		/*else{
			$this->session->set_flashdata('logInError', 'No match found for administrator!');
			redirect(base_url());*/

			if ($newdata['logged_in'] == TRUE) {
				echo "TRUE";
			}else echo "FALSE";
		
		
	}
}
