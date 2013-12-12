<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			$this->load->model("avatar_model");
			
			$data['avatar_details'] = $this->avatar_model->getAvatarDetails($this->session->userdata('user_id'));
						
			$this->load->view("town",$data);
		}
		// De user is nog niet ingelogd, toon het inlogscherm
		else
		{
			// Is het inlogformulier gepost?
			if($this->input->post("username") && $this->input->post("password"))
			{
				
				$this->load->model("user_model");
				
				// Controleer de username en password in de database, indien juist, krijg je het user_id terug ander 0
				$user_id = $this->user_model->checkUserLogin($this->input->post("username"), $this->input->post("password"));
				
				// Gegevens kloppen, sessies aanmaken
				if($user_id > 0)
				{
					// Mooi, je bent ingelogd
					
					$this->session->set_userdata("username", $this->input->post("username"));
					$this->session->set_userdata("user_id", $user_id);
					
					// Pagina verversen
					redirect("/","refresh");
				}
				else
				{
					// De login gegevens kloppen niet...
					$data['error'] = "De ingevoerde inloggegevens kwamen niet overeen met onze database!";
					$this->load->view("home", $data);
				}
			}
			// Toon het inlogformulier
			else
			{
				$this->load->view('home');
			}
		}
	}
	
	public function logout()
	{
		// Verwijder de sessie waarden
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("user_id");
		
		// Ververs de pagina om het inlogscherm te tonen
		redirect("/","refresh");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */