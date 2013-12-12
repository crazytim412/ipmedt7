<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registreer extends CI_Controller {

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
			
			$birthdate = $year."".$month."".$day;
			
			$hashpassword = sha1("konscio".md5($password)."game");
			
			$details = $this->user_model->setUserLogin($this->input->post("email"), $this->input->post($hashedpassword), $this->input->post($birthdate));
		}
		else
		{
			$this->load->view("registreer");
		}
	}
}

/* End of file registreer.php */
/* Location: ./application/controllers/registreer.php */