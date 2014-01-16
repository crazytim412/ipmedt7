<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bedroom extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			$this->load->model("diary_model");
		
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			$day = $this->diary_model->getDay($this->session->userdata('user_id'));
			
			$data['consumptions_name'] = $this->diary_model->getConsumptions($this->session->userdata('user_id'), $day);
			
			$health_check = 0;
			$data['health_check'] = $health_check;
		
			$this->load->view("bedroom", $data);
		}
		else
		{
			redirect("/","refresh");
		}
	}
	
	public function day()
	{
		$dataView = array();
		$data = array();
		
		$user_id = $this->session->userdata("user_id");
		
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("diary_model");
			$this->load->model("avatar_model");
			
			$alive = $this->diary_model->checkHealth($this->session->userdata("user_id"));
			
			if($alive > 0)
			{
				$health_check = 1;
				$dataView['health_check'] = $health_check;				
				
				$day = $this->diary_model->getDay($user_id);
				
				$oudeDay = $day;
				
				$newDay = $day + 1;

				$this->diary_model->setDay($newDay);
				$dataView['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
				
				$newMood = $this->diary_model->getTotalMoodAffection($day, $user_id);
				$newHealth = $this->diary_model->getTotalHealthAffection($day, $user_id);
				$newScore = $this->diary_model->getTotalConsumptionWeight($day, $user_id);

				$oldScore = $this->diary_model->getOldScore($user_id);
				$oldHealth = $this->diary_model->getOldHealth($user_id);
				$oldMood = $this->diary_model->getOldHealth($user_id);
				
				if($newHealth > -20) 							$newEnergy = 100;
				elseif($newHealth <= -20 && $newHealth > -40) 	$newEnergy = 80;
				elseif($newHealth <= -40 && $newHealth > -60)	$newEnergy = 60;
				elseif($newHealth <= -60 && $newHealth > -80)	$newEnergy = 50;
				else											
				
				if($dataView['avatar_details']['energy'] < 100)
				{
					$newEnergy = $dataView['avatar_details']['energy'] + 25;
				}
				else
				{
					$newEnergy = $dataView['avatar_details']['energy'];
				}
				
				$currentMood = $oldMood + $newMood;
				$currentHealth = $oldHealth + $newHealth;
				$currentHealth = $currentHealth - 5;
				
				//van uit gaand, dat $currentMood/$calMood een waarde tussen de 0,5 en 1,5 krijgt
				$calMood = $currentMood;
				$calMood = $calMood / 100;
				$calMood = $calMood + 0.5;
				$newScore = $currentHealth * $calMood;
				
				$currentScore = $oldScore + 10;
				
				$data = array("mood" => $currentMood, "score" => $currentScore, "health" => $currentHealth, "energy" => $newEnergy);
				
				$this->diary_model->setNewData($data);

				
				$dataView['health'] = $newHealth;
				
				$day = $this->diary_model->getDay($this->session->userdata('user_id'));
				$dataView['consumptions_name'] = $this->diary_model->getConsumptions($day, $this->session->userdata('user_id'));
				
				$healthCheck = $oldHealth + $newHealth;
				if($healthCheck < 0)
				{
					redirect("/gameover","refresh");
				}			
				
				$this->load->view("bedroom",$dataView);
			}
			else
			{
				redirect("/gameover","refresh");
			}
		}
		else
		{
			redirect("/index.php/bedroom","refresh");
		}
	}
	
	public function report()
	{
		$this->load->model("diary_model");
		
		$mood = $this->diary_model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$health = $this->diary_model->getTotalHealthAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$consumptionWeight = $this->diary_model->getTotalConsumptionWeight($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		
		$data = array($mood, $health, $consumptionWeight);
		
		$this->load->view("bedroom", $data);		
	}
}

/* End of file bedroom.php */
/* Location: ./application/controllers/bedroom.php */