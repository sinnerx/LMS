<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
 	{
   		parent::__construct();
  		$this->load->model('user');
 	}

	public function index()
	{
		$data['page_title'] = 'App Data';
		$data['nav_title'] = 'Register';
		$data['nav_subtitle'] = 'Control panel';
		$data['home'] = 'Home';

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'name', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('username', 'User ID', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/head', $data);
			$this->load->view('login/register', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->user->register();
			$this->success();

		}

	}

	public function success()
	{	
		$data['page_title'] = 'App Data';
		$data['nav_title'] = 'Register Success';
		$data['nav_subtitle'] = 'Control panel';
		$data['home'] = 'Home';

		$this->load->view('templates/head', $data);
		$this->load->view('login/register_success');
		$this->load->view('templates/footer');
	}

}