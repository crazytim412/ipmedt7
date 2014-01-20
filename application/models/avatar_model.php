<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Avatar_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getAvatarDetails($user_id)
	{
		$sql = "SELECT * FROM avatar WHERE user_id = ? LIMIT 1";
  
		$result = $this->db->query($sql, $user_id);
  
		if($result->num_rows() > 0)
		{
			$row = $result->row_array(); 
  
			return $row;
		}
		else
		{
			return 0;
		} 
	}
	
	function setAvatarCreate($nickname, $head_id, $shirt_id, $pants_id, $gender, $skinColor)
	{
		//$sql = "INSERT INTO avatar (`user_id`, `name`, `gender`, `energy`, `day`, `mood`, `score`, `day`, `head_id`, `shirt_id`, `pants_id`, `shoes_id`) VALUES (?,?,?,?,?,?) WHERE user_id = ?";
		$sql = "INSERT INTO avatar (`user_id`, `name`, `head_id`, `shirt_id`, `pants_id`, `gender`, `energy`, `skin_color`, `health`) VALUES (?,?,?,?,?,?,'100',?,'100')";
		
		$query_values = array($this->session->userdata('user_id'), $nickname, $head_id, $shirt_id, $pants_id, $gender, $skinColor);
		
		return $this->db->query($sql, $query_values);
		
	}
	
	function setAvatarDetails($details)
	{
		$sql = "UPDATE avatar SET `energy` = ?, `mood` = ?, `score` = ?, `day` = ? WHERE user_id = ?";
		
		$query_values = array($details['energy'], $details['mood'], $details['score'], $details['day'], $details['user_id']);
		
		return $this->db->query($sql, $query_values);
		
	}
	// Duncan
	// Haal de eind score op
	function getGameOverScore($user_id) // Functie vereist user_id uit de controller 
	{
		$sql = "SELECT score as endScore FROM avatar WHERE user_id = ? LIMIT 1"; // Maak de query
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat in een variabel
		
		$row = $result->row_array(); // Maak een row array
		
		return $row['endScore']; // Geef resultaat array terug
	}
	//Duncan
	// Haal einddag op
	function getGameOverDagen($user_id) // Functie vereist user_id uit de controller 
	{
		$sql = "SELECT day as endDay FROM avatar WHERE user_id = ?"; // Maak de query
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat in een variabel
		
		$row = $result->row_array(); // Maak een row array
		
		return $row['endDay']; // Geef resultaat array terug
	}
}
?>