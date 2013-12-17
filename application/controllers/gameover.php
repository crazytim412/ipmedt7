<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gameover extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load-model('avatar_model');
			$this->load_model('Dairy_Model');
			
			$score = $this->avatar_model->getGameOverScore($user_id);
			
			$dagen = $this->Diary_Model->getDay($user_id);
		
			$link = 'http://www.facebook.com/sharer/sharer.php?s=100&p[url]=https://www.facebook.com&p[images][0]=&p[title]=Kijk%20mijn%20highscore&p[summary]='
			
			$linktotaal = $link."Ik heb het ".$dagen."dagen volgehouden. Mijn score is ".$score.". Denk je dat je langer en beter kan leven dan ik? Speel dan nu op www.konscio.nl";
			
			$this->load->view('gameover');
		}
		else
		{
			$this->load->view('home');
		}
	}
}

/* End of file gameover.php */
/* Location: ./application/controllers/gameover.php */