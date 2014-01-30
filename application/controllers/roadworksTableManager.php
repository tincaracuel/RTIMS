<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class roadworksTableManager extends CI_Controller {

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

      $this->load->model("roadworkAccess");
      
  		$config = array();
      $config["base_url"] = base_url() . "index.php/roadworksTableManager/all_roadworks";
          $config["total_rows"] = $this->roadworkAccess->roadwork_all_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
   
          $this->pagination->initialize($config);
   
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["query_all"] = $this->roadworkAccess->
              fetch_all_roadwork($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();


      $this->load->view('roadworks-table-all.php', $data); 

    }
    else{
      //If no session, redirect to login page
      redirect(base_url());
    }
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

	public function all_roadworks(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

    	$this->load->model('roadworkAccess');

    	$config = array();
    	$config["base_url"] = base_url() . "index.php/roadworksTableManager/all_roadworks";
          $config["total_rows"] = $this->roadworkAccess->roadwork_all_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
     		$config["num_links"] = round($choice);

          $this->pagination->initialize($config);

          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["query_all"] = $this->roadworkAccess->
              fetch_all_roadwork($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();


    	$this->load->view('roadworks-table-all.php', $data);

    }
    else{
      //If no session, redirect to login page
      redirect(base_url());
    }

	}

	public function completed_roadworks(){

		if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

      $this->load->model('roadworkAccess');

  		$config = array();
  		$config["base_url"] = base_url() . "index.php/roadworksTableManager/completed_roadworks";
          $config["total_rows"] = $this->roadworkAccess->roadwork_completed_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
     		$config["num_links"] = round($choice);
   
          $this->pagination->initialize($config);
   
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["query_completed"] = $this->roadworkAccess->
              fetch_completed_roadwork($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();


  		$this->load->view('roadworks-table-completed.php', $data); 
    }
    else{
      //If no session, redirect to login page
      redirect(base_url());
    }
    
	}

	public function ongoing_roadworks(){

    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

  		$this->load->model('roadworkAccess');

  		$config = array();
  		$config["base_url"] = base_url() . "index.php/roadworksTableManager/ongoing_roadworks";
          $config["total_rows"] = $this->roadworkAccess->roadwork_ongoing_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
     		$config["num_links"] = round($choice);
   
          $this->pagination->initialize($config);
   
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["query_ongoing"] = $this->roadworkAccess->
              fetch_ongoing_roadwork($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();


  		$this->load->view('roadworks-table-ongoing.php', $data); 
    }
    else{
      //If no session, redirect to login page
      redirect(base_url());
    }
    
	}

	public function planned_roadworks(){

    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

  		$this->load->model('roadworkAccess');

  		$config = array();
  		$config["base_url"] = base_url() . "index.php/roadworksTableManager/planned_roadworks";
          $config["total_rows"] = $this->roadworkAccess->roadwork_planned_count();
          $config["per_page"] = 10;
          $config["uri_segment"] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
     		$config["num_links"] = round($choice);
   
          $this->pagination->initialize($config);
   
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["query_planned"] = $this->roadworkAccess->
              fetch_planned_roadwork($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();


  		$this->load->view('roadworks-table-planned.php', $data); 
    }
    else{
      //If no session, redirect to login page
      redirect(base_url());
    }
    
	}

	
        

	
}
