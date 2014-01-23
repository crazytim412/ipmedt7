<?php if (!defined('BASEPATH'))					// Standaard code igniter code
	exit('No direct script access allowed');
	
class User_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}
	// Wessel
	// Haal de gebruikersgegevens uit de database.
	function getUserDetails($user_id)
	{
		$sql = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
		
		$result = $this->db->query($sql, $user_id);
		$row = $result->row_array(); 
		
		return $row;
	}
	// Duncan
	// Check of de email al bestaat
	function checkUserLogin($username, $password) // Functie vereist username en password van uit de controller
	{
		$sql = "SELECT id FROM users WHERE email = ? AND password = ?"; // Haal id uit users waar email en password gelijk zijn als opgegeven
		
		$query_values = array($username,sha1("konscio".md5($password)."game")); // Maak een array van de waardes voor de query
		
		$result = $this->db->query($sql, $query_values); // Haal het resultaat op
		
		if($result->num_rows() > 0) // Check als het aantal rijen groter is dan 0
		{
			$ret = $result->row(); // Haal eerste rij op
			
			return $ret->id; // Geef de rij met de naam id op
		}
		else // anders
		{
			return 0; // geef 0 terug als er minder rijen zijn dan 0
		}	
	}
	// Duncan
	// Registreer de gebruiker
	function setUserDetails($email, $hashedpassword, $birthdate) // Functie vereist email, hashedpassword en birthdate uit de controller
	{
		$sql = "SELECT email FROM users WHERE email = ?"; // Maak de query
		$result = $this->db->query($sql, $email); // voer de query uit en zet het resultaat in een variabelen
		
		if($result->num_rows() == 0) // als het aantal rijen gelijk is aan 0
		{							// dan
			$sql = "INSERT INTO users (`email`,`password`, `birthdate`, `register_date`) VALUES (?,?,?,?)"; // maak de query
		
			$query_values = array($email, $hashedpassword, $birthdate, time()); // Maak een array aan van de gegevens
		
			return $this->db->query($sql, $query_values); // geef het resultaat gelijk terug aan de controller
		}
		else // anders
		{
			return 'fout'; // Geef fout terug
		}
	}
	// Duncan
	// Als speler game over gaat
	public function gameover($user_id) // Functie vereist user_id uit de controller
	{
		$sql = "UPDATE avatar SET `energy` = '100', `mood` = '100', `health` = '100', `score` = '0', `day` = '0' WHERE `user_id` = ?"; // maak de query
		$this->db->query($sql, array($user_id)); // Voer de query uit ( zet alles terug naar standaard waarde )
		
		$sql2 = "DELETE FROM diary WHERE user_id = ?"; // Maak de query
		$this->db->query($sql2, array($user_id)); // Voer de query uit ( Verwijder de drankjes )
	}
}