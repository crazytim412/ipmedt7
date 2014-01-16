<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{	
		//Laadt gegevens van formulier
		if($this->input->post())
		{
			$this->load->model("user_model");
			
			$day = $this->input->post("day");
			$month = $this->input->post("month");
			$year = $this->input->post("year");
			
			$password = $this->input->post("password");
			$passwordrepeat = $this->input->post("passwordrepeat");
			
			$data=array();
			
			if($password == $passwordrepeat)
			{
				$birthdate = $year."-".$month."-".$day;
				
				$hashedpassword = sha1("konscio".md5($password)."game");
							
				$check = $this->user_model->setUserDetails($this->input->post("email"), $hashedpassword, $birthdate);
				
				if($check > 1)
				{
					$data["error"]="Helaas, je email bestaat al in de database.";
				}
				else
				{
					$data["error"]="Gefeliciteerd, je bent geregistreerd.";
					sleep(10);
					$this->load->view("login", $data);
				}
			}
			else
			{
				$data["error"]="Fout, je wachtwoord komt niet overeen.";
			}
			$this->load->view("register", $data);
		}
		else
		{
			$this->load->view("register");
		}
	}
}

/* End of file registreer.php */
/* Location: ./application/controllers/registreer.php */