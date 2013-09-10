<?php
class logAccess extends CI_Model {
	
	/*
		This function checks if the admin name and password entered by the user matched the data in the database then put it in an array.
	*/
	function loginAdmin($name,$password){
		return $this->db->query("SELECT * from admin where admin_username='$name' and admin_password='$password'")->result_array();
	}

}
?>