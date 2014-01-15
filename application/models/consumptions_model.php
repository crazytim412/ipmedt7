<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class consumptions_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getConsumption($user_id)
	{
		$sql = "SELECT * FROM consumptions WHERE id = ? LIMIT 1";
		
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