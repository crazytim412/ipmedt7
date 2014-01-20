<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bedroom extends CI_Controller {
	// Duncan
	// Automatisch uitgevoerd als speler in bedroom komt
	// Aantal checks en data
	public function index()
	{
		if($this->session->userdata("user_id")) // Check als user is ingelogd
		{
			$this->load->model("avatar_model"); // Laadt avatar_model
			$this->load->model("diary_model"); // Laadt diary_model
		
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id')); // Zet avatar_details in data
			$day = $this->diary_model->getDay($this->session->userdata('user_id')); // Haal dag op
			
			$data['consumptions_name'] = $this->diary_model->getConsumptions($this->session->userdata('user_id'), $day); // Haal de naam van alle gedronken
																														 // drankjes op op die dag
			$health_check = 0; // Zet health_Check op false
			$data['health_check'] = $health_check; // Voeg health_check toe aan data
		
			$this->load->view("bedroom", $data); // Laadt slaapkamer met data
		}
		else
		{
			redirect("/","refresh");
		}
	}
	// Duncan
	// Maak een nieuwe dag aan
	public function day() // Functie vereist niets
	{
		$dataView = array(); // Dataview is een array
		$data = array(); // Data is een array
		
		$user_id = $this->session->userdata("user_id"); // Haal user_id uit de sessie
		
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("diary_model");	// Laadt diary_model
			$this->load->model("avatar_model");	// Laadt avatar_model
			
			$alive = $this->diary_model->checkHealth($this->session->userdata("user_id")); // Haal leven op
			
			if($alive > 0) // Check als speler nog leeft
			{
				$health_check = 1; // zet health check op TRUE
				$dataView['health_check'] = $health_check;	// Geef healt_check mee aan dataView Array		
				
				$day = $this->diary_model->getDay($user_id); // Haal de dag op uit de model
				
				$oudeDay = $day; // dag is de oude dag
				
				$newDay = $day + 1; // doe dag + 1, dus een nieuwe dag

				$this->diary_model->setDay($newDay); // Zet nieuwe dag in de database
				$dataView['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id')); // Voeg user_id toe aan dataview
				
				$newMood = $this->diary_model->getTotalMoodAffection($day, $user_id); 		// Haal nieuwe mood op
				$newHealth = $this->diary_model->getTotalHealthAffection($day, $user_id);	// Haak nieuw leven op
				$newScore = $this->diary_model->getTotalConsumptionWeight($day, $user_id);	// Haal nieuwe Score op

				$oldScore = $this->diary_model->getOldScore($user_id);		// Haal oude score op
				$oldHealth = $this->diary_model->getOldHealth($user_id);	// Haal oude leven op
				$oldMood = $this->diary_model->getOldHealth($user_id);		// Haal oude mood op
				
				if($newHealth > -20) 							$newEnergy = 100; // Als leven groter is dan -20, zet energy op 100
				elseif($newHealth <= -20 && $newHealth > -40) 	$newEnergy = 80; // Als leven groter is dan -40 en kleiner of gelijk dan -20, zet energy op 80
				elseif($newHealth <= -40 && $newHealth > -60)	$newEnergy = 60; // Als leven groter is dan -60 en kleiner of gelijk dan -40, zet energy op 60
				elseif($newHealth <= -60 && $newHealth > -80)	$newEnergy = 50; // Als leven groter is dan -80 en kleiner of gelijk dan -60, zet energy op 50
				else											
				
				if($dataView['avatar_details']['energy'] < 100) // Als energy lager is dan 100
				{
					$newEnergy = $dataView['avatar_details']['energy'] + 25; // Zet energie + 25
				}
				else // Anders
				{
					$newEnergy = $dataView['avatar_details']['energy']; // Hou energy op zelfde niveau
				}
				
				$currentMood = $oldMood + $newMood; // Tel de moods bij elkaar op
				$currentHealth = $newHealth + $oldHealth; // Tel alle even bij elkaar op (leven is meestal in het negatieve, +- wordt - )
				
				//van uit gaand, dat $currentMood/$calMood een waarde tussen de 0,5 en 1,5 krijgt
				$calMood = $currentMood; // Zet currentMood naar calMood
				$calMood = $calMood / 100; // Deel calMood gedeeld door 100
				$calMood = $calMood + 0.5; // Tel 0,5 bij calMood op
				$newScore = $currentHealth * $calMood; // Doe currentHealth maal calMood
				
				$currentScore = $oldScore + 10; // Doe oude score + 10 in nieuwe score
				
				$data = array("mood" => $currentMood, "score" => $currentScore, "health" => $currentHealth, "energy" => $newEnergy); // Zet alle nieuwe gegevens in data
				
				$this->diary_model->setNewData($data); // Zet nieuwe data in database

				
				$dataView['health'] = $newHealth; // Voeg leven aan dataView
				
				$day = $this->diary_model->getDay($this->session->userdata('user_id')); // Haal dag op
				$dataView['consumptions_name'] = $this->diary_model->getConsumptions($day, $this->session->userdata('user_id')); // Voeg consumpties toe
				
				$healthCheck = $oldHealth + $newHealth; // Kijk als speler het overleeft heeft
				if($healthCheck < 0) // Als leven kleiner is dan 0
				{
					redirect("/gameover","refresh"); // Ga naar game over scherm
				}			
				 // anders niets
				$this->load->view("bedroom",$dataView); // Laadt slaapkamer view samen met dataView
			}
			else // als health_check false is
			{
				redirect("/gameover","refresh"); // ga naar game over scherm
			}
		}
		else // anders
		{
			redirect("/index.php/bedroom","refresh"); // doe niets, maar refresh slaapkamer
		}
	}
	// Duncan
	// Rapport van alles drankjes gedronken op een dag
	public function report() 
	{
		$this->load->model("diary_model"); // Laadt diary_model
		
		$mood = $this->diary_model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']); // Haal de mood op
		$health = $this->diary_model->getTotalHealthAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']); // Haal leven op
		$consumptionWeight = $this->diary_model->getTotalConsumptionWeight($data['avatar_details']['user_id'], $data['avatar_details']['day']); // Haal weight op
		
		$data = array($mood, $health, $consumptionWeight); // Zet alles in data array
		
		$this->load->view("bedroom", $data); // Laadt slaapkamer met gedronken drankjes	
	}
}

/* End of file bedroom.php */
/* Location: ./application/controllers/bedroom.php */