<?php
class logAccess extends CI_Model {
	
	/*
		This function checks if the admin name and password entered by the user matched the data in the database then put it in an array.
	*/
	function loginAdmin($name,$password){
		
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('admin_username = ' . "'" . $name . "'"); 
		$this->db->where('admin_password = ' . "'" . MD5($password) . "'"); 
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function updateAccount($name, $password){
		$status = $this->db->query("UPDATE admin set admin_password='$password' where admin_username='$name'");
		
		if(!$status){
			$this->error = $this->db->_error_message();
    		$this->errorno = $this->db->_error_number();

    		return $this->error;
		}
		return '';
	}

}
?>