<?php
class roadworkAccess extends CI_Model {

	/*	queries for the database involving the accounts of the cashier 	*/

	/*	adds a new cashier to the system, it will return '' or the error number
		to determine if the operations was successful */
	function addNewRoadwork($contract_number, $rwork_name, $classification, $rw_start, $rw_end, $street, $barangay, $latitude, $longitude, $status){
		$status = $this->db->query("INSERT into roadwork (contract_number, rwork_name, classification, status) values ('$contract_number', '$rwork_name', '$classification', '$status')");
		//$this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay) values ('$contract_number', '$latitude', $'longitude', '$street', '$barangay')");

		if(!$status){
    		return 'q';
		}
		return '';
	}

	
}

?>