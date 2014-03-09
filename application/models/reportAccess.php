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

	function report_all_count() {
        return $this->db->count_all("report");
    }

    function fetch_all_report($limit, $start) {
        $this->db->limit($limit, $start);


        $queryReport = $this->db->query("SELECT * from REPORT ORDER BY date_received DESC");
 
        if ($queryReport->num_rows() > 0 ){
             foreach ($queryReport->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}

   	function getReportDetails($report_id) {

        $this->db->select("*");
        $this->db->from("report");
        $this->db->where("report_id", $report_id);
        $queryReport = $this->db->get();
 
		$this->db->query("UPDATE report set status='read' where report_id='$report_id'");

        if ($queryReport->num_rows() > 0 ){
             foreach ($queryReport->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

	function markAllReportsRead() {

		$this->db->query("UPDATE report set status='read' where report_id !=''");

    }



    function markReportUnread($report_id) {
 
		$this->db->query("UPDATE report set status='unread' where report_id='$report_id'");

    }
    

    function countUnreadReport() {
   		$q1= "status = 'unread'";

   		$this->db->select("*");
		$this->db->from("report");
		$this->db->where($q1);

		$queryRoadwork = $this->db->get();
		return $queryRoadwork->num_rows;
    }



    function markAllReportsUnread() {
 
		$this->db->query("UPDATE report set status='unread' where report_id !=''");

    }

	




}

?>