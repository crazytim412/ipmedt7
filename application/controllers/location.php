<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {
	// Benno, Wessel, Duncan
	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{	
			// Zit de speler al in een locatie?
			if($this->session->userdata("inside_location") == true)
			{
				$this->load->model("avatar_model");
				
				// Alle huidige status waarden van de avatar inladen
				$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
				
				// Wat voor soort locatie is het? Kroeg, Vrienden of Disco
				$data['type'] = $this->session->userdata("type");
				
				$this->load->model("consumptions_model");
				
				// Array initialiseren voor random waarden
				$ra = array();
				
				$ra[0] = mt_rand(1,4);
				$ra[1] = mt_rand(5,8);
				$ra[2] = mt_rand(9,12);
				$ra[3] = mt_rand(13,16);
				
				// Haal de random consumptie op
				$data['consumptions'] = $this->consumptions_model->getAllConsumptions($ra);
				
				// Emotie door Thom
				// Humeur lager dan 10%
				if($data['avatar_details']['mood'] <= 10){
					$data['emotie'] = "verward";
				}
				// Humeur tussen de 10 en de 30%
				else if($data['avatar_details']['mood'] < 30 && $data['avatar_details']['mood'] > 10){
					$data['emotie'] = "moe";
				}
				// Humeur is hoger dan 100%
				else if($data['avatar_details']['mood'] >= 100){
					$data['emotie'] = "strak";
				}
				// Humeur tussen de 80 en de 100%
				else if($data['avatar_details']['mood'] >= 80 && $data['avatar_details']['mood'] < 100){
					$data['emotie'] = "blij";
				}
				// Humeur tussen de 30 en 50%
				else if($data['avatar_details']['mood'] <= 50 && $data['avatar_details']['mood'] >= 30){
					$data['emotie'] = "bedroefd";
				}
				// Humeur tussen de 50 en de 80%
				elseif($data['avatar_details']['mood'] < 80 && $data['avatar_details']['mood'] > 50){
					$data['emotie'] = "angstig";
				}
				
				$this->load->view("location", $data);
			}
			// De speler zit nog niet in een locatie, doorverwijzen naar de town map
			else
			{
				redirect("/","refresh");
			}
		}
		// De user is nog niet ingelogd, toon het inlogscherm
		else
		{
			// Ververs de pagina om het inlogscherm te tonen
			redirect("/","refresh");
		}
	}
	
	// Wessel
	public function location_select($type = null)
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			// Kijken of de gebruiker in een locatie zit
			if($this->session->userdata("inside_location") != true)
			{
				// De status van de avatar ophalen uit de database
				$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
				
				// Type locatie: Kroeg, Disco, Festival e.d.
				$data['type'] = $type;
				
				// Entree view inladen
				$this->load->view("location_entrance",$data);
			}
			else
			{
				redirect("/location", "refresh");
			}
		}
		// De user is nog niet ingelogd, toon het inlogscherm
		else
		{
			// Ververs de pagina om het inlogscherm te tonen
			redirect("/","refresh");
		}
	}
	
	// Wessel + Benno
	public function consume($consumption_id)
	{
		$this->load->model("avatar_model");
		$this->load->model("diary_model");
		
		// In deze sessie wordt het aantal consumpties dat je nog over hebt bijgehouden
		$consumptions_left = $this->session->userdata('consumptions_left');
		// Hoeveel consumpties is deze consumptie waard
		$consumption_weight = $this->diary_model->getConsumption($consumption_id);
		
		// Controleren of je voldoende consumpties over hebt
		if($this->session->userdata('consumptions_left') >= $consumption_weight[0]['consumption_weight'])
		{			
			// Kroeg, Disco of Festival
			$type = $this->session->userdata("type");
			
			// Haal de status van de avatar op
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
			//bereken nieuwe emotie
			$newmood = $data['avatar_details']['mood'] + $consumption_weight[0]['mood_affection'];
			//$newScore = $data['avatar_details']['score'] + $consumption_score;
			
			// Nieuwe mood opslaan
			$this->diary_model->setNewMood($newmood);
			
			// Drankje toevoegen aan het dagboek
			$this->diary_model->addDiaryDetails($consumption_id, $type, $data['avatar_details']['day'], time());
			
			// Aantal consumpties over bijwerken
			$this->session->set_userdata('consumptions_left', $consumptions_left - $consumption_weight[0]['consumption_weight']);
			
			// Json gegevens teruggeven voor uitlezen door jQuery
			print json_encode(array("consumptions_left" => $this->session->userdata("consumptions_left"), "mood" => $newmood));
			//, "score" => $newScore
		}
		else
		{
			
			print -1;
		}	
	}
	
	// Wessel + Duncan
	public function enter($type)
	{
		$this->load->model("avatar_model");
		
		// De status van de avatar ophalen (humeur, gezondheid, energie e.d.)	
		$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
		$data['type'] = $type;
		
		// De avatar heeft voldoende energie
		if($data['avatar_details']['energy'] >= 20)
		{
			$this->session->set_userdata("type", $type);
			
			// Controleren of de gebruiker voldoende energie heeft voor de bar
			if($type == 'bar' && $data['avatar_details']['energy'] >= 20)
			{
				// Energie bijwerken, vastleggen dat je in een locatie zit en het aantal consumpties bepalen
				$data['avatar_details']['energy'] -= 20;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			// Controleren of de gebruiker voldoende energie heeft voor het festival
			else if($type == 'festival' && $data['avatar_details']['energy'] >= 75)
			{
				// Energie bijwerken, vastleggen dat je in een locatie zit en het aantal consumpties bepalen
				$data['avatar_details']['energy'] -= 75;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",20);
			}
			// Controleren of de gebruiker voldoende energie heeft voor de vrienden
			else if($type == 'vrienden' && $data['avatar_details']['energy'] >= 25)
			{	
				// Energie bijwerken, vastleggen dat je in een locatie zit en het aantal consumpties bepalen
				$data['avatar_details']['energy'] -= 25;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			// Controleren of de gebruiker voldoende energie heeft voor de disco
			else if($type == 'disco' && $data['avatar_details']['energy'] >= 40)
			{
				// Energie bijwerken, vastleggen dat je in een locatie zit en het aantal consumpties bepalen
				$data['avatar_details']['energy'] -= 40;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			// Je hebt onvoldoende energie
			else
			{
				$data['error_msg'] = "U heeft onvoldoende energie";
			}
			$this->avatar_model->setAvatarDetails($data['avatar_details']);
			
			redirect("/location","refresh");
		}
		// Je hebt onvoldoende energie
		else
		{
			$data['error_msg'] = "U heeft onvoldoende energie";
		}
		
		$this->load->view("location_entrance", $data);
	}
	
	// Wessel
	public function exitlocation()
	{
		// De sessies unsetten zodat je niet langer meer in een locatie zit
		$this->session->unset_userdata('inside_location');
		$this->session->unset_userdata('consumptions_left');
		
		redirect("/","refresh");
	}
}

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */