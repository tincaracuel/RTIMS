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


	function roadwork_getAll(){
		$return = array();

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function roadwork_getAllOngoing(){
		$return = array();

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];

				//COMPARES THE END DATE WITH THE CURRENT DATE
				$interval = date_diff(date_create($res[$i]->end_date), date_create((date("Y-m-d"))));

				//IF THE ROADWORK IS NOT YET DUE, THE ROADWORK WILL BE DISPLAYED
				if ($res[$i]->status != '100' && $res[$i]->status != '0' && (($interval->format('%R') == '-' && $interval->format('%y') >= 0 && $interval->format('%m') >= 0 && $interval->format('%d') >= 0) || ($res[$i]->end_date == '0000-00-00')) )
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function roadwork_getAllCompleted(){
		$return = array();

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates","roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];

				if($res[$i]->status == '100')
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function roadwork_getAllPlanned(){
		$return = array();

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates","roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];

				if($res[$i]->status == '0')
				array_push($return, $array_res);
			}
		}

		return $return;
	}


	function getAllRoadworks(){
		/* simply displays the names of all cashier for selection (drop down menu) */
		return $this->db->query("SELECT contract_no from roadwork order by contract_no asc")->result_array();
	}

	function getRoadworkDetails($cn){
		/* 	given the variable name, this function will select all the details whose cashier_name
			matches the variable $name */
		return $this->db->query("SELECT * from roadwork join map_coordinates where contract_no='$cn' and roadwork.contract_no = map_coordinates.rw_id")->result_array();
	}

	function editExistingRoadwork($cn2, $rwork_name2, $type2, $start2, $end2, $desc2, $status2, $street2, $brgy2, $lat2, $long2){
		//given the name, username and password, this function will update/edit all the details	whose cashier_name matches the variable $name 
		$status = $this->db->query("UPDATE roadwork set rwork_name='$rwork_name2', rwork_type='$type2', start_date='$start2', end_date='$end2', description='$desc2', status='$status2' where contract_no='$cn2'");
		$status = $this->db->query("UPDATE map_coordinates set street='$street2', barangay='$brgy2', latitude='$lat2', longitude='$long2' where rw_id='$cn2'");

		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

	function deleteExistingRoadwork($cn2){
		//given the name, username and password, this function will update/edit all the details	whose cashier_name matches the variable $name 
		$status = $this->db->query("DELETE from map_coordinates where rw_id='$cn2'");
		$status = $this->db->query("DELETE from roadwork where contract_no='$cn2'");
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

}

?>