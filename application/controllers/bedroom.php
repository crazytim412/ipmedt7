<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bedroom extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
		
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
		
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
			$this->load->model("Diary_Model");
			$this->load->model("avatar_model");
		
			$day = $this->Diary_Model->getDay($user_id);
			
			$oudeDay = $day;
			
			$newDay = $day + 1;

			$this->Diary_Model->setDay($newDay);
			
			$newMood = $this->Diary_Model->getTotalMoodAffection($day, $user_id);
			$newHealth = $this->Diary_Model->getTotalHealthAffection($day, $user_id);
			$newScore = $this->Diary_Model->getTotalConsumptionWeight($day, $user_id);
			
			$oldScore = $this->Diary_Model->getOldScore($user_id);
			$oldHealth = $this->Diary_Model->getOldHealth($user_id);
			$oldMood = $this->Diary_Model->getOldHealth($user_id);
			
			$currentMood = $oldMood - $newMood;
			$currentHealth = $oldHealth - $oldHealth;
			
			//van uit gaand, dat $currentMood/$calMood een waarde tussen de 0,5 en 1,5 krijgt
			$calMood = $currentMood;
			$calMood = $calMood / 100;
			$calMood = $calMood + 0.5;
			$newScore = $currentHealth * $calMood;
			
			$currentScore = $newScore + $oldScore;
			
			$data = array("mood" => $currentMood, "score" => $currentScore, "health" => $currentHealth);
			
			$this->Diary_Model->setNewData($data);
			
			$dataView['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
			$this->load->view("bedroom",$dataView);
		}
		else
		{
			redirect("/","refresh");
		}
	}
	
	public function report()
	{
		$this->load->model("Diary_Model");
		
		$mood = $this->Diary_Model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$health = $this->Diary_Model->getTotalHealthAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$consumption = $this->Diary_Model->getTotalConsumptionWeight($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		
		$this->load->view("town",$mood, $health, $consumption);		
	}
}

/* End of file bedroom.php */
/* Location: ./application/controllers/bedroom.php */