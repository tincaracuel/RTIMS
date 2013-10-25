<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reportsManager extends CI_Controller {

	public function index(){
		$this->load->model('roadworkAccess');

		//$data['report_all'] = $this->reportAccess->report_getAll();

		$this->load->view('report');
	}


	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	
}
