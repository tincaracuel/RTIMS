<?php
class incidentAccess extends CI_Model {

	function addNewIncident($classification, $desc, $start, $end, $street, $brgy, $latitude, $longitude){
		
		$status = $this->db->query("INSERT into incident (inc_type, description, start_date, end_date) values ('$classification', '$desc', '$start', '$end')");
		//$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy')");
		
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

	
}

?>