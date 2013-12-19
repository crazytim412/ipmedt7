<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function form()
	{	
		//Laadt gegevens van formulier
		if($this->input->post())
		{
			$this->load->model("avatar_model");
			$optie1 = $this->input->post("optie1");
		
			
			
			{
				$this->avatar_model->setAvatarDetails($this->input->post(energy, mood, score) VALUES ('20', '15', '50'));			
				}
		
			else
				{
					$data["error"]="Maak een keuze";
				}
		
			




	
			
