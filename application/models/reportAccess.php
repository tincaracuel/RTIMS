<?php
class reportAccess extends CI_Model {

	/*	queries for the database involving reports submitted by the users 	*/

	/*	adds a new (existing) roadwork report to the system */
	function addNewRoadworkReport($name, $email, $contract_number, $report){
		
		//with foreign keys
		$status1 = $this->db->query("INSERT into report (sender_name, sender_email, rw_id, description) values ('$name', '$email', '$contract_number', '$report')");

		if(!$status1){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
		
	}

	/*	adds a new (existing) incident report to the system */
	function addNewIncidentReport($name, $email, $inc_id, $report){
		
		//with foreign keys
		$status1 = $this->db->query("INSERT into report (sender_name, sender_email, inc_id, description) values ('$name', '$email', '$inc_id', '$report')");

		if(!$status1){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
		
	}

	/*	adds a new report to the system */
	function addNewReport($name, $email, $subject, $report){
		
		//with foreign keys
		$status1 = $this->db->query("INSERT into report (sender_name, sender_email, subject, description) values ('$name', '$email', '$subject', '$report')");

		if(!$status1){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
		
	}

	




}

?>