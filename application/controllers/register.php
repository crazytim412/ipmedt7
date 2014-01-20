<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	// Duncan
	// Automisch uitgevoerd als speler op de pagina komt
	public function index()
	{	
		//Laadt gegevens van formulier
		if($this->input->post())
		{
			$this->load->model("user_model"); // Laadt user_model
			
			$day = $this->input->post("day"); 		// Haal de dag op uit formulier
			$month = $this->input->post("month"); 	// Haal de maand op uit formulier
			$year = $this->input->post("year"); 	// Haal de jaar op uit formulier
			
			$password = $this->input->post("password"); // Haal wachtwoord op
			$passwordrepeat = $this->input->post("passwordrepeat"); // Haal wachtwoord herhaling op
			
			$data=array(); // data is array
			
			if($password == $passwordrepeat) // als wachtwoord overeent komt met elkaar
			{
				$birthdate = $year."-".$month."-".$day; // Zet birthday goed neer
				
				$hashedpassword = sha1("konscio".md5($password)."game"); // Beveilig het wachtwoord
							
				$check = $this->user_model->setUserDetails($this->input->post("email"), $hashedpassword, $birthdate); 	// Controleer als gebruiker nog niet
																														// geregistreerd is
				if($check > 1) // als check groter is dan 1
				{
					$data["error"]="Helaas, je email bestaat al in de database."; // Geef foutmelding dat speler al geregistreerd is
				}
				else // anders
				{
					$data["error"]="Gefeliciteerd, je bent geregistreerd."; // Geef melding dat speler geregistreerd is
					$this->load->view("login", $data); // Laadt login scherm
				}
			}
			else // anders
			{
				$data["error"]="Fout, je wachtwoord komt niet overeen."; // geef melding dat wachtwoord niet overeenkomt 
			}
			$this->load->view("register", $data); // laadt register opnieuw
		}
		else // anders
		{
			$this->load->view("register"); // laat formulier zien
		}
	}
}

/* End of file registreer.php */
/* Location: ./application/controllers/registreer.php */