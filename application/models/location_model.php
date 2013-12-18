<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class location_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getLocationDetails($id)
	{
		$sql = "SELECT * FROM location WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function setLocationDetails($details)
	{
		$sql = "UPDATE avatar SET `energy` = ?, `mood` = ?, `score` = ?, `day` = ? WHERE user_id = ?";
		
		$query_values = array($details['energy'], $details['mood'], $details['score'], $details['day'], $details['user_id']);
		
		return $this->db->query($sql, $query_values);
		
	}
	
	function getConsumptionDetails($consumption_id)
	{
		$sql = "SELECT * FROM location WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	
	function setLocationDetails($consumption_details)
	{
		$sql = "UPDATE avatar SET `name` = ?, `consumption_weight` = ?, `health_affection` = ?, `mood_affection` = ? WHERE consumption_id = ?";
		
		$query_values = array($consumption_details['name'], $consumption_details['consumption_weight'], $consumption_details['health_affection'], $consumption_details['mood_affection'], $consumption_details['user_id']);
		
		return $this->db->query($sql, $query_values);
		
	}

	
}
	
	
	
?>