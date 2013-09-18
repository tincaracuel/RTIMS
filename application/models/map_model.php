<?php
class map_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_coordinates(){
		$return = array();
		$this->db->select("latitude, longitude");
		$this->db->from("map_coordinates");
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				array_push($return, $row);
			}
		}
		return $return;
	}
}