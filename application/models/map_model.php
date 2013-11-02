<?php
class map_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_coordinates_rw(){
		$return = array();

		//GET COORDINATES THAT MATCHES A ROADWORK 
		$today = date('Y-m-d');
   		$no_end = '0000-00-00';
   		$q1= "status != 100  AND status !=0 AND ( DATE_FORMAT(start_date, '%Y-%m-%d') <= '$today' AND ( DATE_FORMAT(end_date, '%Y-%m-%d') > '$today' OR DATE_FORMAT(end_date, '%Y-%m-%d') = DATE_FORMAT($no_end, '%Y-%m-%d')) )";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			foreach ($queryRoadwork->result() as $row) {		
				array_push($return, $row);
			}
		}

		return $return;
	}

	function get_coordinates_inc(){
		$return = array();

		//GET COORDINATES THAT MATCHES AN INCIDENT
		$today = date('Y-m-d');
        $no_end = '0000-00-00';

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$q1= "DATE_FORMAT(start_date, '%Y-%m-%d') <= '$today' AND (DATE_FORMAT(end_date, '%Y-%m-%d') >= '$today' OR DATE_FORMAT(end_date, '%Y-%m-%d') = '$no_end')";
		$this->db->where($q1);
		$queryIncident = $this->db->get();


		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			//PUSH THE INCIDENT INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			foreach ($queryIncident->result() as $row) {		
				array_push($return, $row);
			}
		}

		return $return;
	}
}