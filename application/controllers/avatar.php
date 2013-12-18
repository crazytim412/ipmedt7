<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avatar extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			//heeft de user een avatarrrrrrrrr?
			if(!$this->avatar_model->getAvatarDetails($this->session->userdata('user_id')))
			{
				//user moet eerst avatar aanmaken
				if($this->input->post())
				{
			
					$nickname = $this->input->post("nickname");
					$head_id = $this->input->post("headId");
					$shirt_id = $this->input->post("bodyId");
					$pants_id = $this->input->post("legsId");
					//$gender = $this->input->post("gender");
					$gender = "v";
					
					$this->avatar_model->setAvatarCreate($nickname, $head_id, $shirt_id, $pants_id, $gender);
					
					redirect("/","refresh");
					
				}
				else
				{
					
					$this->load->view("avatar_create");
					
				}
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