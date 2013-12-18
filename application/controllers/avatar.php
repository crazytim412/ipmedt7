<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avatar extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			//user moet eerst avatar aanmaken
			if($this->input->post("nickname"))
			{
				$this->load->view("avatar_create");
			}
			else
			{
				$this->load->view("avatar_create");
			}
		}
		// De user is nog niet ingelogd, toon het inlogscherm
		else
		{
			// Ververs de pagina om het inlogscherm te tonen
			redirect("/","refresh");
		}
	}

	
	public function exitlocation()
	{
		$this->session->unset_userdata('inside_location');
		$this->session->unset_userdata('consumptions_left');
		
		redirect("/","refresh");
	}
}

/* End of file Avatar.php */
/* Location: ./application/controllers/Avatar.php */