<?php
class roadworkAccess extends CI_Model {

	/*	queries for the database involving roadworks 	*/

	/*	adds a new roadwork to the system */
	function addNewRoadwork($contract_number, $rwork_name, $classification, $desc, $status, $street, $brgy, $latitude, $longitude, $start, $end){
		
		//with foreign keys
		$status1 = $this->db->query("INSERT into roadwork (contract_no, rwork_name, rwork_type, description, status, start_date, end_date) values ('$contract_number', '$rwork_name', '$classification', '$desc', '$status', '$start', '$end')");
		$status2 = $this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay, rw_id) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy', '$contract_number')");

		if(!$status1 || !$status2){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
		
	}

	function checkExistingContractNumber($cn){
		return  $this->db->query("SELECT contract_no from roadwork where contract_no='$cn'")->result_array();
	}
}

?>