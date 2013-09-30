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

	
}

?>