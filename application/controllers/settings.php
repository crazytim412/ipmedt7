<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index()
	{
		// Kijken of de user al ingelogd is
		if($this->session->userdata("user_id"))
		{
			
			$this->load->view("settings");
		}
	}
}

/* End of file bedroom.php */
/* Location: ./application/controllers/bedroom.php */