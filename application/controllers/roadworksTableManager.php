<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class roadworksTableManager extends CI_Controller {

	public function index(){
		$this->load->model('roadworkAccess', '', TRUE);
		$this->load->model('roadworkAccess');
		$data['query'] = $this->roadworkAccess->roadwork_getAll();
		$this->load->view('roadwork_table', $data);
	}


	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtainRoadworks(){
	/* 	calls the getAllCashiers function in cashierAccess.php (in models) to
		display the names of all cashier for selection (drop down menu) */
		$res = $this->roadworkAccess->getAllRoadworks();
		$this->load->view('listOfRoadworks', array('roadwork'=>$res));
	}

	public function obtainRoadworkDetails(){
	 	//calls the getCashierDetails function in cashierAccess.php (in models) to
		//view all the details of the cashierName chosen by the user 
		$cn = $_POST['contractNumber'];
		$res = $this->roadworkAccess->getRoadworkDetails($cn);
		$this->load->view('roadworkDetails', array('details'=>$res));
	}

	public function editRoadwork(){
	//gets the necessary information from the submitted form
	$cn2         = $_POST['cn2'];
  	$rwork_name2 = $_POST['rwork_name2'];
  	$type2       = $_POST['type2'];
  	$start2      = $_POST['start2'];
  	$end2        = $_POST['end2'];
  	$desc2        = $_POST['desc2'];
  	$status2     = $_POST['status2'];

	//	calls the editExistingCashier function in cashierAccess.php (in models) to edit the account	and it will return a status which will determine if the account was successfully edited 
	$status = $this->roadworkAccess->editExistingRoadwork($cn2, $rwork_name2, $type2, $start2, $end2, $desc2, $status2);

	header("Location: ".base_url()."index.php/roadworksTableManager");
	
	}
}
