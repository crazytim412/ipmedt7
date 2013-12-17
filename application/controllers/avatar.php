<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avatar extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			$this->load->model("location_model");

			//heeft de user al een avatar aangemaakt?
			if($data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id')))
			{
				//user heeft een avatar
				if($this->session->userdata("inside_location") == true)
				{
					$this->load->model("consumptions_model");
					
					$data['consumptions'] = $this->consumptions_model->getAllConsumptions();
					
					$this->load->view("map",$data);
				}
				else
				{
					$this->load->view("location_entrance",$data);
				}
			}
			else{
				//user moet eerst avatar aanmaken
				$this->load->view("create_avatar",$data);
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

/* End of file Location.php */
/* Location: ./application/controllers/Location.php */