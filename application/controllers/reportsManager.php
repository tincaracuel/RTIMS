<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class reportsManager extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("reportAccess");
        $this->load->library("pagination");
    }

	public function index(){

        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

    		$this->load->model('reportAccess');

    		//$data['report_all'] = $this->reportAccess->report_getAll();

    		//$config = array();
    		//$config["base_url"] = base_url() . "index.php/reportsManager/all_reports";
            //$config["total_rows"] = $this->reportAccess->report_all_count();
            //$config["per_page"] = 10;
            //$config["uri_segment"] = 3;
            //$choice = $config["total_rows"] / $config["per_page"];
       		//$config["num_links"] = round($choice);
     
            //$this->pagination->initialize($config);
     
            //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["query_report"] = $this->reportAccess->
                fetch_all_report(/*$config["per_page"], $page*/);
            //$data["links"] = $this->pagination->create_links();


    		$this->load->view('report.php', $data); 

        }
        else{
        //If no session, redirect to login page
        redirect(base_url());
        }
	}

	public function all_reports(){

        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('reportAccess');

            //$config = array();
            //$config["base_url"] = base_url() . "index.php/reportsManager/all_reports";
            //$config["total_rows"] = $this->reportAccess->report_all_count();
            //$config["per_page"] = 10;
            //$config["uri_segment"] = 3;
            //$choice = $config["total_rows"] / $config["per_page"];
            //$config["num_links"] = round($choice);

            //$this->pagination->initialize($config);

            //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["query_report"] = $this->reportAccess->
            fetch_all_report(/*$config["per_page"], $page*/);
            //$data["links"] = $this->pagination->create_links();


            $this->load->view('report.php', $data); 

        }
        else{
            //If no session, redirect to login page
            redirect(base_url());
        }
	}
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    public function report(){

        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('reportAccess');

            $report_id = $_POST['report_id'];

            $data['query'] = $this->reportAccess->getReportDetails($report_id);



            $this->load->view('report-content.php', $data); 
        }
        else{
        //If no session, redirect to login page
        redirect(base_url());
        }
    }
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    public function markAsUnread(){

        $this->load->model('reportAccess');

        $report_id = $_POST['report_id'];

        $this->reportAccess->markReportUnread($report_id);

        header("Location: ".base_url()."/index.php/reportsManager");
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    public function markAllAsRead(){

        $this->load->model('reportAccess');

        $this->reportAccess->markAllReportsRead();

        header("Location: ".base_url()."index.php/reportsManager");
    }

    public function markAllAsUnread(){

        $this->load->model('reportAccess');

        $this->reportAccess->markAllReportsUnread();

        header("Location: ".base_url()."index.php/reportsManager");
    }


    

	
}
