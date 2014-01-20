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
	// Duncan
	// Haal de huidige dag op
	function getDay($user_id) // Functie vereist user_id uit de controller
	{
		$sql = "SELECT day FROM avatar WHERE `user_id` = ? "; // Maak de query
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet de resultaat in een variabelen
		
		if($result->num_rows() > 0) // Als het aantal rijen groter is dan 0, dan
		{
			$row = $result->row(); // Haal 1 rij op
			
			$day = $row->day; // Zet de rij met de naam day in variabelen
			
			return $day; // Geef de variabelen terug aan de controller
		}
	}
	// Duncan
	// Zet de nieuwe dag in de DataBase
	function setDay($newDay) // Functie vereist newDay uit de controller
	{
		$sql = "UPDATE avatar SET `day` = ? WHERE `user_id` = ? "; // maak de query
		
		$user_id = $this->session->userdata("user_id"); // Haal user_id uit de sessie
		
		$query_values = array($newDay, $user_id); // Maak een array van de waardes
		
		$this->db->query($sql, $query_values); // voer de query uit
	}
	// Duncan
	// Voeg drankjes toe aan DataBase
	function addDiaryDetails($consumption_id, $location, $day, $time) // Functie vereist consumption_id, location, day en time uit de controller
	{
		$sql = "INSERT INTO diary (`user_id`,`consumption_id`, `location`, `day`, `time`) VALUES (?,?,?,?,?)"; // Maak de query
		
		$query_values = array($this->session->userdata('user_id'),$consumption_id, $location, $day, $time); // Maak een array van de waardes
		
		return $this->db->query($sql, $query_values); // voer de query uit en geef resultaat terug
	}
	// Duncan en Wessel
	// Haal totale mood affection op
	function getTotalMoodAffection($day,$user_id) // Functie vereist day en user_id uit controller
	{
		$sql = "SELECT SUM(c.mood_affection) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?"; // Maak een ingewikkelde query aan, die een inner join gebruikt
		
		$result = $this->db->query($sql, array($user_id, $day)); // Voer de query uit en zet resultaat en zet resultaat in variabel
		
		$row = $result->row_array(); // Maak van resultaat 1 rij
		
		return $row['tot']; // Geef de rij die tot heet terug aan de controller
	}
	// Duncan en Wessel
	// Haal totale health op
	function getTotalHealthAffection($day, $user_id) // Functie vereist day en user_id uit controller
	{
		$sql = "SELECT SUM(c.health_affection) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?"; // Maak een ingewikkelde query aan, die een inner join gebruikt
		
		$result = $this->db->query($sql, array($user_id, $day)); // Voer de query uit en zet resultaat en zet resultaat in variabel
		
		$row = $result->row_array(); // Maak van resultaat 1 rij
		
		return $row['tot']; // Geef de rij die tot heet terug aan de controller
	}
	// Duncan en Wessel
	function getTotalConsumptionWeight($day, $user_id)
	{
		$sql = "SELECT SUM(c.consumption_weight) as tot
				FROM diary d 
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?"; // Maak een ingewikkelde query aan, die een inner join gebruikt
		
		$result = $this->db->query($sql, array($user_id, $day)); // Voer de query uit en zet resultaat en zet resultaat in variabel
		
		$row = $result->row_array(); // Maak van resultaat 1 rij
		
		return $row['tot'];  // Geef de rij die tot heet terug aan de controller
	}
	// Duncan en Wessel
	// Haal alle drankjes op
	function getConsumptions($user_id, $day) // Functie vereist day en user_id uit de controller
	{
		$sql = "SELECT c.name
				FROM diary d
				JOIN consumptions c ON d.consumption_id = c.id
				WHERE d.user_id = ? and d.day = ?";  // Maak een ingewikkelde query aan, die een inner join gebruikt
		
		$query = $this->db->query($sql, array($user_id, $day)); // Voer de query uit en zet resultaat en zet resultaat in variabel
		$check = $query; // Maak 2 queries van de resultaat

		if($check->num_rows() > 0) // Check als het aantal rijen groter dan 0
		{
			return $query; // Geef resultaat terug aan de controller
		}
		else // anders
		{
			$sql = "SELECT c.name
					FROM diary d
					JOIN consumptions c ON d.consumption_id = c.id
					WHERE d.user_id = 999 and d.day = 99"; // Maak een ingewikkelde query aan, die een inner join gebruikt
			
			$result = $this->db->query($sql, array($user_id, $day)); // Voer de query uit en zet resultaat en zet resultaat in variabel
			
			return $result; // Geef resultaat terug aan de controller
		}
	}
	// Duncan
	// Haal drankjes op
	function getConsumption($consumption_id) // Functie vereist consumption_id uit controller
	{
		$sql = "SELECT * FROM consumptions WHERE id = ?"; // Maak de query uit
		
		$query = $this->db->query($sql, $consumption_id); // Voer de query uit en zet resultaat en zet resultaat in variabel
		
		$result = $query->result_array(); // Maak een array van het resultaat
		
		return $result; // Geeft resultaat aan de controller
	}
	// Duncan
	// Haal oude score op
	function getOldScore($user_id) // Functie vereist user_id uit controller
	{
		$sql = "SELECT score as oldScore FROM avatar WHERE user_id = ?"; // Maak de query uit
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat en zet resultaat in variabel
		$row = $result->row_array(); // maak van het resultaat een row array
		
		return $row['oldScore']; // Geef row array terug aan de controller
	}
	// Duncan
	// Haal oude mood op
	function getOldMood($user_id)  // Functie vereist user_id uit controller
	{
		$sql = "SELECT mood as oldMood FROM avatar WHERE user_id = ?"; // Maak de query
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat en zet resultaat in variabel
		$row = $result->row_array(); // Maak een row array van het resultaat
		
		return $row['oldMood']; // Geef row array terug aan de controller
	}
	// Duncan
	// Haal oude leven op uit de database
	function getOldHealth($user_id)  // Functie vereist user_id uit controller
	{
		$sql = "SELECT health as oldHealth FROM avatar WHERE user_id = ?"; // Maak de query
		
		$result = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat en zet resultaat in variabel
		$row = $result->row_array(); // Maak een row array van het resultaat
		
		return $row['oldHealth']; // Geef row array terug aan de controller
	}
	// Duncan
	// Zet nieuwe nieuw data
	function setNewData($data) // Functie vereist data uit controller
	{
		$sql = "UPDATE avatar SET `mood` = ?, `score` = ?, `health` = ?, `energy` = ? WHERE `user_id` = ? "; // Maak de query

		$user_id = $this->session->userdata("user_id"); // Haal user_id uit sessie
		
		$query_values = array($data['mood'], $data['score'], $data['health'], $data['energy'], $user_id); // Maak een array van de values
		
		$this->db->query($sql, $query_values); // Voer de query uit
	}
	// Duncan
	// Zet nieuw leven
	public function setNewHealth($newHealth) // Functie vereist newHealth uit de controller
	{
		$sql = "UPDATE avatar SET `health` = ? WHERE `user_id` = ? "; // Maak de query
		
		$user_id = $this->session->userdata("user_id"); // Haal user_id uit sessie
		
		$query_values = array($newHealth, $user_id); // Maak een array van de values
		
		$this->db->query($sql, $query_values); // Voer de query uit
	}
	// Duncan
	// Zet nieuwe mood
	public function setNewMood($newMood) // Functie newMood uit de controller
	{
		$sql = "UPDATE avatar SET `mood` = ? WHERE `user_id` = ? "; // Maak de query

		$user_id = $this->session->userdata("user_id"); // Haal user_id uit sessie
		
		$query_values = array($newMood, $user_id); // Maak een array van de values
		
		$this->db->query($sql, $query_values); // Voer de query uit
	}
	// Duncan
	// Check het leven
	function checkHealth($user_id) // Functie vereist user_id uit de controller
	{
		$sql ="SELECT health as alive
			   FROM avatar WHERE user_id = ?"; // Maak de query
		
		$query = $this->db->query($sql, $user_id); // Voer de query uit en zet resultaat en zet resultaat in variabel
		$row = $query->row_array(); // Maak een row array van het resultaat
		
		return $row['alive']; // Geef row array terug aan de controller
	}
}
?>