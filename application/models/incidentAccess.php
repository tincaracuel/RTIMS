<?php
class incidentAccess extends CI_Model {

	function addNewIncident($classification, $desc, $start, $end, $street, $brgy, $latitude, $longitude){
		
		$status = $this->db->query("INSERT into incident (inc_type, description, start_date, end_date) values ('$classification', '$desc', '$start', '$end')");

		$inc_id = $this->db->query("SELECT * from incident where inc_type='$classification' and description='$desc' and start_date='$start' and end_date='$end' order by inc_id desc");
		
		if ($inc_id->num_rows() > 0){
			  $row = $inc_id->row(); 

			   $id = $row->inc_id;
		}

		$status2 = $this->db->query("INSERT into map_coordinates (map_id, latitude, longitude, street, barangay, inc_id) values ('$id', '$latitude', '$longitude', '$street', '$brgy', '$id')");

		return '';
	}

	function incident_getAll(){
		$return = array();

		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident"," incident.inc_id = map_coordinates.inc_id");
		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			//PUSH THE incident INFO INTO THE ARRAY TO BE DISPLAYED IN THE VIEW
			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			
				$array_res[0] = $res[$i];

				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function incident_getAllOngoing(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function incident_getAllCompleted(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "(end_date != '0000-00-00' AND end_date < '$today')";

		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}
		return $return;
	}

	function incident_getAllPlanned(){
		$return = array();

		$today = date('Y-m-d');
   		$q1= "(start_date > '$today')";

		$this->db->select("*");
		$this->db->from("map_coordinates");
		$this->db->join("incident"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();

		if ($queryIncident->num_rows() > 0 ){
			$res = $queryIncident->result();

			for ( $i = 0 ; $i < $queryIncident->num_rows(); $i++){			
				$array_res[0] = $res[$i];
				array_push($return, $array_res);
			}
		}

		return $return;
	}

	function getAllIncidents(){
		/* displays all incidents for selection (drop down menu) */
		return $this->db->query("SELECT inc_id, inc_type, description from incident order by inc_id asc")->result_array();
	}

	function getIncidentDetails($in){
		/* 	given the incident id, this function will select all the details of the incident that has an inc_id that
			matches the variable $in */
		$arr = $this->db->query("SELECT * from incident join map_coordinates where map_coordinates.inc_id=incident.inc_id and incident.inc_id='$in'")->result_array();
		return $arr;
	}

	function editExistingIncident($in2, $type2, $start2, $end2, $desc2, $street2, $brgy2, $lat2, $long2){
		//this function will update/edit all the details whose inc_id matches the variable $in2
		$status = $this->db->query("UPDATE incident set inc_type='$type2', start_date='$start2', end_date='$end2', description='$desc2' where inc_id='$in2'");
		$status = $this->db->query("UPDATE map_coordinates set street='$street2', barangay='$brgy2', latitude='$lat2', longitude='$long2' where inc_id='$in2'");
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

	function deleteExistingIncident($in2){
		//this function will delete all the details whose inc_id matches the variable $in2
		$status = $this->db->query("DELETE from map_coordinates where inc_id='$in2'");
		$status = $this->db->query("DELETE from incident where inc_id='$in2'");
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

	/*-------------COUNTS AND DISPLAYS ALL INCIDENTS -----------------------------------------------------------------------------------------------*/

    function incident_all_count() {
        return $this->db->count_all("incident");
    }

    function fetch_all_incident($limit, $start) {
        $this->db->limit($limit, $start);

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->order_by("incident.inc_id","asc");

		$queryincident = $this->db->get();
 
        if ($queryincident->num_rows() > 0 ){
             foreach ($queryincident->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}

   	/*-------------COUNTS AND DISPLAYS ALL COMPLETED INCIDENTS -----------------------------------------------------------------------------------------------*/

    function incident_completed_count() {
        $today = date('Y-m-d');
   		$q1= "(end_date != '0000-00-00' AND end_date < '$today')";

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();
		return $queryIncident->num_rows();
    }

    function fetch_completed_incident($limit, $start) {
        $this->db->limit($limit, $start);

        $today = date('Y-m-d');
        $q1= "(end_date != '0000-00-00' AND end_date < '$today')";

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);
		$this->db->order_by("incident.inc_id","asc");
		$queryIncident = $this->db->get();
 
        if ($queryIncident->num_rows() > 0 ){
             foreach ($queryIncident->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}

   	/*-------------COUNTS AND DISPLAYS ALL ONGOING INCIDENTS -----------------------------------------------------------------------------------------------*/

    function incident_ongoing_count() {
    	$today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";
       
        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();
        return $queryIncident->num_rows();
    }

    function fetch_ongoing_incident($limit, $start) {
        $this->db->limit($limit, $start);
        $today = date('Y-m-d');
   		$q1= "((start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today'))";

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);
		$this->db->order_by("incident.inc_id","asc");
		
		$queryIncident = $this->db->get();
 
        if ($queryIncident->num_rows() > 0 ){
             foreach ($queryIncident->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}

   	/*-------------COUNTS AND DISPLAYS ALL PLANNED INCIDENTS -----------------------------------------------------------------------------------------------*/

    function incident_planned_count() {
    	$today = date('Y-m-d');
   		$q1= "(start_date > '$today')";
        
        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);

		$queryIncident = $this->db->get();
        return $queryIncident->num_rows();
    }

    function fetch_planned_incident($limit, $start) {
        $this->db->limit($limit, $start);

        $today = date('Y-m-d');
        $q1= "(start_date > '$today')";

        $this->db->select("*");
		$this->db->from("incident");
		$this->db->join("map_coordinates"," incident.inc_id = map_coordinates.inc_id");
		$this->db->where($q1);
		$this->db->order_by("incident.inc_id","asc");

		$queryIncident = $this->db->get();
 
        if ($queryIncident->num_rows() > 0 ){
             foreach ($queryIncident->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}
}

?>