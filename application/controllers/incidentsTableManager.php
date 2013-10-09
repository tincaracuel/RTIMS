<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class incidentsTableManager extends CI_Controller {

	public function index(){
		$this->load->model('incidentAccess', '', TRUE);
		$this->load->model('incidentAccess');
		$data['query_all'] = $this->incidentAccess->incident_getAll();
		$data['query_ongoing'] = $this->incidentAccess->incident_getAllOngoing();
		$data['query_completed'] = $this->incidentAccess->incident_getAllCompleted();
		$data['query_planned'] = $this->incidentAccess->incident_getAllPlanned();
		$this->load->view('incident_table', $data);
	}


	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtainIncidents(){
	/* 	calls the getAllCashiers function in cashierAccess.php (in models) to
		display the names of all cashier for selection (drop down menu) */
		$res = $this->incidentAccess->getAllIncidents();
		$this->load->view('listOfIncidents', array('incident'=>$res));
	}

	public function obtainIncidentDetails(){
	 	//calls the getCashierDetails function in cashierAccess.php (in models) to
		//view all the details of the cashierName chosen by the user 
		$in = $_POST['incidentNumber'];
		$res = $this->incidentAccess->getIncidentDetails($in);
		$this->load->view('incidentDetails', array('details'=>$res));
	}

	public function editIncident(){
	//gets the necessary information from the submitted form
	$in2         = $_POST['in2'];
  	$type2       = $_POST['type2'];
  	$start2      = $_POST['start2'];
  	$end2        = $_POST['end2'];
  	$desc2        = $_POST['desc2'];

	//	calls the editExistingCashier function in cashierAccess.php (in models) to edit the account	and it will return a status which will determine if the account was successfully edited 
	$status = $this->incidentAccess->editExistingIncident($in2, $type2, $start2, $end2, $desc2);

	header("Location: ".base_url()."index.php/incidentsTableManager");
	
	}

	public function deleteIncident(){
	//gets the necessary information from the submitted form
	$in2  = $_POST['incidentNumber'];

	//	calls the editExistingCashier function in cashierAccess.php (in models) to edit the account	and it will return a status which will determine if the account was successfully edited 
	$status = $this->incidentAccess->deleteExistingIncident($in2);
	header("Location: ".base_url()."index.php/incidentsTableManager");	
	}
}
