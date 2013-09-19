<?php
class map_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_coordinates_rw(){
		$return = array();

		//GET COORDINATES THAT MATCHES A ROADWORK 
		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("roadwork "," roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];

				//COMPARES THE END DATE WITH THE CURRENT DATE
				$interval = date_diff(date_create($res[$i]->end_date), date_create((date("Y-m-d"))));

				//IF THE ROADWORK IS NOT YET DUE, THE ROADWORK WILL BE DISPLAYED
				if ($interval->format('%d') >= 0) 
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function get_coordinates_inc(){
		$return = array();

		//GET COORDINATES THAT MATCHES AN INCIDENT
		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident "," incident.inc_id = map_coordinates.inc_id");
		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			//PUSH THE INCIDENT INFO INTO THE ARRAY
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}

		return $return;
	}
}