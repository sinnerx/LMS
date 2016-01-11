<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}

	function index()
	{
		$data['page_title'] = 'Pivot';
		$data['nav_title'] = 'User';
		$data['nav_subtitle'] = 'User List';
		$data['home'] = 'Home';

		$this->load->helper('url');

		if($this->session->userdata('logged_in'))
		{
		 $session_data = $this->session->userdata('logged_in');

		 $data['username'] = $session_data['username'];

		 // view template
		 $this->load->view('templates/head', $data);
		 $this->load->view('templates/header', $data);
		 $this->load->view('templates/left_side', $data);
		 $this->load->view('templates/content_header', $data);
		 $this->view($id=null);
		 $this->load->view('templates/footer');

		}
		else
		{
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
		}
	}

	function view($id)
	{	
		if ($id !== null){

			// If has id and go to single view
			$data['user'] = $this->data->user_id($id);

			$data['page_title'] = 'Pivot';
			$data['nav_title'] = 'User';
			$data['nav_subtitle'] = 'User Details';
			$data['home'] = 'Home';

			$this->load->helper('url');

			if($this->session->userdata('logged_in'))
			{
			 $session_data = $this->session->userdata('logged_in');

			 $data['username'] = $session_data['username'];

			 // view template
			 $this->load->view('templates/head', $data);
			 $this->load->view('templates/header', $data);
			 $this->load->view('templates/left_side', $data);
			 $this->load->view('templates/content_header', $data);
			 $this->load->view('user/user', $data);
			 $this->load->view('templates/footer');

			}
			else
			{
			 //If no session, redirect to login page
			 redirect('login', 'refresh');
			}

		} else {

		 	$data['user'] = $this->data->users();

			$this->load->view('user/index', $data);

		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('dashboard', 'refresh');
	}
}