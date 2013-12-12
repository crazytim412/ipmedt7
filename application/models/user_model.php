<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class User_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}
	
	function getUserDetails($user_id)
	{
		$sql = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function checkUserLogin($username, $password)
	{
		$sql = "SELECT id FROM users WHERE email = ? AND password = ?";
		
		$query_values = array($username,sha1("konscio".md5($password)."game"));
		
		$result = $this->db->query($sql, $query_values);
		
		if($result->num_rows() > 0)
		{
			$ret = $result->row();
			
			return $ret->id;
		}
		else
		{
			return 0;
		}	
	}
	
	function setUserDetails($email, $hashedpassword, $birthdate)
	{
		$sql = "SELECT email FROM users WHERE email = ?";
		$result = $this->db->query($sql, $email);
		
		if($result->num_rows() == 0)
		{
			$sql = "INSERT INTO users (`email`,`password`, `birthdate`, `register_date`) VALUES (?,?,?,?)";
			/*$sql = "INSERT INTO users VALUES `email` = ?, `password` = ?, `birthdate` = ?, `register_date` = ?";*/
		
			$query_values = array($email, $hashedpassword, $birthdate, time());
		
			return $this->db->query($sql, $query_values);
			
			echo($birthdate);
		}
		else
		{
			return 0;
		}
	}
}