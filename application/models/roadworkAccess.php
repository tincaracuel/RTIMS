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
        $query = $this->db->where('status', 100)->get('roadwork');
		return $query->num_rows();
    }

   	function fetch_completed_roadwork($limit, $start) {
        $this->db->limit($limit, $start);


        $this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where("status", 100);
		$queryRoadwork = $this->db->get();
 
        if ($queryRoadwork->num_rows() > 0 ){
        	$res = $queryRoadwork->result();

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
   		$no_end = '0000-00-00';
   		$q1= "status != 100  AND status !=0 AND ( DATE_FORMAT(start_date, '%Y-%m-%d') <= '$today' AND ( DATE_FORMAT(end_date, '%Y-%m-%d') > '$today' OR DATE_FORMAT(end_date, '%Y-%m-%d') = DATE_FORMAT($no_end, '%Y-%m-%d')) )";

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
   		$no_end = '0000-00-00';
   		$q1= "status != 100  AND status !=0 AND ( DATE_FORMAT(start_date, '%Y-%m-%d') <= '$today' AND ( DATE_FORMAT(end_date, '%Y-%m-%d') > '$today' OR DATE_FORMAT(end_date, '%Y-%m-%d') = DATE_FORMAT($no_end, '%Y-%m-%d')) )";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			foreach ($queryRoadwork->result() as $row) {			
				$data[] = $row;
            }

            return $data;
        }
        return false;

   	}

   	function roadwork_planned_count() {

   		$today = date('Y-m-d');
   		$no_end = '0000-00-00';
   		$q1= "status = 0 OR DATE_FORMAT(start_date, '%Y-%m-%d') > DATE_FORMAT($today, '%Y-%m-%d')";

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
   		$no_end = '0000-00-00';
   		$q1= "status = 0 OR DATE_FORMAT(start_date, '%Y-%m-%d') > DATE_FORMAT($today, '%Y-%m-%d')";

   		$this->db->select("*");
		$this->db->from("roadwork");
		$this->db->join("map_coordinates"," roadwork.contract_no = map_coordinates.rw_id");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();

		if ($queryRoadwork->num_rows() > 0 ){
			$res = $queryRoadwork->result();

			//PUSH THE ROADWORK INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			foreach ($queryRoadwork->result() as $row) {			
				$data[] = $row;
            }

            return $data;
        }
        return false;

   	}



}

?>