<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class incidentsTableManager extends CI_Controller {

	public function index(){
		$this->load->model('incidentAccess', '', TRUE);
		$this->load->model('incidentAccess');
		$data['query'] = $this->incidentAccess->incident_getAll();
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
}
