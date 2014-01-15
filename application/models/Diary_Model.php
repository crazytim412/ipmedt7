<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class diary_model extends CI_Model
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
	
	function getTotalMoodAffection($day,$user_id)
	{
		$sql = "SELECT SUM(c.mood_affection) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
		
		$row = $result->row_array();
		
		return $row['tot'];
	}
	
	function getTotalHealthAffection($day, $user_id)
	{
		$sql = "SELECT SUM(c.health_affection) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
		
		$row = $result->row_array();
		
		return $row['tot'];
	}
	
	function getTotalConsumptionWeight($day, $user_id)
	{
		$sql = "SELECT SUM(c.consumption_weight) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?";
		
		$result = $this->db->query($sql, array($user_id, $day));
		
		$row = $result->row_array();
		
		return $row['tot'];
	}
	
	function getConsumptions($user_id, $day)
	{
		$sql = "SELECT c.name
				FROM diary d
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?";
		
		$query = $this->db->query($sql, array($user_id, $day));
		$check = $query;

		if($check->num_rows() > 0)
		{
			return $query;
		}
		else
		{
			$sql = "SELECT c.name
					FROM diary d
					JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = 999 and d.day = 99";
			
			$result = $this->db->query($sql, array($user_id, $day));
			
			return $result;
		}
	}
	
	function getOldScore($user_id)
	{
		$sql = "SELECT score as oldScore FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array();
		
		return $row['oldScore'];
	}
	
	function getOldMood($user_id)
	{
		$sql = "SELECT mood as oldMood FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array();
		
		return $row['oldMood'];
	}
	
	function getOldHealth($user_id)
	{
		$sql = "SELECT health as oldHealth FROM avatar WHERE user_id = ?";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array();
		
		return $row['oldHealth'];
	}
	
	function setNewData($data)
	{
		$sql = "UPDATE avatar SET `mood` = ?, `score` = ?, `health` = ?, `energy` = ? WHERE `user_id` = ? ";

		$user_id = $this->session->userdata("user_id");
		
		$query_values = array($data['mood'], $data['score'], $data['health'], $data['energy'], $user_id);
		
		$this->db->query($sql, $query_values);
	}
	
	public function setNewHealth($newHealth)
	{
		$sql = "UPDATE avatar SET `health` = ? WHERE `user_id` = ? ";
		
		$user_id = $this->session->userdata("user_id");
		
		$query_values = array($newHealth, $user_id);
		
		$this->db->query($sql, $query_values);
	}
	
	public function setNewMood($newMood)
	{
		$sql = "UPDATE avatar SET `mood` = ? WHERE `user_id` = ? ";

		$user_id = $this->session->userdata("user_id");
		
		$query_values = array($newMood, $user_id);
		
		$this->db->query($sql, $query_values);
	}
	
	function checkHealth($user_id)
	{
		$sql ="SELECT health as alive
			   FROM avatar WHERE user_id = ?";
		
		$query = $this->db->query($sql, $user_id);
		$row = $query->row_array();
		
		return $row['alive'];
	}
}
?>