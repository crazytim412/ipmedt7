<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Diary_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getDiaryDetails($user_id)
	{
		$sql = "SELECT * FROM diary WHERE user_id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function setDiaryDetails($details)
	{
	/*
		$sql = "UPDATE avatar SET `energy` = ?, `mood` = ?, `score` = ?, `day` = ? WHERE user_id = ?";
		
		$query_values = array($details['energy'], $details['mood'], $details['score'], $details['day'], $details['user_id']);
		
		return $this->db->query($sql, $query_values);
	*/
		
	}
}
?>