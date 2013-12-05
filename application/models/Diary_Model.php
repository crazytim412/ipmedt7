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
	
	function addDiaryDetails($consumption_id, $location, $day, $time)
	{
		$sql = "INSERT INTO diary (`user_id`,`consumption_id`, `location`, `day`, `time`) VALUES (?,?,?,?,?)";
		
		$query_values = array($this->session->userdata('user_id'),$consumption_id, $location, $day, $time);
		
		return $this->db->query($sql, $query_values);
	}
}
?>