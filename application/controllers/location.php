<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			$this->load->model("location_model");

			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
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
		// De user is nog niet ingelogd, toon het inlogscherm
		else
		{
			// Ververs de pagina om het inlogscherm te tonen
			redirect("/","refresh");
		}
	}
	
	public function bar()
	{
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
		
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
		
			$this->load->view("bar", $data);
		}

	}
	
	public function consume($consumption_id)
	{
		if($this->session->userdata('consumptions_left') > 0)
		{
			$consumptions_left = $this->session->userdata('consumptions_left');
			
			$this->load->model("avatar_model");
			$this->load->model("diary_model");
			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
			$this->diary_model->addDiaryDetails($consumption_id, "Kroeg", $data['avatar_details']['day'], time());
			
			$this->session->set_userdata('consumptions_left', $consumptions_left-1);
			
			redirect("/location","refresh");
		}	
	}
	
	public function enter()
	{
		$this->load->model("avatar_model");
			
		$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
		
		if($data['avatar_details']['energy'] >= 20)
		{
			$this->session->set_userdata("inside_location",true);
			$this->session->set_userdata("consumptions_left",10);
			$data['avatar_details']['energy'] -= 20;
			
			$this->avatar_model->setAvatarDetails($data['avatar_details']);
			
			redirect("/location","refresh");
		}
		else
		{
			$data['error_msg'] = "U heeft onvoldoende energie";
		}
		
		$this->load->view("location_entrance", $data);
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