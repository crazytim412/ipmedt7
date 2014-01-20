<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gameover extends CI_Controller {
	// Duncan
	// Automatisch uitgevoerd als speler 
	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model('avatar_model'); // Laadt avatar_model
			$this->load->model('diary_model'); // Laadt diary model
			
			$user_id = $this->session->userdata("user_id"); // Haal user_id uit de sessie
			
			$data['score'] = $this->avatar_model->getGameOverScore($user_id); // Haal de score op en zet in data array
			$data['dagen'] = $this->avatar_model->getGameOverDagen($user_id); // Haal de dag op en zet in data array
			$score = $this->avatar_model->getGameOverScore($user_id); // Haal score op
			$dagen = $this->avatar_model->getGameOverDagen($user_id); // Haal dag op
		
			$link = 'http://www.facebook.com/sharer/sharer.php?s=100&p[url]=https://www.facebook.com&p[images][0]=&p[title]=Kijk%20mijn%20highscore&p[summary]=';
			// Facebook API link, Tekst voor de link			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id')); // Haal avatar details op
			$data['link'] = array("linktotaal" => $link."Ik heb het ".$dagen." dagen volgehouden. Mijn score is ".$score.". Denk je dat je langer en beter kan leven dan ik? Speel dan nu op www.konscio.nl");
			// Zet highscore en dagen in de link van de facebook API
			$this->load->view("gameover", $data); // Laadt het game over scherm met de data
		}
		else // anders
		{
			$this->load->view('home'); // Laadt het thuisscherm
		}
	}
	// Duncan
	// Reset de gegevens
	public function end()
	{
		$user_id = $this->session->userdata('user_id'); // Haal user_id op
		$this->load->model("user_model"); // Laadt user_model
		
		$this->user_model->gameover($user_id); //Laadt game over gegevens
		
		$this->session->unset_userdata("username"); // Log de username uit
		$this->session->unset_userdata("user_id"); // log user_id uit
		
		// Ververs de pagina om het inlogscherm te tonen
		redirect("/","refresh");
	}
}

/* End of file gameover.php */
/* Location: ./application/controllers/gameover.php */