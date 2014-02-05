<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class consumptions_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	// Thom
	// Haal alle consumpties op uit de tabel
	public function getConsumption($consumption_id)
	{
		$sql = "SELECT * FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		// Return het SQL resultaat
		return $row;
	}
	// Thom
	// Vraag op hoeveel de gezondheid wordt beinvloed door deze consumptie
	public function getHealth($consumption_id)
	{
		$sql = "SELECT health_affection FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	// Benno
	// Vraag op hoeveel het humeur wordt beinvloed door deze consumptie
	public function getMood($consumption_id)
	{
		$sql = "SELECT mood_affection FROM consumptions WHERE id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $id);
		$row = $result->row_array(); 
		
		return $row;
	}
	// Benno
	// Haal een willekeurige consumptie op
	function getAllConsumptions($ra)
	{
		$sql = "SELECT * FROM consumptions WHERE id = ? OR id = ? OR id = ? OR id = ?";
		
		$result = $this->db->query($sql, $ra);
		
		return $result;
	}
}
?>