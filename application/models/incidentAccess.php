<?php
class incidentAccess extends CI_Model {

	function addNewIncident($classification, $desc, $start, $end, $street, $brgy, $latitude, $longitude){
		
		$status = $this->db->query("INSERT into incident (inc_type, description, start_date, end_date) values ('$classification', '$desc', '$start', '$end')");
		//$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy')");

		/*$this->db->select("inc_id");
		$this->db->from("incident");
		$this->db->TOP;
		$this->db->where("inc_type='$classification' and description='$desc' and start_date='$start' and end_date='$end'");
		$this->db->orderby("desc");
		$inc_id = $this->db->get();*/

		$inc_id = $this->db->query("SELECT * from incident where inc_type='$classification' and description='$desc' and start_date='$start' and end_date='$end' order by inc_id desc");
		
		if ($inc_id->num_rows() > 0){
			  $row = $inc_id->row(); 

			   $id = $row->inc_id;
		}


		$status2 = $this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay, inc_id) values ('$id', '$latitude', '$longitude', '$street', '$brgy', '$id')");

		/*if(!$status || !$status2){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}*/
		return '';
	}

	function incident_getAll(){
		$return = array();

		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident"," incident.inc_id = map_coordinates.inc_id");
		$queryIncident = $this->db->get();


		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function getAllIncidents(){
		/* simply displays the names of all cashier for selection (drop down menu) */
		return $this->db->query("SELECT inc_id from incident order by inc_id asc")->result_array();
	}

	function getIncidentDetails($in){
		/* 	given the variable name, this function will select all the details whose cashier_name
			matches the variable $name */
		$arr = $this->db->query("SELECT * from incident join map_coordinates where map_coordinates.inc_id=incident.inc_id and incident.inc_id='$in'")->result_array();
		return $arr;
	}
}

?>