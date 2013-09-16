<?php
class incidentAccess extends CI_Model {

	function addNewIncident($classification, $desc, $start, $end, $street, $brgy, $latitude, $longitude){
		
		$this->db->query("INSERT into incident (inc_type, description, start_date, end_date) values ('$classification', '$desc', '$start', '$end')");
		//$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy')");
		
	}

	
}

?>