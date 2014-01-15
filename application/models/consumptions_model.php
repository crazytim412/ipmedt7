<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class consumptions_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function getConsumption($consumption_id)
	{
		$sql = "SELECT * FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	public function getHealth($consumption_id)
	{
		$sql = "SELECT health_affection FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	public function getMood($consumption_id)
	{
		$sql = "SELECT mood_affection FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function getAllConsumptions($ra)
	{
		$sql = "SELECT * FROM consumptions WHERE id = ? OR id = ? OR id = ? OR id = ?";
		
		$result = $this->db->query($sql, $ra);
		
		return $result;
	}
}
?>