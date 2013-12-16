<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bedroom extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
			$this->load->model("Diary_Model");
			$this->diary_model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		}
	}
	
	public function day()
	{
		$this->load->model("Diary_Model");
	
		$day = $this->diary_model->getDay($data['avatar_details']['user_id']);
			
		$newDay = $day++;
		
		$this->diary_model->setDay($newDay);
		
		$this->load->view("town",$data);
	}
	
	public function nieuw($user_id)
	{
		$data = array();
		
		$this->load->model("Diary_Model");
		
		$newMood = $this->diary_model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$newHealth = $this->diary_model->getTotalHealthAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$newScore = $this->diary_model->getTotalConsumptionWeight($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		
		$oldScore = $this->diary_model->getOldScore($user_id);
		$oldHealth = $this->diary_model->getOldHealth($user_id);
		$oldMood = $this->diary_model->getOldHealth($user_id);
		
		$currentMood = $oldMood - $newMood;
		$currentScore = $oldScore - $newScore;
		$currentHealth = $oldHealth - $oldHealth;
		
		$data = $data[$currentMood][$currentScore][$currentHealth];
		
		$this->diary_model->setNewData($data);
	}
	
	public function report()
	{
		$this->load->model("Diary_Model");
		
		$mood = $this->diary_model->getTotalMoodAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$health = $this->diary_model->getTotalHealthAffection($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		$consumption = $this->diary_model->getTotalConsumptionWeight($data['avatar_details']['user_id'], $data['avatar_details']['day']);
		
		$this->load->view("town",$mood, $health, $consumption);		
	}
}

/* End of file bedroom.php */
/* Location: ./application/controllers/bedroom.php */