<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class incidentsTableManager extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("roadworkAccess");
        $this->load->library("pagination");
    }

	public function index(){
		
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');

			$config = array();
			$config["base_url"] = base_url() . "index.php/incidentsTableManager/all_incidents";
	        $config["total_rows"] = $this->incidentAccess->incident_all_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	   		$config["num_links"] = round($choice);
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["query_all"] = $this->incidentAccess->
	            fetch_all_incident($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();


			$this->load->view('incidents-table-all.php', $data); 

		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}


	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtainIncidents(){
	/* 	calls the getAllIncidents function in incidentAccess.php (in models) to
		display the incident id of all incidents for selection (drop down menu) */
		$res = $this->incidentAccess->getAllIncidents();
		$this->load->view('listOfIncidents', array('incident'=>$res));
	}

	public function obtainIncidentDetails(){
	 	//calls the getIncidentDetails function in incidentAccess.php (in models) to
		//view all the details of the incident chosen by the user 
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
  	$street2     = $_POST['street2'];
  	$brgy2    	 = $_POST['brgy2'];
  	$lat2     	= $_POST['lat2'];
  	$long2     	= $_POST['long2'];

	//	calls the editExistingIncident function in incidentAccess.php (in models) for editing
	$status = $this->incidentAccess->editExistingIncident($in2, $type2, $start2, $end2, $desc2, $street2, $brgy2, $lat2, $long2);

	header("Location: ".base_url()."index.php/incidentsTableManager");
	
	}

	public function deleteIncident(){
	//gets the necessary information from the submitted form
	$in2  = $_POST['incidentNumber'];

	//	calls the deleteExistingIncident function in incidentAccess.php (in models) for deletion
	$status = $this->incidentAccess->deleteExistingIncident($in2);
	header("Location: ".base_url()."index.php/incidentsTableManager");	
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/
	public function all_incidents(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');

			$config = array();
			$config["base_url"] = base_url() . "index.php/incidentsTableManager/all_incidents";
	        $config["total_rows"] = $this->incidentAccess->incident_all_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	   		$config["num_links"] = round($choice);
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["query_all"] = $this->incidentAccess->
	            fetch_all_incident($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();


			$this->load->view('incidents-table-all.php', $data);
		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}

	public function completed_incidents(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');

			$config = array();
			$config["base_url"] = base_url() . "index.php/incidentsTableManager/completed_incidents";
	        $config["total_rows"] = $this->incidentAccess->incident_completed_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	   		$config["num_links"] = round($choice);
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["query_completed"] = $this->incidentAccess->
	            fetch_completed_incident($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();


			$this->load->view('incidents-table-completed.php', $data);
		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}

	public function ongoing_incidents(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');

			$config = array();
			$config["base_url"] = base_url() . "index.php/incidentsTableManager/ongoing_incidents";
	        $config["total_rows"] = $this->incidentAccess->incident_ongoing_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	   		$config["num_links"] = round($choice);
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["query_ongoing"] = $this->incidentAccess->
	            fetch_ongoing_incident($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();


			$this->load->view('incidents-table-ongoing.php', $data);
		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}

	public function planned_incidents(){

		if($this->session->userdata('logged_in')){
	    	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');

			$config = array();
			$config["base_url"] = base_url() . "index.php/incidentsTableManager/planned_incidents";
	        $config["total_rows"] = $this->incidentAccess->incident_planned_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	   		$config["num_links"] = round($choice);
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["query_planned"] = $this->incidentAccess->
	            fetch_planned_incident($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();


			$this->load->view('incidents-table-planned.php', $data);
		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}
}
