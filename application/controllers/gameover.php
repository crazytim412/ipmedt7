<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gameover extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model('avatar_model');
			$this->load->model('diary_model');
			
			$user_id = $this->session->userdata("user_id");
			
			$data['score'] = $this->avatar_model->getGameOverScore($user_id);
			$data['dagen'] = $this->avatar_model->getGameOverDagen($user_id);
			$score = $this->avatar_model->getGameOverScore($user_id);
			$dagen = $this->avatar_model->getGameOverDagen($user_id);
		
			$link = 'http://www.facebook.com/sharer/sharer.php?s=100&p[url]=https://www.facebook.com&p[images][0]=&p[title]=Kijk%20mijn%20highscore&p[summary]=';
						
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			$data['link'] = array("linktotaal" => $link."Ik heb het ".$dagen." dagen volgehouden. Mijn score is ".$score.". Denk je dat je langer en beter kan leven dan ik? Speel dan nu op www.konscio.nl");
			
			$this->load->view("gameover", $data);
		}
		else
		{
			$this->load->view('home');
		}
	}
	
	public function end()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("user_id");
		
		// Ververs de pagina om het inlogscherm te tonen
		redirect("/","refresh");
	}
}

/* End of file gameover.php */
/* Location: ./application/controllers/gameover.php */