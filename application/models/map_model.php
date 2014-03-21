<?php
class map_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_coordinates_rw(){
		$return = array();

		//GET COORDINATES THAT MATCHES A ROADWORK 
		$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

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
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			foreach ($queryIncident->result() as $row) {		
				array_push($return, $row);
			}
		}
		return $return;
	}
}