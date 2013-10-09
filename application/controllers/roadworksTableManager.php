<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class roadworksTableManager extends CI_Controller {

	public function index(){
		$this->load->model('roadworkAccess');

		$data['query_all'] = $this->roadworkAccess->roadwork_getAll();
		$data['query_ongoing'] = $this->roadworkAccess->roadwork_getAllOngoing();
		$data['query_completed'] = $this->roadworkAccess->roadwork_getAllCompleted();
		$data['query_planned'] = $this->roadworkAccess->roadwork_getAllPlanned();

		$this->load->view('roadwork_table', $data);
	}


	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtainRoadworks(){
	/* 	calls the getAllRoadworks function in roadworksAccess.php (in models) to
		display the contract n# of all roadworks for selection (drop down menu) */
		$res = $this->roadworkAccess->getAllRoadworks();
		$this->load->view('listOfRoadworks', array('roadwork'=>$res));
	}


	public function obtainRoadworkDetails(){
	 	//calls the getRoadworkDetails function in roadworkAccess.php (in models) to
		//view all the details of the roadwork chosen by the user 
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
  	$street2     = $_POST['street2'];
  	$brgy2    	 = $_POST['brgy2'];
  	$lat2     	= $_POST['lat2'];
  	$long2     	= $_POST['long2'];

	//	calls the editExistingRoadwork function in roadworkAccess.php (in models) for editing
	$status = $this->roadworkAccess->editExistingRoadwork($cn2, $rwork_name2, $type2, $start2, $end2, $desc2, $status2, $street2, $brgy2, $lat2, $long2);
	header("Location: ".base_url()."index.php/roadworksTableManager");
	}


	public function deleteRoadwork(){
	//gets the necessary information from the submitted form
	$cn2  = $_POST['contractNumber'];

	//	calls the editExistingRoadwork function in roadworkAccess.php (in models) for deletion
	$status = $this->roadworkAccess->deleteExistingRoadwork($cn2);
	header("Location: ".base_url()."index.php/roadworksTableManager");	
	}
	
}
