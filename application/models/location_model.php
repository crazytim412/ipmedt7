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
}
?>