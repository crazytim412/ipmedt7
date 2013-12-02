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
		wordt niet gebruikt
	*/
	}
	
	function addDiaryDetails($details)
	{
		$sql = "UPDATE diary SET `consumption_id` = ? , `location` = ? `day` = ? , `time` = ? WHERE `id` = ? ";
		
		$query_values = array($details['consumption_id'], $details['location'], $details['day'], $details['time']);
		
		return $this->db->query($sql, $query_values);
	}
}
?>