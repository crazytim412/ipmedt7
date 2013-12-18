<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Avatar_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getAvatarDetails($user_id)
	{
		$sql = "SELECT * FROM avatar WHERE user_id = ? LIMIT 1";
  
		$result = $this->db->query($sql, $user_id);
  
		if($result->num_rows() > 0)
		{
			$row = $result->row_array(); 
  
			return $row;
		}
		else
		{
			return 0;
		} 
	}
	
	function setAvatarCreate($nickname)
	{
		//$sql = "INSERT INTO avatar (`user_id`, `name`, `gender`, `energy`, `day`, `mood`, `score`, `day`, `head_id`, `shirt_id`, `pants_id`, `shoes_id`) VALUES (?,?,?,?,?,?) WHERE user_id = ?";
		$sql = "INSERT INTO avatar (`user_id`, `name`) VALUES (?,?)";
		
		$query_values = array($this->session->userdata('user_id'), $nickname);
		
		return $this->db->query($sql, $query_values);
		
	}
	
	function setAvatarDetails($details)
	{
		$sql = "UPDATE avatar SET `energy` = ?, `mood` = ?, `score` = ?, `day` = ? WHERE user_id = ?";
		
		$query_values = array($details['energy'], $details['mood'], $details['score'], $details['day'], $details['user_id']);
		
		return $this->db->query($sql, $query_values);
		
	}
	
	function getGameOverScore($user_id)
	{
		$sql = "SELECT score FROM avatar WHERE user_id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
}
?>