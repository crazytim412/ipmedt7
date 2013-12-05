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
	}
	
	function getDay($user_id)
	{
		$sql = "SELECT day FROM avatar WHERE `id` = ? ";
		
		$result = $this->db->query($sql, $user_id);
		
		if($result->num_rows(); > 0)
		{
			$row = $query->row();
			
			$day->'day';
		}
		
		return $day;
	}
	
	function setDay($newDay)
	{
		$sql = "UPDATE diary SET `day` = ? WHERE `id` = ? ";
		
		$query_values = array($details['day'], $details['id']);
		
		return $this->db->query($sql, $query_values);
	}
	
	function addDiaryDetails($details)
	{
		$sql = "UPDATE diary SET `consumption_id` = ? , `location` = ? `day` = ? , `time` = ? WHERE `id` = ? ";
		
		$query_values = array($details['consumption_id'], $details['location'], $details['day'], $details['time']);
		
		return $this->db->query($sql, $query_values);
	}
	
	function getTotalMoodAffection($user_id, $day)
	{
		$sql = "SELECT SUM(c.health_affection)
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
	}
}
?>