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

            $data["query_report"] = $this->reportAccess->
                fetch_all_report();

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

            $data["query_report"] = $this->reportAccess->
            fetch_all_report();

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
