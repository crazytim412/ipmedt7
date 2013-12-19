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
		$sql = "SELECT day FROM avatar WHERE `user_id` = ? ";
		
		$result = $this->db->query($sql, $user_id);
		
		if($result->num_rows() > 0)
		{
			$row = $result->row();
			
			$day = $row->day;
			
			return $day;
		}
	}
	
	function setDay($newDay)
	{
		$sql = "UPDATE avatar SET `day` = ? WHERE `user_id` = ? ";
		
		$user_id = $this->session->userdata("user_id");
		
		$query_values = array($newDay, $user_id);
		
		$this->db->query($sql, $query_values);
	}
	
	function addDiaryDetails($consumption_id, $location, $day, $time)
	{
		$sql = "INSERT INTO diary (`user_id`,`consumption_id`, `location`, `day`, `time`) VALUES (?,?,?,?,?)";
		
		$query_values = array($this->session->userdata('user_id'),$consumption_id, $location, $day, $time);
		
		return $this->db->query($sql, $query_values);
	}
	
	function getTotalMoodAffection($user_id, $day)
	{
		$sql = "SELECT SUM(c.mood_affection)
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
	}
	
	function getTotalHealthAffection($user_id, $day)
	{
		$sql = "SELECT SUM(c.health_affection)
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
	}
	
	function getTotalConsumptionWeight($user_id, $day)
	{
		$sql = "SELECT SUM(c.consumption_weight)
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
	}
	
	function getOldScore($user_id)
	{
		$sql = "SELECT score FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
	}
	
	function getOldMood($user_id)
	{
		$sql = "SELECT mood FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
	}
	
	function getOldHealth($user_id)
	{
		$sql = "SELECT health FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
	}
	
	function setNewData($data)
	{
		$sql = "UPDATE avatar SET `mood` = ?, `score` = ?, `health` = ? WHERE `id` = ? ";
		
		$user_id = $this->session->userdata("user_id");
		
		$query_values = array($data['mood'], $data['score'], $data['health'], $user_id);
		
		$this->db->query($sql, $query_values);
	}
}
?>