<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Users_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}
	
	function getUserDetails($user_id)
	{
		$sql = "SELECT * FROM user WHERE user_id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function setUserDetails($details)
	{
		$sql = "UPDATE user SET `email` = ? , `password` = ? WHERE `id` = ? ";
		
		$query_values = array($details['email'], $details['password'], $details['id']);
		
		return $this->db->query($sql, $query_values);
		
	}
}