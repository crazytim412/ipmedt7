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
			
			$birthdate = $year."-".$month."-".$day;
			
			$hashedpassword = sha1("konscio".md5($password)."game");
			
			$this->user_model->setUserDetails($this->input->post("email"), $hashedpassword, $birthdate);
			
			$this->load->view("register");
		}
		else
		{
			$this->load->view("register");
		}
	}
}

/* End of file registreer.php */
/* Location: ./application/controllers/registreer.php */