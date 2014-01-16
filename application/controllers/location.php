<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{	
			if($this->session->userdata("inside_location") == true)
			{
				$this->load->model("avatar_model");
			
				$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
				$data['type'] = $this->session->userdata("type");
				$this->load->model("consumptions_model");
				
				$ra = array(0,0,0,0);
				
				$ra[0] = mt_rand(1,4);
				$ra[1] = mt_rand(5,8);
				$ra[2] = mt_rand(9,12);
				$ra[3] = mt_rand(13,16);
				
				$data['consumptions'] = $this->consumptions_model->getAllConsumptions($ra);
				
				$this->load->view("location",$data);
			}
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
	
	public function location_select($type = null)
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			if($this->session->userdata("inside_location") != true)
			{
				$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
				$data['type'] = $type;
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
	
	
	public function consume($consumption_id)
	{
		if($this->session->userdata('consumptions_left') > 0)
		{
			$consumptions_left = $this->session->userdata('consumptions_left');
			
			$this->load->model("avatar_model");
			$this->load->model("diary_model");
			
			$type = $this->session->userdata("type");
			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
			
			//bereken emotie
			if($data['avatar_details']['energy'] == 50){
				$emotie = "verward";
			}
			elseif($data['avatar_details']['energy'] <= 20){
				$emotie = "moe";
			}
			elseif($data['avatar_details']['energy'] > 100){
				$emotie = "strak";
			}
			elseif($data['avatar_details']['energy'] >= 90){
				$emotie = "blij";
			}
			
			//overrule andere emoties HUMEUR overruled ENERGIE
			if($data['avatar_details']['mood'] == 30){
				$emotie = "bedroefd";
			}
			elseif($data['avatar_details']['mood'] <= 20){
				$emotie = "angstig";
			}
			elseif($data['avatar_details']['mood'] >= 90){
				$emotie = "blij";
			}
			
			$consumption_weight = $this->diary_model->getConsumption($consumption_id);

			$this->diary_model->addDiaryDetails($consumption_id, $type, $data['avatar_details']['day'], time());
			
			$this->session->set_userdata('consumptions_left', $consumptions_left - $consumption_weight[0]['consumption_weight']);
			
			print $this->session->userdata("consumptions_left");

		}
		else
		{
			
			print -1;
		}	
	}
	
	public function enter($type)
	{
		$this->load->model("avatar_model");
			
		$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
		$data['type'] = $type;
		
		if($data['avatar_details']['energy'] >= 20)
		{
			$this->session->set_userdata("type", $type);
			
			if($type == 'bar' && $data['avatar_details']['energy'] >= 20)
			{
				$data['avatar_details']['energy'] -= 20;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			else if($type == 'festival' && $data['avatar_details']['energy'] >= 75)
			{
				$data['avatar_details']['energy'] -= 75;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",20);
			}
			else if($type == 'vrienden' && $data['avatar_details']['energy'] >= 25)
			{
				$data['avatar_details']['energy'] -= 25;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			else if($type == 'disco' && $data['avatar_details']['energy'] >= 40)
			{
				$data['avatar_details']['energy'] -= 40;
				$this->session->set_userdata("inside_location",true);
				$this->session->set_userdata("consumptions_left",10);
			}
			else
			{
				$data['error_msg'] = "U heeft onvoldoende energie";
			}
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