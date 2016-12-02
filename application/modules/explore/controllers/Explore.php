<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
	
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	
		$this->lang->load('auth');
	}
	public function index()
	{
		$data['pageclass'] = 'explore';
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else
		{
			$data['main_content'] = 'explore';
			$this->load->view('page',$data);
		}
	}	
}
?>
