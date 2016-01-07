<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
 	{
   		parent::__construct();
 	}

	public function index()
	{
		$data['page_title'] = 'App Data';
		$data['nav_title'] = 'Login';
		$data['nav_subtitle'] = 'Control panel';
		$data['home'] = 'Home';

		$this->load->helper('url');
		$this->load->helper(array('form'));

		if($this->session->userdata('logged_in'))
		{

		redirect('dashboard', 'refresh');

		}
		else
		{

		$this->load->view('templates/head', $data);
		$this->load->view('login/login_form', $data);
		$this->load->view('templates/footer');

		}

	}
}