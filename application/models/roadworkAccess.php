<?php
class roadworkAccess extends CI_Model {

	/*	queries for the database involving the accounts of the cashier 	*/

	/*	adds a new cashier to the system, it will return '' or the error number
		to determine if the operations was successful */
	function addNewRoadwork($contract_number, $rwork_name, $classification, $desc, $status, $street, $brgy, $latitude, $longitude, $start, $end){
		//$status = $this->db->query("INSERT into roadwork (contract_number, rwork_name, classification) values ('$contract_number', '$rwork_name', '$classification')");
		//$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', $'longitude', '$street', '$barangay')");
		//$this->db->query("DELETE from admin where admin_username = 'tin'");
		$this->db->query("INSERT into roadwork (contract_no, rwork_name, rwork_type, description, status, start_date, end_date) values ('$contract_number', '$rwork_name', '$classification', '$desc', '$status', '$start', '$end')");
		$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy')");
		
	}

	function getLatLng(){
		return $this->db->query("SELECT * from map_coordinates")->result_array();
	}
	
}

?>