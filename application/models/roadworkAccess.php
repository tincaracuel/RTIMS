<?php
class roadworkAccess extends CI_Model {

	/*	queries for the database involving roadworks 	*/

	/*	adds a new roadwork to the system */
	function addNewRoadwork($contract_number, $rwork_name, $classification, $desc, $street, $brgy, $latitude, $longitude, $start, $end, $has_line, $start_lat, $start_long, $end_lat, $end_long){
		
		//with foreign keys
		$status1 = $this->db->query("INSERT into roadwork (contract_no, rwork_name, rwork_type, description, start_date, end_date) values ('$contract_number', '$rwork_name', '$classification', '$desc', '$start', '$end')");
		if($start_lat!=NULL ||  $start_long!=NULL ||  $end_lat!=NULL || $end_long!=NULL){
			$status2 = $this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay, rw_id, line_start_lat, line_start_long, line_end_lat, line_end_long) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy', '$contract_number',  '$start_lat', '$start_long', '$end_lat', '$end_long')");
		}else{
			$status2 = $this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay, rw_id) values ('$contract_number', '$latitude', '$longitude', '$street', '$brgy', '$contract_number')");
		}

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

			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function roadwork_getAllOngoing(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function roadwork_getAllCompleted(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "(end_date != '0000-00-00' AND end_date < '$today')";

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates","roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function roadwork_getAllPlanned(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "(start_date > '$today')";

		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates","roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);
		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			for ( $i = 0 ; $i < $queryRoadwork->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}
	
	function getAllRoadworks(){
		/* displays all roadworks for selection (drop down menu) */
		return $this->db->query("SELECT contract_no, rwork_name, rwork_type from roadwork order by contract_no asc")->result_array();
	}

	function getRoadworkDetails($cn){
		/* 	given the contract number, this function will select all the details of the roadwork that has a contract number that
			matches the variable $cn */
		return $this->db->query("SELECT * from roadwork join map_coordinates where contract_no='$cn' and roadwork.contract_no = map_coordinates.rw_id")->result_array();
	}

	function editExistingRoadwork($cn2, $rwork_name2, $type2, $start2, $end2, $desc2, $street2, $brgy2, $lat2, $long2){
		//this function will update/edit all the details whose contract number matches the variable $cn2

		$status = $this->db->query("UPDATE roadwork set rwork_name='$rwork_name2', rwork_type='$type2', start_date='$start2', end_date='$end2', description='$desc2' where contract_no='$cn2'");
		$status = $this->db->query("UPDATE map_coordinates set street='$street2', barangay='$brgy2', latitude='$lat2', longitude='$long2' where rw_id='$cn2'");

		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

	function deleteExistingRoadwork($cn2){
		//this function will delete all the details whose contract number matches the variable $cn2
		$status = $this->db->query("DELETE from map_coordinates where rw_id='$cn2'");
		$status = $this->db->query("DELETE from roadwork where contract_no='$cn2'");
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

 

    /*-------------COUNTS AND DISPLAYS ALL ROADWORKS -----------------------------------------------------------------------------------------------*/

    function roadwork_all_count() {
        return $this->db->count_all("roadwork");
    }

    function fetch_all_roadwork($limit, $start) {
        $this->db->limit($limit, $start);

        $this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$queryRoadwork = $this->db->get();
 
        if ($queryRoadwork->num_rows() > 0 ){
             foreach ($queryRoadwork->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}



   	/*-------------COUNTS AND DISPLAYS ALL COMPLETED ROADWORKS --------------------------------------------------------------------------------------*/

   	function roadwork_completed_count() {
   		$today = date('Y-m-d');
   		$q1= "(end_date != '0000-00-00' AND end_date < '$today')";

        $this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();
		return $queryRoadwork->num_rows();
    }

   	function fetch_completed_roadwork($limit, $start) {
        $this->db->limit($limit, $start);

        $today = date('Y-m-d');
   		$q1= "(end_date != '0000-00-00' AND end_date < '$today')";

        $this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();
 
        if ($queryRoadwork->num_rows() > 0 ){
            foreach ($queryRoadwork->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}


   	/*-------------COUNTS AND DISPLAYS ALL ONGOING ROADWORKS ----------------------------------------------------------------------------------------*/

   	function roadwork_ongoing_count() {
   		$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();
		return $queryRoadwork->num_rows;
    }

   	function fetch_ongoing_roadwork($limit, $start) {
   		$this->db->limit($limit, $start);

   		$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			foreach ($queryRoadwork->result() as $row) {			
				$data[] = $row;
            }
            return $data;
        }
        return false;

   	}

   	/*-------------COUNTS AND DISPLAYS ALL PLANNED ROADWORKS ----------------------------------------------------------------------------------------*/

   	function roadwork_planned_count() {
   		$today = date('Y-m-d');
   		$q1= "(start_date > '$today')";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();
		return $queryRoadwork->num_rows;
    }

   	function fetch_planned_roadwork($limit, $start) {
   		$this->db->limit($limit, $start);

   		$today = date('Y-m-d');
   		$q1= "(start_date > '$today')";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			foreach ($queryRoadwork->result() as $row) {			
				$data[] = $row;
            }
            return $data;
        }
        return false;

   	}

}

?>